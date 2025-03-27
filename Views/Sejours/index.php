<?php
$css='sejour';
?>

<section class="hero-sejour">
    <div class="overlay">
        <h1>Explorez Nos Séjours Inoubliables</h1>
        <p>Découvrez les plus belles destinations à prix abordables.</p>
    </div>
</section>

<div class="container mt-5">
    <h1 class="text-center py-4 section-title">🌍 Nos Séjours à Découvrir</h1>
    <div class="row justify-content-center">
        <?php foreach ($sejours as $sejour): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card sejour-card shadow-sm">
                    <img src="/Public/assets/images/<?= htmlspecialchars($sejour->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($sejour->ville) ?>">
                    <div class="card-body d-flex flex-column text-center">
                        <h3 class="card-title"><?= htmlspecialchars($sejour->ville) ?></h3>
                        <p class="circuit-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($sejour->pays) ?></p>
                        <p class="circuit-description"><?= htmlspecialchars($sejour->description) ?></p>
                        <p class="circuit-price"><strong>À partir de <?= htmlspecialchars($sejour->prix) ?> €</strong></p>
                        <p class="circuit-duration"><i class="fas fa-clock"></i> <?= htmlspecialchars($sejour->duree) ?> jours</p>

                        <button type="button" class="btn btn-primary btn-details mt-auto" data-bs-toggle="modal" data-bs-target="#modalSejour<?= htmlspecialchars($sejour->id) ?>">
                            Voir Détails <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modalSejour<?= htmlspecialchars($sejour->id) ?>" tabindex="-1" aria-labelledby="modalLabel<?= htmlspecialchars($sejour->id) ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalLabel<?= htmlspecialchars($sejour->id) ?>">
                                <i class="fas fa-plane"></i> Séjour à <?= htmlspecialchars($sejour->ville) ?>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="/Public/assets/images/<?= htmlspecialchars($sejour->img) ?>" class="img-fluid rounded shadow mb-3 modal-img" alt="<?= htmlspecialchars($sejour->ville) ?>">
                            <h3 class="modal-subtitle"><?= htmlspecialchars($sejour->pays) ?></h3>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Ville :</strong> <?= htmlspecialchars($sejour->ville) ?></p>
                            <p><i class="fas fa-clock"></i> <strong>Durée :</strong> <?= htmlspecialchars($sejour->duree) ?> jours</p>
                            <p class="modal-description"><?= nl2br(htmlspecialchars($sejour->description)) ?></p>
                            <p class="modal-price"><strong>À partir de <?= htmlspecialchars($sejour->prix) ?> €</strong></p>
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