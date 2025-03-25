<?php

namespace App\Controllers;

use App\Services\CroisiereService;
use App\Repository\DestinationRepository;

class DashCroisiereController extends Controller
{
    private $croisiereService;
    private $destinationRepository;

    public function __construct()
    {
        $this->croisiereService = new CroisiereService();
        $this->destinationRepository = new DestinationRepository();
    }

    public function index()
    {
        $destinations = $this->destinationRepository->findAll();
        $this->render("Dashboard/AjoutCroisiere", ['destinations' => $destinations]);
    }

    public function ajoutCroisiere()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->croisiereService->addCroisiere($_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        header("Location: /Dashboard/index");
        exit();
    }

    public function updateCroisiere($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->croisiereService->updateCroisiere($id, $_POST, $_FILES);
            echo json_encode($result);
            exit();
        }

        $croisiere = $this->croisiereService->findCroisiereById($id);
        $this->render('Dashboard/UpdateCroisiere', ['croisiere' => $croisiere]);
    }

    public function deleteCroisiere()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $result = $this->croisiereService->deleteCroisiere($_POST['id']);
            echo json_encode($result);
            exit();
        }
        header("Location: /DashCroisiere/liste");
        exit();
    }

    public function liste()
    {
        $croisieres = $this->croisiereService->getAllCroisieres();
        $this->render('Dashboard/ListeCroisiere', ['croisieres' => $croisieres]);
    }
}
