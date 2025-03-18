<div class="container mt-5">
    <h2 class="text-center">Modifier le Séjour</h2>

    <form action="/DashSejour/updateSejour/<?= htmlspecialchars($sejour->id) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($sejour->id) ?>">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="mb-3">
            <label for="pays" class="form-label">Pays :</label>
            <input type="text" id="pays" name="pays" value="<?= htmlspecialchars($sejour->pays) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($sejour->ville) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€) :</label>
            <input type="number" id="prix" name="prix" value="<?= htmlspecialchars($sejour->prix) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée (jours) :</label>
            <input type="number" id="duree" name="duree" value="<?= htmlspecialchars($sejour->duree) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea id="description" name="description" class="form-control" required><?= htmlspecialchars($sejour->description) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image actuelle :</label><br>
            <?php if (!empty($sejour->img)): ?>
                <img src="/<?= htmlspecialchars($sejour->img) ?>" width="150" class="mb-2" alt="Image séjour"><br>
            <?php else: ?>
                <span class="text-muted">Aucune image</span><br>
            <?php endif; ?>
            <label class="form-label">Changer l'image :</label>
            <input type="file" id="img" name="img" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="/DashSejour/liste" class="btn btn-secondary">Retour</a>
        </div>
    </form>

    <div class="mt-3">
        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
    </div>
</div>