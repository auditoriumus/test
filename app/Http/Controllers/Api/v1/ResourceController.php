<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ResourceController extends Controller
{
    private $chatId;
    private $message;

    public function __construct(Request $request)
    {
        $this->chatId = $request->input('message')['chat']['id'] ?? null;
        $this->message = $request->input('message')['text'] ?? null;

    }

    public function getChatId()
    {
        return $this->chatId;
    }

    public function getMessage()
    {
        return $this->message;
    }

}
