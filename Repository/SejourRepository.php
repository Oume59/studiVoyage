<?php

namespace App\Repository;

class SejourRepository extends DbRepository{

    public function __construct()
    {
        $this->table = 'Sejours';
    }
}