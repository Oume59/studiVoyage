<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/fc9e0b48d5.js" crossorigin="anonymous"></script>
        <script src="/js/script.js" defer></script>
        <link rel="stylesheet" href="/assets/css/default.css">
    <title>Studi Voyage</title>
    <link href="/assets/css/<?php if(isset($css)){echo $css;}?>.css" rel="stylesheet">
    <link href="/assets/css/<?php if(isset($style)){echo $style;}?>.css" rel="stylesheet">
    <title><?php if(isset($title)){echo $title;}?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand logo" href="/">
            <img class="logo" src="/assets/images/logo/logoprojet.webp" alt="LOGO" width="100">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">


                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="/Sejour">Séjours</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="/Circuits">Circuits</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="croisieresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Croisières
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="croisieresDropdown">
                        <li><a class="dropdown-item" href="/CroisiereM">Croisières Méditerranée</a></li>
                        <li><a class="dropdown-item" href="/CroisiereC">Croisières Caraïbes</a></li>
                        <li><a class="dropdown-item" href="/CroisiereEx">Expéditions Polaires</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/DernieresMinutes">Dernières Minutes</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/Promotions">Promotions</a>
                </li>


                <?php if(isset($_SESSION['id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/log/logout" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
                        Déconnexion
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/log">Connexion</a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['id']) && ($_SESSION['role'] === 'Admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/Dashboard">Dashboard</a>
                        </li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

    <main>
        <?= $contenu ?>
    </main>

    <footer class="footer py-4 bg-dark text-light text-center">
        <div class="col-md-4">
                <p class="footer-text">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#mentionsLegalesModal"><strong>Mentions légales.</strong></a><br>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#confidentialiteModal"><strong>Politique de confidentialité.</strong></a><br>
                    <strong><i class="fa-regular fa-copyright"></i> 2025 Copyright : Tous droits réservés<br> Mélissa Ould Youcef</strong>
                </p>
            </div>
        </div>
        <div class="social-icons">
            <a href="https://www.linkedin.com" class="linkedin"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com" class="instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com" class="twitter"><i class="fab fa-x-twitter"></i></a>
        </div>

        <!-- MODALS -->
    <div class="modal fade" id="mentionsLegalesModal" tabindex="-1" aria-labelledby="mentionsLegalesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="mentionsLegalesModalLabel"><strong>Mentions légales</strong></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Ce site est édité par : <strong>Mélissa OY</strong></p>
                    <p>Siège social : 75000 PARIS</p>
                    <p>Email : blablabla@blabla.com</p>
                    <p>SIRET : 123 000 000 00000</p>
                    <p>Forme juridique : Société à responsabilité limitée (SARL)</p>
                    <p>Hébergeur : OVH, 2 Rue Kellermann, 59100 Roubaix, France</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confidentialiteModal" tabindex="-1" aria-labelledby="confidentialiteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="confidentialiteModalLabel"><strong>Politique de confidentialité</strong></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cookies utilisés : Nous utilisons uniquement les cookies de session nécessaires au fonctionnement du site. Ces cookies permettent de maintenir la connexion des employés lors de leur navigation sur l'interface. Ils ne contiennent aucune donnée personnelle sensible et sont supprimés automatiquement à la fin de la session.</p>
                    <p>Contact RGPD : Pour toute question liée à vos données personnelles, veuillez nous contacter via le formulaire de contact.</p>
                    <p>Hébergeur : OVH, 2 Rue Kellermann, 59100 Roubaix, France.</p>
                </div>
            </div>
        </div>
    </div>
    </footer>

    <script src="/assets/js/<?php if(isset($game)){echo $game;}?>.js"></script>
    <script src="/assets/js/<?php if(isset($script)){echo $script;}?>.js"></script>
    <script src="/assets/js/modal.js"></script>
    <script src="/assets/js/fetchPost.js"></script> <!-- FETCH AUTOMATISÉ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
