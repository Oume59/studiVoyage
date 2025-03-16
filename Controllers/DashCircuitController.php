<?php

namespace App\Controllers;

use App\Services\CircuitService;

class DashCircuitController extends Controller
{
    private $circuitService;

    public function __construct()
    {
        $this->circuitService = CircuitService::getInstance(); 
    }

    public function index()
    {
        $this->render("Dashboard/AjoutCircuit");
    }

    public function ajoutCircuit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->circuitService->addCircuit($_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        header("Location: /Dashboard/index");
        exit();
    }

    public function updateCircuit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->circuitService->updateCircuit($id, $_POST, $_FILES);
            echo json_encode($result);
            exit();
        }

        $circuit = $this->circuitService->findCircuitById($id);
        $this->render('Dashboard/UpdateCircuit', ['circuit' => $circuit]);
    }

    public function deleteCircuit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $result = $this->circuitService->deleteCircuit($_POST['id']);
            echo json_encode($result);
            exit();
        }
        header("Location: /DashCircuit/liste");
        exit();
    }

    public function liste()
    {
        $circuits = $this->circuitService->getAllCircuits();
        $this->render('Dashboard/ListeCircuit', ['circuits' => $circuits]);
    }
}
