<?php

namespace App\Controllers;
use App\Services\PromotionService;

class PromotionController extends Controller {
    private $promotionService;

    public function __construct()
    {
        $this->promotionService = new PromotionService();
    }

    public function index()
    {
        $promotions = $this->promotionService->getAllPromotions();
        $this->render("Promotions/index", ["promotions" => $promotions]);
    }
}
