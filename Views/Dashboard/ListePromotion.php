<?php $css = 'dashsejour'; ?>
<div class="container mt-5">
    <h2 class="text-center">Liste des Promotions</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-warning">
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
                <?php foreach ($promotions as $promotion): ?>
                    <tr>
                        <td class="text-center align-middle"><?= htmlspecialchars($promotion->pays) ?></td>
                        <td class="text-center align-middle"><?= htmlspecialchars($promotion->ville) ?></td>
                        <td class="text-center align-middle"><?= htmlspecialchars($promotion->prix) ?> €</td>
                        <td class="text-center align-middle"><?= htmlspecialchars($promotion->duree) ?> jours</td>
                        <td class="text-wrap text-break w-25"><?= htmlspecialchars($promotion->description) ?></td>
                        <td class="text-center align-middle">
                            <?php if (!empty($promotion->img)): ?>
                                <img src="/Public/assets/images/<?= htmlspecialchars($promotion->img) ?>" width="100" height="80" class="rounded shadow-sm" alt="Image promotion">
                            <?php else: ?>
                                <span class="text-muted">Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center align-middle">
                            <div class="d-flex flex-column gap-2">
                                <a href="/DashPromotion/updatePromotion/<?= htmlspecialchars($promotion->id) ?>" class="btn btn-warning btn-sm w-100">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>

                                <form action="/DashPromotion/deletePromotion" method="POST" class="w-100" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette promotion ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $promotion->id ?>">
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

    <div class="mt-3">
        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
    </div>

    <div class="text-end">
        <a href="/Dashboard" class="btn btn-secondary">Retour</a>
    </div>
</div>
