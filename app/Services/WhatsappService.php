<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsappService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.whatsapp.base_url');
        $this->apiKey = config('services.whatsapp.api_key');
    }

    protected function sendRequest(string $method, string $endpoint, array $data = [])
    {
        $url = $this->baseUrl . $endpoint;

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->apiKey,
        ])->$method($url, $data);

        Log::debug($url);

        return $response->json();
    }

    public function login()
    {
        return $this->sendRequest('get', '/app/login');
    }

    public function loginWithCode(string $phone)
    {
        return $this->sendRequest('get', '/app/login-with-code', ['phone' => $phone]);
    }

    public function logout()
    {
        return $this->sendRequest('get', '/app/logout');
    }

    public function reconnect()
    {
        return $this->sendRequest('get', '/app/reconnect');
    }

    public function getDevices()
    {
        return $this->sendRequest('get', '/app/devices');
    }

    public function getUserInfo(string $phone)
    {
        return $this->sendRequest('get', '/user/info', ['phone' => $phone]);
    }

    public function getUserAvatar(string $phone, bool $isPreview = true, bool $isCommunity = false)
    {
        return $this->sendRequest('get', '/user/avatar', [
            'phone' => $phone,
            'is_preview' => $isPreview,
            'is_community' => $isCommunity,
        ]);
    }

    public function changeUserAvatar(string $avatarPath)
    {
        $url = $this->baseUrl . '/user/avatar';

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('user:' . $this->apiKey),
        ])->attach(
            'avatar', file_get_contents($avatarPath), basename($avatarPath)
        )->post($url);

        return $response->json();
    }

    public function changePushName(string $pushName)
    {
        return $this->sendRequest('post', '/user/pushname', ['push_name' => $pushName]);
    }

    public function getMyPrivacy()
    {
        return $this->sendRequest('get', '/user/my/privacy');
    }

    public function getMyGroups()
    {
        return $this->sendRequest('get', '/user/my/groups');
    }

    public function getMyNewsletters()
    {
        return $this->sendRequest('get', '/user/my/newsletters');
    }

    public function getMyContacts()
    {
        return $this->sendRequest('get', '/user/my/contacts');
    }

    public function checkUser(string $phone)
    {
        return $this->sendRequest('get', '/user/check', ['phone' => $phone]);
    }

    public function getBusinessProfile(string $phone)
    {
        return $this->sendRequest('get', '/user/business-profile', ['phone' => $phone]);
    }

    public function sendMessage(string $phone, string $message, array $options = [])
    {
        $data = array_merge(['phone' => $phone, 'message' => $message], $options);

        Log::debug(json_encode($data));
        return $this->sendRequest('post', '/send/message', $data);
    }

    public function sendImage(string $phone, string $caption, array $options = [])
    {
        $url = $this->baseUrl . '/send/image';

        $request = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('user:' . $this->apiKey),
        ]);

        if (isset($options['image'])) {
            $request->attach('image', file_get_contents($options['image']), basename($options['image']));
            unset($options['image']);
        }

        $response = $request->post($url, array_merge(['phone' => $phone, 'caption' => $caption], $options));

        return $response->json();
    }

    public function sendAudio(string $phone, array $options = [])
    {
        $url = $this->baseUrl . '/send/audio';

        $request = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('user:' . $this->apiKey),
        ]);

        if (isset($options['audio'])) {
            $request->attach('audio', file_get_contents($options['audio']), basename($options['audio']));
            unset($options['audio']);
        }

        $response = $request->post($url, array_merge(['phone' => $phone], $options));

        return $response->json();
    }

    public function sendFile(string $phone, string $caption, array $options = [])
    {
        $url = $this->baseUrl . '/send/file';

        $request = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('user:' . $this->apiKey),
        ]);

        if (isset($options['file'])) {
            $request->attach('file', file_get_contents($options['file']), basename($options['file']));
            unset($options['file']);
        }

        $response = $request->post($url, array_merge(['phone' => $phone, 'caption' => $caption], $options));

        return $response->json();
    }

    public function sendVideo(string $phone, string $caption, array $options = [])
    {
        $url = $this->baseUrl . '/send/video';

        $request = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode('user:' . $this->apiKey),
        ]);

        if (isset($options['video'])) {
            $request->attach('video', file_get_contents($options['video']), basename($options['video']));
            unset($options['video']);
        }

        $response = $request->post($url, array_merge(['phone' => $phone, 'caption' => $caption], $options));

        return $response->json();
    }

    public function sendContact(string $phone, string $contactName, string $contactPhone, array $options = [])
    {
        $data = array_merge([
            'phone' => $phone,
            'contact_name' => $contactName,
            'contact_phone' => $contactPhone,
        ], $options);
        return $this->sendRequest('post', '/send/contact', $data);
    }

    public function sendLink(string $phone, string $link, string $caption, array $options = [])
    {
        $data = array_merge([
            'phone' => $phone,
            'link' => $link,
            'caption' => $caption,
        ], $options);
        return $this->sendRequest('post', '/send/link', $data);
    }

    public function sendLocation(string $phone, string $latitude, string $longitude, array $options = [])
    {
        $data = array_merge([
            'phone' => $phone,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ], $options);
        return $this->sendRequest('post', '/send/location', $data);
    }

    public function sendPoll(string $phone, string $question, array $options, int $maxAnswer, array $miscOptions = [])
    {
        $data = array_merge([
            'phone' => $phone,
            'question' => $question,
            'options' => $options,
            'max_answer' => $maxAnswer,
        ], $miscOptions);
        return $this->sendRequest('post', '/send/poll', $data);
    }

    public function sendPresence(string $type, array $options = [])
    {
        $data = array_merge(['type' => $type], $options);
        return $this->sendRequest('post', '/send/presence', $data);
    }

    public function sendChatPresence(string $phone, string $action)
    {
        return $this->sendRequest('post', '/send/chat-presence', [
            'phone' => $phone,
            'action' => $action,
        ]);
    }

    public function revokeMessage(string $messageId, string $phone)
    {
        return $this->sendRequest('post', "/message/{$messageId}/revoke", ['phone' => $phone]);
    }

    public function deleteMessage(string $messageId, string $phone)
    {
        return $this->sendRequest('post', "/message/{$messageId}/delete", ['phone' => $phone]);
    }

    public function reactMessage(string $messageId, string $phone, string $emoji)
    {
        return $this->sendRequest('post', "/message/{$messageId}/reaction", [
            'phone' => $phone,
            'emoji' => $emoji,
        ]);
    }

    public function updateMessage(string $messageId, string $phone, string $message)
    {
        return $this->sendRequest('post', "/message/{$messageId}/update", [
            'phone' => $phone,
            'message' => $message,
        ]);
    }

    public function readMessage(string $messageId, string $phone)
    {
        return $this->sendRequest('post', "/message/{$messageId}/read", ['phone' => $phone]);
    }

    public function starMessage(string $messageId, string $phone)
    {
        return $this->sendRequest('post', "/message/{$messageId}/star", ['phone' => $phone]);
    }

    public function unstarMessage(string $messageId, string $phone)
    {
        return $this->sendRequest('post', "/message/{$messageId}/unstar", ['phone' => $phone]);
    }

    public function listChats(array $options = [])
    {
        return $this->sendRequest('get', '/chats', $options);
    }

    public function getChatMessages(string $chatJid, array $options = [])
    {
        return $this->sendRequest('get', "/chat/{$chatJid}/messages", $options);
    }

    public function labelChat(string $chatJid, string $labelId, string $labelName, bool $labeled)
    {
        return $this->sendRequest('post', "/chat/{$chatJid}/label", [
            'label_id' => $labelId,
            'label_name' => $labelName,
            'labeled' => $labeled,
        ]);
    }

    public function pinChat(string $chatJid, bool $pinned)
    {
        return $this->sendRequest('post', "/chat/{$chatJid}/pin", ['pinned' => $pinned]);
    }

    public function getGroupInfo(string $groupId)
    {
        return $this->sendRequest('get', '/group/info', ['group_id' => $groupId]);
    }

    public function createGroup(string $title, array $participants)
    {
        return $this->sendRequest('post', '/group', [
            'title' => $title,
            'participants' => $participants,
        ]);
    }

    public function addParticipantToGroup(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participants', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function removeParticipantFromGroup(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participants/remove', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function promoteParticipantToAdmin(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participants/promote', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function demoteParticipantToMember(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participants/demote', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function joinGroupWithLink(string $link)
    {
        return $this->sendRequest('post', '/group/join-with-link', ['link' => $link]);
    }

    public function getGroupInfoFromLink(string $link)
    {
        return $this->sendRequest('get', '/group/info-from-link', ['link' => $link]);
    }

    public function getGroupParticipantRequests(string $groupId)
    {
        return $this->sendRequest('get', '/group/participant-requests', ['group_id' => $groupId]);
    }

    public function approveGroupParticipantRequest(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participant-requests/approve', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function rejectGroupParticipantRequest(string $groupId, array $participants)
    {
        return $this->sendRequest('post', '/group/participant-requests/reject', [
            'group_id' => $groupId,
            'participants' => $participants,
        ]);
    }

    public function leaveGroup(string $groupId)
    {
        return $this->sendRequest('post', '/group/leave', ['group_id' => $groupId]);
    }


    public function formatToWhatsapp(string $phone): string
    {
        // Hapus semua spasi
        $phone = str_replace(' ', '', $phone);

        // Hilangkan semua karakter non-digit
        $phone = preg_replace('/\D/', '', $phone);

        // Kalau diawali dengan 0, ganti dengan 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        // Kalau tidak diawali dengan 62, tambahkan 62
        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . ltrim($phone, '0');
        }

        return $phone;
    }
}
