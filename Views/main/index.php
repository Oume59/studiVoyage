<?php
$css='acceuil';
?>

<section class="hero">
        <video autoplay loop muted playsinline class="hero-video">
            <source src="/assets/video/plage.mp4" type="video/mp4">
        </video>
        <div class="hero-overlay">
            <h1 class="hero-title">PARTEZ À L’AVENTURE AVEC NOUS !</h1>
            <p class="hero-subtitle">Découvrez le monde autrement</p>
            <a href="#search" class="btn btn-primary btn-lg">Commencez votre voyage</a>
        </div>
    </section>

    <section id="search" class="search-bar container mt-5">
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Saisissez votre destination (Pays, Ville)">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Ville de départ">
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option selected>Durée</option>
                    <option>1 à 2 Nuits</option>
                    <option>3 à 6 Nuits</option>
                    <option>1 Semaine</option>
                    <option>Plus d'une semaine</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-warning w-100">🔍 Rechercher</button>
            </div>
        </div>
    </section>


    <section class="categories container mt-5">
        <div class="row text-center">
            <div class="col-md-3">
                <a href="#" class="category-card">
                    <img src="/assets/images/image/sejours.jpg" alt="Séjours">
                    <h3>Séjours</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="category-card">
                    <img src="/assets/images/image/circuits.jpg" alt="Circuits">
                    <h3>Circuits</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="category-card">
                    <img src="/assets/images/image/vols.jpg" alt="Vols">
                    <h3>Vols</h3>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="category-card">
                    <img src="/assets/images/image/croisiere.jpg" alt="Croisières">
                    <h3>Croisières</h3>
                </a>
            </div>
        </div>
    </section>