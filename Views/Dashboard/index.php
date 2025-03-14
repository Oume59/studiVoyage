<?php
$css='dashboard';
?>

<section class="main">
    <div class="container-fluid admin-container">
        <h2>Dashboard Admin</h2>
        <div class="dashboard-container">
            <?php if (isset($_SESSION['id']) && ($_SESSION['role'] === 'Admin')): ?>

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
                    <a href="/DashCroisieres" class="admin-link">Ajouter Croisière</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashCroisieres/liste" class="admin-link">Liste Croisières</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashDernieresMinutes" class="admin-link">Dernières Minutes</a>
                </div>
                <div class="admin-link-container">
                    <a href="/DashDernieresMinutes/liste" class="admin-link">Liste Dernières Minutes</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashPromotions" class="admin-link">Promotions</a>
                </div>

                <div class="admin-link-container">
                    <a href="/DashPromotions/liste" class="admin-link">Liste Promotions</a>
                </div>

            <?php endif; ?>

            <?php if (isset($_SESSION['id']) && $_SESSION['role'] === 'Admin'): ?>
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