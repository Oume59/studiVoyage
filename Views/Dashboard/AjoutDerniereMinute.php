<?php
$css = 'dashsejour'; 
?>

<div class="container mt-5">
    <h2 class="text-center">Ajouter une Offre Dernière Minute</h2>
    <form action="/DashDerniereMinute/ajoutDerniereMinute" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="mb-3">
            <label for="pays" class="form-label">Pays :</label>
            <input type="text" class="form-control" id="pays" name="pays" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€) :</label>
            <input type="number" class="form-control" id="prix" name="prix" min="0" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée (jours) :</label>
            <input type="number" class="form-control" id="duree" name="duree" min="1" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" class="form-control" id="image" name="img" accept="image/*" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger">Ajouter</button>
            <button type="button" class="btn btn-secondary ms-2" onclick="window.history.back();">Annuler</button>
        </div>
    </form>
</div>

<!-- BUTTON RETURN -->
<div class="d-flex justify-content-center mt-4 mb-4">
    <a href="/Dashboard" class="btn btn-secondary">Retour</a>
</div>
</div>