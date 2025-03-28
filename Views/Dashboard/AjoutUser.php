<?php
$css = 'user'; 
?>

<section class="text-center d-flex justify-content-center align-items-center user-form-section">
    <div class="container p-4 col-12 col-md-8 col-lg-4 user-form-container">
        <h2 class="user-title"><i class="fas fa-user-plus"></i> Inscription </h2>
        <form method="POST" class="p-3 user-form" id="loginForm" action="/DashUser/AjoutUser">
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Pseudo :</label>
                <input type="text" name="name" id="name" class="form-control mb-3 user-input" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email :</label>
                <input type="email" name="email" id="email" class="form-control mb-3 user-input" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control mb-3 user-input" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword"><i class="fas fa-lock"></i> Confirmation du mot de passe :</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control mb-3 user-input" required>
            </div>
            <div class="formLogin">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <button type="submit" id="submit" class="btn user-btn w-75"> S'inscrire</button>
            </div>
                    <!-- Messages d'alerte -->
        <div>
            <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
            <div id="success-message" class="alert alert-success d-none" role="alert"></div>
        </div>
        </form>
    </div>
</section>

<!-- BUTTON RETURN -->
<div class="d-flex justify-content-center mb-4">
    <a href="/Dashboard" class="btn btn-secondary">Retour</a>
</div>
</div>