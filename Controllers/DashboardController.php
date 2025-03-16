<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id']) && $_SESSION['role'] === 'Admin') {
        $this->render('Dashboard/index');
    }else {
        http_response_code(404);
        echo "la page recherchée n'existe pas";
    }
}

}