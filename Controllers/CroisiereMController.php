<?php

namespace App\Controllers;

use App\Services\CroisiereService;

class CroisiereMController extends Controller
{
    public function index()
    {
        $croisiereService = new CroisiereService();
        $croisieres = $croisiereService->getCroisieresByType('M');
        $this->render("CroisiereM/index", ['croisieres' => $croisieres]);
    }
}
