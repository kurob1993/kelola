<?php

use App\Services\WebhookSignatureService;
use App\Services\WhatsappService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/callback', function (Request $request) {
    Log::debug("Header callback");
    Log::debug(json_encode($request->header()));

    Log::debug("Body callback");
    Log::debug(json_encode($request->all()));


    $payload = $request->getContent();
    $signatureHeader = $request->header('x-hub-signature-256');

    $secretKey = config('services.whatsapp.api_secret'); // atau langsung 'your_webhook_secret'
    $signatureService = new WebhookSignatureService($secretKey);

    if (!$signatureService->isValid($payload, $signatureHeader)) {
        Log::debug("Invalid signature");
        return response()->json(['message' => 'Invalid signature'], 401);
    }

    Log::debug("Signature valid");

    $wa = new WhatsappService();
    $wa->sendMessage($payload->chat_id, 'siap komanadan');
    return response()->json(['message' => 'Webhook verified']);

});
