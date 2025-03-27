<?php

namespace App\Repository;

class DerniereMinuteRepository extends DbRepository{

    public function __construct()
    {
        $this->table = 'DernieresMinutes';
    }
}