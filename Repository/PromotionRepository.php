<?php

namespace App\Repository;

class PromotionRepository extends DbRepository{

    public function __construct()
    {
        $this->table = 'Promotions';
    }
}