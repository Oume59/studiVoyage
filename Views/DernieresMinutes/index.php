<?php
$css='derniereMinute';
?>

<section class="container mt-5 dernieres-minutes">
    <h1 class="text-center py-4 text-danger">Nos Offres Dernières Minutes</h1>
    <div class="row justify-content-center">
        <?php foreach ($offres as $offre): ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-danger h-100">
                    <img src="/Public/assets/images/<?= htmlspecialchars($offre->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($offre->ville) ?>">
                    <div class="card-body text-center d-flex flex-column">
                        <h3 class="card-title text-danger"><?= htmlspecialchars($offre->ville) ?></h3>
                        <p><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($offre->pays) ?></p>
                        <p><?= htmlspecialchars($offre->description) ?></p>
                        <p><strong>À partir de <?= htmlspecialchars($offre->prix) ?>€</strong></p>
                        <p><i class="fas fa-clock"></i> <?= htmlspecialchars($offre->duree) ?> jours</p>
                        <a href="#" class="btn btn-danger mt-auto">Réserver Maintenant</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
