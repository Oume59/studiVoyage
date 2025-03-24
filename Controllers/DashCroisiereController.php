<?php

namespace App\Controllers;

use App\Services\CroisiereService;

class DashCroisiereController extends Controller
{
    private $croisiereService;

    public function __construct()
    {
        $this->croisiereService = new CroisiereService();
    }

    public function index()
    {
        $this->render("Dashboard/AjoutCroisiere");
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
