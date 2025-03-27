<div class="container mt-5">
    <h2 class="text-center">Liste des Circuits</h2>

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
                <?php foreach ($circuits as $circuit): ?>
                    <tr>
                    <td class="text-center align-middle"><?= htmlspecialchars($circuit->pays) ?></td>
                    <td class="text-center align-middle"><?= htmlspecialchars($circuit->ville) ?></td>
                    <td class="text-center align-middle"><?= htmlspecialchars($circuit->prix) ?> €</td>
                    <td class="text-center align-middle"><?= htmlspecialchars($circuit->duree) ?> jours</td>
                        <td class="text-wrap text-break w-25">
                            <?= htmlspecialchars($circuit->description) ?>
                        </td>
                        <td class="text-center align-middle">
                            <?php if (!empty($circuit->img)): ?>
                                <img src="/Public/assets/images/<?= htmlspecialchars($circuit->img) ?>" width="100" height="80" class="rounded shadow-sm mx-auto d-block" alt="Image circuit">
                            <?php else: ?>
                                <span class="text-muted">Aucune image</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center align-middle">
                            <div class="d-flex flex-column gap-2 align-items-center">

                                <a href="/DashCircuit/updateCircuit/<?= htmlspecialchars($circuit->id) ?>" class="btn btn-warning btn-sm w-100">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>

                                <form action="/DashCircuit/deleteCircuit" method="POST" class="w-100" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce circuit ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $circuit->id ?>">
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

    <!-- ALERT MESSAEGE -->
    <div class="mt-3">
        <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
    </div>

    <!-- BUTTON RETURN -->
    <div class="text-end mb-4">
        <a href="/Dashboard" class="btn btn-secondary">Retour</a>
    </div>
</div>