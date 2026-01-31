<?php
$title = "Mon compte - Boutique vêtements";
ob_start();
?>
<section class="login-section">
    <div class="login-container">
        <h1>Mon Compte</h1>

        <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom_utilisateur'] ?? '') ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom_utilisateur'] ?? '') ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($user['email_utilisateur'] ?? '') ?></p>

        <div class="form-links">
            <a href="index.php?action=logout" class="create-account-link">Se déconnecter</a>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>