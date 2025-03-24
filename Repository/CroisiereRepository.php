<?php

namespace App\Repository;

class CroisiereRepository extends DbRepository{

    public function __construct()
    {
        $this->table = 'Croisieres';
    }

    public function search()
{
    return $this->req(
        "SELECT c.id, c.jours, c.prix, c.description, c.img, c.duree, d.pays
         FROM ". $this->table ." c
         JOIN Destinations d ON c.destination_id = d.id"
    )->fetchAll();
}

public function searchById($id)
{
    return $this->req(
        "SELECT c.id, c.jours, c.prix, c.description, c.img, c.duree, d.pays
         FROM ". $this->table ." c
         JOIN Destinations d ON c.destination_id = d.id
         WHERE c.id = ?",
        [$id]
    )->fetch();
}

}