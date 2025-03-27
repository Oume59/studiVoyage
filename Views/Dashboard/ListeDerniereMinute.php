<?php $css = 'dashsejour'; ?>

<div class="container mt-5">
    <h2 class="text-center">Liste des Offres Dernières Minutes</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-danger">
                <tr>
                    <th>Pays</th>
                    <th>Ville</th>
                    <th>Prix</th>
                    <th>Durée</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offres as $offre): ?>
                    <tr>
                    <td class="text-center align-middle"><?= htmlspecialchars($offre->pays) ?></td>
                    <td class="text-center align-middle"><?= htmlspecialchars($offre->ville) ?></td>
                    <td class="text-center align-middle"><?= htmlspecialchars($offre->prix) ?> €</td>
                    <td class="text-center align-middle"><?= htmlspecialchars($offre->duree) ?> jours</td>
                        <td class="text-wrap text-break w-25"> <?= htmlspecialchars($offre->description) ?></td>
                        <td class="text-center align-middle">
                            <?php if (!empty($offre->img)): ?>
                                <img src="/Public/assets/images/<?= htmlspecialchars($offre->img) ?>" width="100" height="80" class="rounded shadow-sm">
                            <?php else: ?>
                                <span class="text-muted">Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center align-middle">
                            <a href="/DashDerniereMinute/updateDerniereMinute/<?= $offre->id ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="/DashDerniereMinute/deleteDerniereMinute" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <input type="hidden" name="id" value="<?= $offre->id ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                <!-- BUTTON RETURN -->
                <div class="text-end mb-4">
        <a href="/Dashboard" class="btn btn-secondary">Retour</a>
    </div>
    </div>
</div>