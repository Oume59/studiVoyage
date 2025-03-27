<?php

namespace App\Services;

use App\Repository\DerniereMinuteRepository;

class DerniereMinuteService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new DerniereMinuteRepository();
    }

    public function addOffre(array $data, array $files)
    {
        $imageName = $this->handleImageUpload($files);
        if (!$imageName) {
            return ["status" => "error", "message" => "Erreur upload image"];
        }

        $offre = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'duree' => intval($data['duree'] ?? 0),
            'img' => $imageName
        ];

        return $this->repo->create($offre)
            ? ["status" => "success", "message" => "Offre ajoutée", "redirect" => "/DashDerniereMinute/liste"]
            : ["status" => "error", "message" => "Erreur à l'ajout"];
    }

    public function updateOffre($id, $data, $files)
    {
        $offre = $this->repo->find($id);
        if (!$offre) return ["status" => "error", "message" => "Offre introuvable"];

        $imageName = !empty($files['img']['tmp_name']) 
            ? $this->handleImageUpload($files, $offre->img) 
            : $offre->img;

        $updateData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'duree' => intval($data['duree'] ?? 0),
            'img' => $imageName
        ];

        return $this->repo->update($id, $updateData)
            ? ["status" => "success", "message" => "Offre mise à jour", "redirect" => "/DashDerniereMinute/liste"]
            : ["status" => "error", "message" => "Erreur update"];
    }

    public function deleteOffre($id)
    {
        $offre = $this->repo->find($id);
        if (!$offre) return ["status" => "error", "message" => "Offre introuvable"];

        if (!empty($offre->img) && file_exists("Public/assets/images/" . $offre->img)) {
            unlink("Public/assets/images/" . $offre->img);
        }

        return $this->repo->delete($id)
            ? ["status" => "success", "message" => "Offre supprimée", "redirect" => "/DashDerniereMinute/liste"]
            : ["status" => "error", "message" => "Erreur suppression"];
    }

    public function getAllOffres()
    {
        return $this->repo->findAll();
    }

    public function findOffreById($id)
    {
        return $this->repo->find($id);
    }

    private function handleImageUpload($files, $oldImage = null)
    {
        $uploadDir = "Public/assets/images/";
        if (!isset($files['img']) || $files['img']['error'] !== UPLOAD_ERR_OK) return $oldImage;

        $ext = strtolower(pathinfo($files['img']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        if (!in_array($ext, $allowed)) return null;

        $imageName = uniqid() . "_" . basename($files['img']['name']);
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($files['img']['tmp_name'], $imagePath)) return null;

        if ($oldImage && file_exists($uploadDir . $oldImage)) unlink($uploadDir . $oldImage);

        return $imageName;
    }
}