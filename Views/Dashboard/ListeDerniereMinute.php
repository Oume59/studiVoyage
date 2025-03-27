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
                        <td><?= htmlspecialchars($offre->pays) ?></td>
                        <td><?= htmlspecialchars($offre->ville) ?></td>
                        <td><?= htmlspecialchars($offre->prix) ?> €</td>
                        <td><?= htmlspecialchars($offre->duree) ?> jours</td>
                        <td class="text-wrap text-break w-25"> <?= htmlspecialchars($offre->description) ?></td>
                        <td>
                            <?php if (!empty($offre->img)): ?>
                                <img src="/Public/assets/images/<?= htmlspecialchars($offre->img) ?>" width="100" height="80" class="rounded shadow-sm">
                            <?php else: ?>
                                <span class="text-muted">Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td>
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
    </div>
</div>