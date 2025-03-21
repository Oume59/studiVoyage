<?php
namespace App\Controllers;
use App\Services\RegisterService;
use App\Services\ConfirmService;


Class DashUserController extends Controller
{
    public function index()
    {
        $this->render('Dashboard/AjoutUser');
    }

    public function AjoutUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Méthode de requête non autorisée."]);
            exit();
        } else {
            $data = $_POST;
            $registerService = new RegisterService();
            $registerService->register($data);
        }

    }

    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !empty($_POST['id'])) {
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Méthode de requête non autorisée."]);
            exit();
        } else {
            $registerService = new RegisterService();
            return $registerService->delete($_POST['id']);
        }
    }

    public function liste()
    {
        $registerService = new RegisterService();
        $users = $registerService->getAllUsers();
        $this->render('Dashboard/ListeUser', ['users' => $users]);
    }

    public function confirm($token)
    {
        if ($token) {
            $confirmService = new ConfirmService();
            $confirmService->confirm($token);
        }
    }

}