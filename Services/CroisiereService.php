<?php

namespace App\Services;

use App\Repository\CroisiereRepository;

class CroisiereService
{
    private $croisiereRepository;

    public function __construct()
    {
        $this->croisiereRepository = new CroisiereRepository();
    }

    public function addCroisiere(array $data, array $files)
    {
        $imageName = $this->handleImageUpload($files);
        if (!$imageName) {
            return ["status" => "error", "message" => "Erreur lors du téléchargement de l'image."];
        }

        $croisiereData = [
            'destination_id' => intval($data['destination_id'] ?? 0),
            'prix' => floatval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0),
            'type' => $data['type'] ?? 'M',
        ];

        return $this->croisiereRepository->create($croisiereData)
            ? ["status" => "success", "message" => "Croisière ajoutée avec succès", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de l'ajout de la croisière"];
    }

    public function updateCroisiere(int $id, array $data, array $files)
    {
        $croisiere = $this->croisiereRepository->find($id);
        if (!$croisiere) {
            return ["status" => "error", "message" => "Croisière introuvable"];
        }

        $imageName = !empty($files['img']['tmp_name']) ? $this->handleImageUpload($files, $croisiere->img) : $croisiere->img;

        $updateData = [
            'destination_id' => intval($data['destination_id']),
            'prix' => floatval($data['prix']),
            'description' => htmlspecialchars($data['description']),
            'img' => $imageName,
            'duree' => intval($data['duree']),
            'type' => htmlspecialchars($data['type'])
        ];

        return $this->croisiereRepository->update($id, $updateData)
            ? ["status" => "success", "message" => "Croisière mise à jour", "redirect" => "/DashCroisiere/liste"]
            : ["status" => "error", "message" => "Erreur lors de la mise à jour"];
    }

    public function findCroisiereById($id)
    {
        return $this->croisiereRepository->find($id);
    }

    public function deleteCroisiere($id)
    {
        $croisiere = $this->croisiereRepository->find($id);
        if (!$croisiere) {
            return ["status" => "error", "message" => "Croisière introuvable."];
        }

        if (!empty($croisiere->img) && file_exists("Public/assets/images/" . $croisiere->img)) {
            unlink("Public/assets/images/" . $croisiere->img);
        }

        return $this->croisiereRepository->delete($id)
            ? ["status" => "success", "message" => "Croisière supprimée", "redirect" => "/DashCroisiere/liste"]
            : ["status" => "error", "message" => "Erreur lors de la suppression"];
    }

    public function getAllCroisieres()
    {
        return $this->croisiereRepository->findAll();
    }

    public function getCroisieresByType($type)
    {
        return $this->croisiereRepository->findBy(['type' => $type]);
    }

    private function handleImageUpload($files, $oldImage = null)
    {
        $uploadDir = "Public/assets/images/";
        if (!isset($files['img']) || $files['img']['error'] !== UPLOAD_ERR_OK) {
            return $oldImage;
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExtension = strtolower(pathinfo($files['img']['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            return null;
        }

        $imageName = uniqid() . "_" . basename($files['img']['name']);
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($files['img']['tmp_name'], $imagePath)) {
            return null;
        }

        if ($oldImage && file_exists($uploadDir . $oldImage)) {
            unlink($uploadDir . $oldImage);
        }

        return $imageName;
    }
}
