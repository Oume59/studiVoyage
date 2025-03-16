<?php

namespace App\Services;

use App\Repository\CircuitRepository;

class CircuitService
{
    private static $instance = null;
    private $circuitRepository;

    private function __construct()
    {
        $this->circuitRepository = new CircuitRepository();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new CircuitService();
        }
        return self::$instance;
    }

    public function addCircuit(array $data, array $files)
    {
        $imageName = $this->handleImageUpload($files);
        if (!$imageName) {
            return ["status" => "error", "message" => "Erreur lors du téléchargement de l'image."];
        }

        $circuitData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->circuitRepository->create($circuitData)
            ? ["status" => "success", "message" => "Circuit ajouté avec succès", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de l'ajout du circuit"];
    }

    public function updateCircuit(int $id, array $data, array $files)
    {
        $circuit = $this->circuitRepository->find($id);
        if (!$circuit) {
            return ["status" => "error", "message" => "Circuit introuvable"];
        }

        $imageName = !empty($files['img']['tmp_name']) ? $this->handleImageUpload($files, $circuit->img) : $circuit->img;

        $updateData = [
            'pays' => htmlspecialchars($data['pays'] ?? ''),
            'ville' => htmlspecialchars($data['ville'] ?? ''),
            'prix' => intval($data['prix'] ?? 0),
            'description' => htmlspecialchars($data['description'] ?? ''),
            'img' => $imageName,
            'duree' => intval($data['duree'] ?? 0)
        ];

        return $this->circuitRepository->update($id, $updateData)
            ? ["status" => "success", "message" => "Circuit mis à jour", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la mise à jour"];
    }

    public function deleteCircuit($id)
    {
        $circuit = $this->circuitRepository->find($id);
        if (!$circuit) {
            return ["status" => "error", "message" => "Circuit introuvable."];
        }

        if (!empty($circuit->img) && file_exists("Public/assets/images/" . $circuit->img)) {
            unlink("Public/assets/images/" . $circuit->img);
        }

        return $this->circuitRepository->delete($id)
            ? ["status" => "success", "message" => "Circuit supprimé", "redirect" => "/Dashboard/index"]
            : ["status" => "error", "message" => "Erreur lors de la suppression"];
    }

    public function findCircuitById($id)
    {
        return $this->circuitRepository->find($id);
    }

    public function getAllCircuits()
    {
        return $this->circuitRepository->findAll();
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
