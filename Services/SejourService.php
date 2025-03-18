<?php

namespace App\Services;

use App\Repository\SejourRepository;

class SejourService
{
    private $sejourRepository;

    public function __construct()
    {
        $this->sejourRepository = new SejourRepository();
    }

    public function addSejour(array $data, array $files)
    {
        $imageName = $this->handleImageUpload($files);
        if (!$imageName) {
            return ["status" => "error", "message" => "Erreur lors du téléchargement de l'image."];
        }

        $sejourData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->sejourRepository->create($sejourData)
            ? ["status" => "success", "message" => "Séjour ajouté avec succès", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de l'ajout du séjour"];
    }

    public function updateSejour(int $id, array $data, array $files)
    {
        $sejour = $this->sejourRepository->find($id);
        if (!$sejour) {
            return ["status" => "error", "message" => "Séjour introuvable"];
        }

        $imageName = !empty($files['img']['tmp_name']) ? $this->handleImageUpload($files, $sejour->img) : $sejour->img;

        $updateData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->sejourRepository->update($id, $updateData)
            ? ["status" => "success", "message" => "Séjour mis à jour", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la mise à jour"];
    }

    public function deleteSejour($id)
    {
        $sejour = $this->sejourRepository->find($id);
        if (!$sejour) {
            return ["status" => "error", "message" => "Séjour introuvable."];
        }

        if (!empty($sejour->img) && file_exists("Public/assets/images/" . $sejour->img)) {
            unlink("Public/assets/images/" . $sejour->img);
        }

        return $this->sejourRepository->delete($id)
            ? ["status" => "success", "message" => "Séjour supprimé", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la suppression"];
    }

    public function findSejourById($id)
    {
        return $this->sejourRepository->find($id);
    }

    public function getAllSejours()
    {
        return $this->sejourRepository->findAll();
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
