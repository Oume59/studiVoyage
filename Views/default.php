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
    <title>Studi voyage</title>
    <link href="/assets/css/<?php if(isset($css)){echo $css;}?>.css" rel="stylesheet">
    <link href="/assets/css/<?php if(isset($style)){echo $style;}?>.css" rel="stylesheet">
    <title><?php if(isset($title)){echo $title;}?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand logo" href="/">
            <img src="/assets/images/logo/AGENCY_500_x_200_px.png" alt="LOGO" width="100">
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
                    <a class="nav-link text-danger" href="/Promotions">Promotions</a>
                </li>


                <?php if(isset($_SESSION['id'])): ?>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/log/logout" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
                        Déconnexion
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="/log">Connexion</a>
                </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['id']) && ($_SESSION['role'] === 'Admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link " href="/Dashboard">Dashboard</a>
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
        <p>&copy; 2024 StudiVoyage - Tous droits réservés.</p>
    </footer>

    <script src="/assets/js/<?php if(isset($game)){echo $game;}?>.js"></script>
    <script src="/assets/js/<?php if(isset($script)){echo $script;}?>.js"></script>
    <script src="/assets/js/fetchPost.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
