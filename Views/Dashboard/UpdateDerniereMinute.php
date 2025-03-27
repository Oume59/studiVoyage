<div class="container mt-5">
    <h2 class="text-center">Modifier une Offre Dernière Minute</h2>
    <form action="/DashDerniereMinute/updateDerniereMinute/<?= $offre->id ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="id" value="<?= $offre->id ?>">

        <div class="mb-3">
            <label for="pays" class="form-label">Pays :</label>
            <input type="text" id="pays" name="pays" value="<?= htmlspecialchars($offre->pays) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($offre->ville) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€) :</label>
            <input type="number" id="prix" name="prix" value="<?= htmlspecialchars($offre->prix) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée (jours) :</label>
            <input type="number" id="duree" name="duree" value="<?= htmlspecialchars($offre->duree) ?>" required class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea id="description" name="description" class="form-control" required><?= htmlspecialchars($offre->description) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image actuelle :</label><br>
            <?php if (!empty($offre->img)): ?>
                <img src="/Public/assets/images/<?= htmlspecialchars($offre->img) ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" id="img" name="img" class="form-control">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="/DashDerniereMinute/liste" class="btn btn-secondary">Retour</a>
        </div>
    </form>
</div>
