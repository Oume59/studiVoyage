<?php
$css='circuit';
?>
<section class="container mt-5">
    <h1 class="text-center py-4 section-title">Croisières en Méditerranée</h1>
    <div class="row justify-content-center">
        <?php foreach ($croisieres as $croisiere): ?>
            <?php if ($croisiere->type === 'M'): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card circuit-card">
                        <img src="/Public/assets/images/<?= htmlspecialchars($croisiere->img) ?>" class="card-img-top" alt="Image">
                        <div class="card-body text-center">
                            <p class="circuit-description"><?= htmlspecialchars($croisiere->description) ?></p>
                            <p class="circuit-price"><strong><?= htmlspecialchars($croisiere->prix) ?> €</strong></p>
                            <p class="circuit-duration"><?= htmlspecialchars($croisiere->duree) ?> nuits</p>
                            <button class="btn btn-primary">Réserver</button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- BUTTON RETURN -->
<div class="d-flex justify-content-center mb-4">
    <a href="/Croisiere" class="btn btn-primary">Retour</a>
</div>
