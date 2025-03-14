<?php

namespace App\Repository;

use App\Config\Db;

abstract class DbRepository
{
    protected $table;
    private $db;


    public function create($data)
    {
        $champs = [];
        $inter = [];
        $valeurs = [];

        foreach ($data as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        $listChamps = implode(', ', $champs);
        $listeInter = implode(', ', $inter);
        $sql = 'INSERT INTO ' . $this->table . ' (' . $listChamps . ') VALUES (' . $listeInter . ')';
        return $this->req($sql, $valeurs);
    }


    public function findAll()
    {
        $query = $this->req('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }


    public function find(int $id)
    {
        return $this->req("SELECT * FROM " . $this->table . " WHERE id = ?", [$id])->fetch();
    }


    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        $listeChamps = implode(' AND ', $champs);

        return $this->req("SELECT * FROM " . $this->table . " WHERE " . $listeChamps, $valeurs)->fetchAll();
    }

    public function findOneBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }

        $listeChamps = implode(' AND ', $champs);

        return $this->req("SELECT * FROM " . $this->table . " WHERE " . $listeChamps, $valeurs)->fetch();
    }


    public function update(int $id, array $data)
    {
        $champs = [];
        $valeurs = [];

        foreach ($data as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;
        $listChamps = implode(', ', $champs);

        return $this->req('UPDATE ' . $this->table . ' SET ' . $listChamps . ' WHERE id = ?', $valeurs);
    }


    public function delete(int $id)
    {
        return $this->req('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }


    public function req(string $sql, array $attributes = null)
    {
        $this->db = Db::getInstance();

        if ($attributes !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributes);
            return $query;
        } else {
            return $this->db->query($sql);
        }
    }
}
