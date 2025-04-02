<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
     // Autoriser les users avec le rôle 1 (Admin) ou le rôle 2 (User) à accéder au dash
    if (isset($_SESSION['id']) && isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2)) {
        $this->render('Dashboard/index');
        } else {
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}
}