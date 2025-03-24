<?php

namespace App\Controllers;

use App\Services\CroisiereService;

class CroisiereExController extends Controller
{
    public function index()
    {
        $croisiereService = new CroisiereService();
        $croisieres = $croisiereService->getCroisieresByType('Ex');
        $this->render("CroisiereEx/index", ['croisieres' => $croisieres]);
    }
}
