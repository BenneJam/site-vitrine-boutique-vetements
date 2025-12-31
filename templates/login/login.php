<?php
$title = "Connexion - Boutique vêtements";
ob_start();
?>
<section class="login-section">
    <div class="login-container">
        <h1>Connexion</h1>
        <form>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="EX: JEAN.DUPONT@EMAIL.COM" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="••••••••" required>
            </div>

            <div class="form-links">
                <a href="#">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn-submit">Se Connecter</button>

            <a href="index.php?action=signin" class="create-account-link">Pas de compte ? Créer un compte</a>
        </form>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>