<?php

namespace App\Repository;

class CircuitRepository extends DbRepository{

    public function __construct()
    {
        $this->table = 'Circuits';
    }
}