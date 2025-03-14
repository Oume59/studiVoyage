<?php
$css='circuit';
?>
<section class="container mt-5">
    <h1 class="text-center py-4 section-title">🌎 Nos Circuits à Découvrir</h1>
    <div class="row">
        <?php foreach ($circuits as $circuit): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card circuit-card">
                    <img src="/Public/assets/images/<?= htmlspecialchars($circuit->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($circuit->pays) ?>">
                    <div class="card-body text-center">
                        <h3 class="card-title"><?= htmlspecialchars($circuit->pays) ?></h3>
                        <p class="circuit-location"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($circuit->ville) ?></p>
                        <p class="circuit-description"><?= htmlspecialchars($circuit->description) ?></p>
                        <p class="circuit-price"><strong>À partir de <?= htmlspecialchars($circuit->prix) ?> €</strong></p>
                        <p class="circuit-duration"><i class="fas fa-clock"></i> <?= htmlspecialchars($circuit->duree) ?> jours</p>

                        
                        <button type="button" class="btn btn-primary btn-details" data-bs-toggle="modal" data-bs-target="#modalCircuit<?= htmlspecialchars($circuit->id) ?>">
                            Voir Détails
                        </button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modalCircuit<?= htmlspecialchars($circuit->id) ?>" tabindex="-1" aria-labelledby="modalLabel<?= htmlspecialchars($circuit->id) ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?= htmlspecialchars($circuit->id) ?>">Circuit à <?= htmlspecialchars($circuit->ville) ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="/Public/assets/images/<?= htmlspecialchars($circuit->img) ?>" class="img-fluid mb-3 modal-img" alt="<?= htmlspecialchars($circuit->ville) ?>">
                            <h3 class="modal-subtitle"><?= htmlspecialchars($circuit->pays) ?></h3>
                            <p><i class="fas fa-map-marker-alt"></i> <strong>Ville :</strong> <?= htmlspecialchars($circuit->ville) ?></p>
                            <p><i class="fas fa-clock"></i> <strong>Durée :</strong> <?= htmlspecialchars($circuit->duree) ?> jours</p>
                            <p class="modal-description"><?= htmlspecialchars($circuit->description) ?></p>
                            <p class="modal-price"><strong>À partir de <?= htmlspecialchars($circuit->prix) ?> €</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
