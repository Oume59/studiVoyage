<?php

namespace App\Controllers;

use App\Services\SejourService;

class DashSejourController extends Controller
{
    private $sejourService;

    public function __construct()
    {
        $this->sejourService = new SejourService();
    }

    public function index()
    {
        $this->render("Dashboard/AjoutSejour");
    }

    public function ajoutSejour()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->sejourService->addSejour($_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        header("Location: /Dashboard/index");
        exit();
    }

    public function updateSejour($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->sejourService->updateSejour($id, $_POST, $_FILES);
            echo json_encode($result);
            exit();
        }

        $sejour = $this->sejourService->findSejourById($id);
        $this->render('Dashboard/UpdateSejour', ['sejour' => $sejour]);
    }

    public function deleteSejour()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $result = $this->sejourService->deleteSejour($_POST['id']);
            echo json_encode($result);
            exit();
        }
        header("Location: /DashSejour/liste");
        exit();
    }

    public function liste()
    {
        $sejours = $this->sejourService->getAllSejours();
        $this->render('Dashboard/ListeSejour', ['sejours' => $sejours]);
    }
}
