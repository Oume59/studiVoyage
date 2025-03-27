<?php

namespace App\Controllers;
use App\Repository\CircuitRepository;
class CircuitController extends Controller {

    public function index()
    {
        $circuitRepository = new CircuitRepository();
        $circuits = $circuitRepository->findAll();
        $this->render("Circuits/index",[
            "circuits" => $circuits
        ]);
    }
}