<?php
$css = 'croisiere';
?>

<div class="container mt-5">
    <h1 class="row justify-content-center">Nos Promotions Exclusives</h1>
    <div class="row justify-content-center">
        <?php foreach ($promotions as $promotion): ?>
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="card sejour-card shadow-sm border-warning w-100">
                    <img src="/Public/assets/images/<?= htmlspecialchars($promotion->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($promotion->ville) ?>">
                    <div class="card-body d-flex flex-column text-center">
                        <h3 class="card-title text-warning"><?= htmlspecialchars($promotion->ville) ?></h3>
                        <p class="circuit-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($promotion->pays) ?></p>
                        <p class="circuit-description"><?= htmlspecialchars($promotion->description) ?></p>
                        <p class="circuit-price"><strong>À partir de <?= htmlspecialchars($promotion->prix) ?> €</strong></p>
                        <p class="circuit-duration"><i class="fas fa-clock"></i> <?= htmlspecialchars($promotion->duree) ?> jours</p>

                        <button type="button" class="btn btn-warning btn-details mt-auto" data-bs-toggle="modal" data-bs-target="#modalPromo<?= htmlspecialchars($promotion->id) ?>">
                            Voir Détails <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="modalPromo<?= htmlspecialchars($promotion->id) ?>" tabindex="-1" aria-labelledby="modalLabel<?= htmlspecialchars($promotion->id) ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title" id="modalLabel<?= htmlspecialchars($promotion->id) ?>">
                                Promo : <?= htmlspecialchars($promotion->ville) ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="/Public/assets/images/<?= htmlspecialchars($promotion->img) ?>" class="img-fluid rounded shadow mb-3 modal-img" alt="<?= htmlspecialchars($promotion->ville) ?>">
                            <h3 class="modal-subtitle"><?= htmlspecialchars($promotion->pays) ?></h3>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Ville :</strong> <?= htmlspecialchars($promotion->ville) ?></p>
                            <p><i class="fas fa-clock"></i> <strong>Durée :</strong> <?= htmlspecialchars($promotion->duree) ?> jours</p>
                            <p class="modal-description"><?= nl2br(htmlspecialchars($promotion->description)) ?></p>
                            <p class="modal-price"><strong>À partir de <?= htmlspecialchars($promotion->prix) ?> €</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
