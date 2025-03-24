<?php $css = 'dashsejour'; ?>
<div class="container mt-5">
    <h2 class="text-center">Modifier la Croisière</h2>
    <form action="/DashCroisiere/updateCroisiere/<?= htmlspecialchars($croisiere->id) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($croisiere->id) ?>">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <div class="mb-3">
            <label for="destination_id" class="form-label">ID Destination :</label>
            <input type="number" class="form-control" name="destination_id" value="<?= htmlspecialchars($croisiere->destination_id) ?>" required>
        </div>

        <div class="mb-3">
            <label for="jours" class="form-label">Nombre de jours :</label>
            <input type="number" class="form-control" name="jours" value="<?= htmlspecialchars($croisiere->jours) ?>" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€) :</label>
            <input type="number" class="form-control" name="prix" step="0.01" value="<?= htmlspecialchars($croisiere->prix) ?>" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée :</label>
            <input type="number" class="form-control" name="duree" value="<?= htmlspecialchars($croisiere->duree) ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" name="description" required><?= htmlspecialchars($croisiere->description) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Image actuelle :</label><br>
            <?php if (!empty($croisiere->img)): ?>
                <img src="/Public/assets/images/<?= htmlspecialchars($croisiere->img) ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <label for="img" class="form-label">Changer l'image :</label>
            <input type="file" name="img" class="form-control">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <select class="form-select" name="type">
                <option value="M" <?= $croisiere->type === 'M' ? 'selected' : '' ?>>Méditerranée</option>
                <option value="C" <?= $croisiere->type === 'C' ? 'selected' : '' ?>>Caraïbes</option>
                <option value="Ex" <?= $croisiere->type === 'Ex' ? 'selected' : '' ?>>Expéditions</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="/DashCroisiere/liste" class="btn btn-secondary">Retour</a>
        </div>
    </form>
</div>
