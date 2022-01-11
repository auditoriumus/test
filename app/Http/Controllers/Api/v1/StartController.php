<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Message;

class StartController
{
    public function start($telegram, $chatId)
    {
        $keyboard = [
            ['Поехали!'],
            ['Заново'],
        ];

        $reply_markup = [
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];

        $messages = Message::whereIn('id', [1,2,3])->get();

        foreach ($messages as $item) {
            $response = $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $item->message,
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode($reply_markup)
            ]);

            usleep(200);
        }

        $messageId = $response->getMessageId();
    }
}
