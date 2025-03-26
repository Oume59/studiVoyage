<?php
$css='dashboard';
?>

<section class="main">
    <div class="container-fluid admin-container">
        <h2>Dashboard Admin</h2>
        <div class="dashboard-container">
            <?php if (isset($_SESSION['id']) && isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1): ?>

                <div class="admin-link-container">
                    <a href="/DashSejour" class="admin-link">Ajouter Séjour</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashSejour/liste" class="admin-link">Liste Séjours</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashCircuit" class="admin-link">Ajouter Circuit</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashCircuit/liste" class="admin-link">Liste Circuits</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashCroisiere" class="admin-link">Ajouter Croisière</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashCroisiere/liste" class="admin-link">Liste Croisières</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashDerniereMinute" class="admin-link">Ajouter Dernière Minute</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashDerniereMinute/liste" class="admin-link">Liste Dernières Minutes</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashPromotion" class="admin-link">Ajouter Promotion</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashPromotion/liste" class="admin-link">Liste Promotions</a>
                </div>

            <?php endif; ?>

            <?php if (isset($_SESSION['id']) && isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1): ?>
                <div class="admin-link-container">
                    <a href="/DashUser" class="admin-link">Ajouter Utilisateur</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashUser/liste" class="admin-link">Liste Utilisateurs</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>