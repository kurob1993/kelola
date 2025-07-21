<?php

namespace App\Services;

class WebhookSignatureService
{
    protected string $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function isValid(string $payload, string $signatureHeader): bool
    {
        if (strpos($signatureHeader, 'sha256=') !== 0) {
            return false;
        }

        $theirSignature = substr($signatureHeader, 7);
        $computedSignature = hash_hmac('sha256', $payload, $this->secret);

        return hash_equals($computedSignature, $theirSignature);
    }

    public function generate(string $payload): string
    {
        return 'sha256=' . hash_hmac('sha256', $payload, $this->secret);
    }
}
