<?php
$title = "Inscription - Boutique vêtements";
ob_start();
?>
<section class="register-section">
    <div class="register-container">
        <h1>Créer un compte</h1>
        <form>
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" placeholder="Jean" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" id="lastname" placeholder="Dupont" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="jean.dupont@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" placeholder="••••••••" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="terms" required>
                <label for="terms">J'accepte les <a href="#">conditions générales de vente</a> et la politique de confidentialité.</label>
            </div>

            <button type="submit" class="btn-submit">S'inscrire</button>

            <a href="index.php?action=login" class="login-link">Déjà un compte ? Se connecter</a>
        </form>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>