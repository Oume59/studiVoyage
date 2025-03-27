<?php

namespace App\Controllers;

use App\Services\DerniereMinuteService;

class DashDerniereMinuteController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new DerniereMinuteService();
    }

    public function index()
    {
        $this->render("Dashboard/AjoutDerniereMinute");
    }

    public function ajoutDerniereMinute()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->addOffre($_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        header("Location: /Dashboard/index");
        exit();
    }

    public function updateDerniereMinute($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->updateOffre($id, $_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        $offre = $this->service->findOffreById($id);
        $this->render("Dashboard/UpdateDerniereMinute", ['offre' => $offre]);
    }

    public function deleteDerniereMinute()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $result = $this->service->deleteOffre($_POST['id']);
            echo json_encode($result);
            exit();
        }
        header("Location: /DashDerniereMinute/liste");
        exit();
    }

    public function liste()
    {
        $offres = $this->service->getAllOffres();
        $this->render("Dashboard/ListeDerniereMinute", ['offres' => $offres]);
    }
}