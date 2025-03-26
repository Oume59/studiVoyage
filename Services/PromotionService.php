<?php

namespace App\Services;

use App\Repository\PromotionRepository;

class PromotionService
{
    private $promotionRepository;

    public function __construct()
    {
        $this->promotionRepository = new PromotionRepository();
    }

    public function addPromotion(array $data, array $files)
    {
        $imageName = $this->handleImageUpload($files);
        if (!$imageName) {
            return ["status" => "error", "message" => "Erreur lors du téléchargement de l'image."];
        }

        $promotionData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->promotionRepository->create($promotionData)
            ? ["status" => "success", "message" => "Promotion ajoutée avec succès", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de l'ajout de la promotion"];
    }

    public function updatePromotion(int $id, array $data, array $files)
    {
        $promotion = $this->promotionRepository->find($id);
        if (!$promotion) {
            return ["status" => "error", "message" => "Promotion introuvable"];
        }

        $imageName = !empty($files['img']['tmp_name']) ? $this->handleImageUpload($files, $promotion->img) : $promotion->img;

        $updateData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->promotionRepository->update($id, $updateData)
            ? ["status" => "success", "message" => "Promotion mise à jour", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la mise à jour"];
    }

    public function deletePromotion($id)
    {
        $promotion = $this->promotionRepository->find($id);
        if (!$promotion) {
            return ["status" => "error", "message" => "Promotion introuvable."];
        }

        if (!empty($promotion->img) && file_exists("Public/assets/images/" . $promotion->img)) {
            unlink("Public/assets/images/" . $promotion->img);
        }

        return $this->promotionRepository->delete($id)
            ? ["status" => "success", "message" => "Promotion supprimée", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la suppression"];
    }

    public function findPromotionById($id)
    {
        return $this->promotionRepository->find($id);
    }

    public function getAllPromotions()
    {
        return $this->promotionRepository->findAll();
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
