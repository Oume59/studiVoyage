<?php

namespace App\Controllers;

use App\Services\CroisiereService;

class CroisiereCController extends Controller
{
    public function index()
    {
        $croisiereService = new CroisiereService();
        $croisieres = $croisiereService->getCroisieresByType('C');
        $this->render("CroisiereC/index", ['croisieres' => $croisieres]);
    }
}
