<?php
$title = "Connexion - Boutique vêtements";
ob_start();
?>
<section class="login-section">
    <div class="login-container">
        <h1>Connexion</h1>
        <form method="POST" action="index.php?action=login">
            <?php if (!empty($errors)): ?>
                <div class="error-msg">
                    <?php foreach ($errors as $err): ?>
                        <div><?= htmlspecialchars($err) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="EX: JEAN.DUPONT@EMAIL.COM" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
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