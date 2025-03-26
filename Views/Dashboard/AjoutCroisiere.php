<?php 
$css = 'dashsejour';
?>


<div class="container mt-5">
    <h2 class="text-center">Ajouter une Nouvelle Croisière</h2>

    <form action="/DashCroisiere/ajoutCroisiere" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="mb-3">
            <label for="destination_id" class="form-label">Destination :</label>
            <select class="form-select" id="destination_id" name="destination_id" required>
                <option value=""> Choisir une destination </option>
                <?php foreach ($destinations as $dest): ?>
                    <option value="<?= $dest->id ?>"><?= htmlspecialchars($dest->pays) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€) :</label>
            <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée :</label>
            <input type="number" class="form-control" id="duree" name="duree" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image :</label>
            <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <select class="form-select" id="type" name="type" required>
                <option value="M">Méditerranée</option>
                <option value="C">Caraïbes</option>
                <option value="Ex">Expéditions</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-warning">Ajouter</button>
            <button type="button" class="btn btn-secondary ms-2" onclick="window.history.back();">Annuler</button>
        </div>
    </form>

    <!-- Conteneurs des messages -->
    <div class="mt-3">
        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
    </div>

    <!-- BUTTON RETURN -->
    <div class="text-end mt-3">
        <a href="/Dashboard" class="btn btn-secondary">Retour</a>
    </div>
</div>
