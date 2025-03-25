<?php

namespace App\Repository;

use App\Config\Db;

class DestinationRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM Destinations");
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Destinations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
