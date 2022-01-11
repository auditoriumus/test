<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Message;
use Illuminate\Support\Facades\Cache;

class ResponseController
{
    public function responseFirst($telegram, $chatId)
    {
        Cache::add('q' . $chatId, 4);
        Cache::add('q4' . $chatId, true);

        $messages = Message::whereIn('id', [4])->get();

        foreach ($messages as $item) {
            $this->sentMessage($telegram, $chatId, $item->message);
            usleep(200);
        }
    }

    public function response($telegram, $chatId, $message)
    {
        if (Cache::has('q' . $chatId)) {
            $questionNumber = Cache::get('q' . $chatId);
            Cache::put('q' . $questionNumber . $chatId, $message);

            $message = Message::find(5)->message;
            $this->sentMessage($telegram, $chatId, $message);
        }
    }


    public function sentMessage($telegram, $chatId, $message)
    {
        $keyboard = [
            ['1', '2', '3', '4', '5'],
            ['6', '7', '8', '9'],
            ['Заново'],
        ];

        $reply_markup = [
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];


        $response = $telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode($reply_markup)
        ]);

        $messageId = $response->getMessageId();
    }
}
