<?php

namespace App\Controllers;

use App\Services\DerniereMinuteService;

class DerniereMinuteController extends Controller
{
    public function index()
    {
        $service = new DerniereMinuteService();
        $offres = $service->getAllOffres();
        $this->render("DernieresMinutes/index", ["offres" => $offres]);
    }
}
