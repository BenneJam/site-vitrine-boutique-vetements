<?php
$title = "Inscription - Boutique vêtements";
ob_start();
?>
<section class="register-section">
    <div class="register-container">
        <h1>Créer un compte</h1>
        <form method="POST" action="index.php?action=signin">
            <?php if (!empty($errors)): ?>
                <div class="error-msg">
                    <?php foreach ($errors as $err): ?>
                        <div><?= htmlspecialchars($err) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-row">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Jean" value="<?= htmlspecialchars($old['prenom'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Dupont" value="<?= htmlspecialchars($old['nom'] ?? '') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="jean.dupont@email.com" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" value="1" <?= !empty($old['terms']) ? 'checked' : '' ?> required>
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