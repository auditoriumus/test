<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Api;


class InitController extends Controller
{
    public function initTelegram()
    {
        /**
         * Инициализация телеграм
         */
        return new Api(env('TG_TOKEN'));
    }
}
