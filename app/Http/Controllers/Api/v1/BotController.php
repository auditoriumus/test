<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BotController extends ResourceController
{
    public function index(Request $request)
    {
        /**
         *  Инициализация
         */
        $telegram = app(InitController::class)->initTelegram();

        if ($this->getMessage() == '/start' || $this->getMessage() == 'Заново') {
            if (Cache::has('user'.$this->getChatId())) Cache::pull('user'.$this->getChatId());
            if (Cache::has('q4'.$this->getChatId())) Cache::pull('q4'.$this->getChatId());
            if (Cache::has('q5'.$this->getChatId())) Cache::pull('q5'.$this->getChatId());
            Cache::add('user'.$this->getChatId(), true);
            app(StartController::class)->start($telegram, $this->getChatId());
        } elseif ($this->getMessage() == 'Поехали!') {
            app(ResponseController::class)->responseFirst($telegram, $this->getChatId());
        } else {
            app(ResponseController::class)->response($telegram, $this->getChatId(), $this->getMessage());
        }

    }
}
