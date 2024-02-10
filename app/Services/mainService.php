<?php

namespace App\Services;

use App\Models\Logging;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLogRequest;

/**Сервис контроллера */
class mainService
{
    /**
     * 
     * Вывод всех логов из базы
     * 
     */
    public function index()
    {
        return ["logs" => Logging::orderBy("created_at", "desc")->select("log")->get()];
    }

    /**
     * 
     * Сохранения нового лога в базу
     * 
     */
    public function storeLog(StoreLogRequest $request): void
    {
        Logging::create([
            "log" => $request->log
        ]);
    }
}
