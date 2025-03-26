<?php $css = 'dashsejour'; ?>
<div class="container mt-5">
    <h2 class="text-center">Liste des Croisières</h2>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-primary">
            <tr>
                <th>ID Dest</th><th>Prix</th><th>Durée</th><th>Description</th><th>Type</th><th>Image</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($croisieres as $croisiere): ?>
                <tr>
                <td class="text-center align-middle"><?= htmlspecialchars($croisiere->destination_id) ?></td>
                <td class="text-center align-middle"><?= htmlspecialchars($croisiere->prix) ?> €</td>
                <td class="text-center align-middle"><?= htmlspecialchars($croisiere->duree) ?> jours</td>
                    <td class="text-wrap text-break w-25"> <?= htmlspecialchars($croisiere->description) ?> </td>
                    <td class="text-center align-middle"><?= htmlspecialchars($croisiere->type) ?></td>
                    <td class="text-center align-middle">
                        <?php if (!empty($croisiere->img)): ?>
                            <img src="/Public/assets/images/<?= htmlspecialchars($croisiere->img) ?>" width="100" height="80" class="rounded shadow-sm">
                        <?php else: ?>
                            <span class="text-muted">Aucune image</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center align-middle">
                        <a href="/DashCroisiere/updateCroisiere/<?= $croisiere->id ?>" class="btn btn-warning btn-sm mb-1">Modifier</a>
                        <form action="/DashCroisiere/deleteCroisiere" method="POST" onsubmit="return confirm('Supprimer cette croisière ?');">
                            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                            <input type="hidden" name="id" value="<?= $croisiere->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/Dashboard" class="btn btn-secondary mt-3">Retour</a>
</div>