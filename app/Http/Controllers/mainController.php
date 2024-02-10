<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\mainService;
use App\Http\Requests\StoreLogRequest;

/**Основной контроллер */
class mainController extends Controller
{
    protected $service;

    /**
     * 
     * Объявление сервиса
     * 
     */
    public function __construct(mainService $service){
        $this->service = $service;
    }

    /**
     * 
     * Вывод страницы с сервисом
     * 
     */
    public function index()
    {
        return view("main", $this->service->index());
    }

    /**
     * 
     * Респонс ответ от сервиса на сохранение лога
     * 
     */
    public function storeLog(StoreLogRequest $request)
    {
        return response()->json($this->service->storeLog($request), 201);
    }
}
