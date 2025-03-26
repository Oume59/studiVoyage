<?php

namespace App\Controllers;

use App\Services\PromotionService;

class DashPromotionController extends Controller
{
    private $promotionService;

    public function __construct()
    {
        $this->promotionService = new PromotionService();
    }

    public function index()
    {
        $this->render("Dashboard/AjoutPromotion");
    }

    public function ajoutPromotion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->promotionService->addPromotion($_POST, $_FILES);
            echo json_encode($result);
            exit();
        }
        header("Location: /Dashboard/index");
        exit();
    }

    public function updatePromotion($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->promotionService->updatePromotion($id, $_POST, $_FILES);
            echo json_encode($result);
            exit();
        }

        $promotion = $this->promotionService->findPromotionById($id);
        $this->render('Dashboard/UpdatePromotion', ['promotion' => $promotion]);
    }

    public function deletePromotion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            $result = $this->promotionService->deletePromotion($_POST['id']);
            echo json_encode($result);
            exit();
        }
        header("Location: /DashPromotion/liste");
        exit();
    }

    public function liste()
    {
        $promotions = $this->promotionService->getAllPromotions();
        $this->render('Dashboard/ListePromotion', ['promotions' => $promotions]);
    }
}
