<div class="container mt-5">
    <h2 class="text-center">Liste des Séjours</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
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
                <?php foreach ($sejours as $sejour): ?>
                    <tr>
                        <td><?= htmlspecialchars($sejour->pays) ?></td>
                        <td><?= htmlspecialchars($sejour->ville) ?></td>
                        <td><?= htmlspecialchars($sejour->prix) ?> €</td>
                        <td><?= htmlspecialchars($sejour->duree) ?> jours</td>
                        <td class="text-truncate" style="max-width: 200px;"><?= htmlspecialchars($sejour->description) ?></td>
                        <td>
                            <?php if (!empty($sejour->img)): ?>
                                <img src="/Public/assets/images/<?= htmlspecialchars($sejour->img) ?>" width="100" height="80" class="rounded shadow-sm" alt="Image séjour">
                            <?php else: ?>
                                <span class="text-muted">Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex flex-column gap-2">
                              
                                <a href="/DashSejour/updateSejour/<?= htmlspecialchars($sejour->id) ?>" class="btn btn-warning btn-sm w-100">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>

                                <form action="/DashSejour/deleteSejour" method="POST" class="w-100" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce séjour ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $sejour->id ?>">
                                    <button type="submit" class="btn btn-danger btn-sm w-100">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ALERT MESSAGE -->
    <div class="mt-3">
        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
    </div>

    <!-- BUTTON RETURN -->
    <div class="text-end">
        <a href="/Dashboard" class="btn btn-secondary">Retour</a>
    </div>
</div>