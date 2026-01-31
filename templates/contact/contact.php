<?php
$title = "Contact - Noam Clothing";
ob_start();
?>
<section class="login-section">
    <div class="contact-container">
        <h1>Contact</h1>

        <?php if (!empty($errors)): ?>
            <div class="error-msg">
                <?php foreach ($errors as $err): ?>
                    <div><?= htmlspecialchars($err) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=contact">
            <div class="form-row" style="display:flex;gap:20px;flex-wrap:wrap;">
                <div class="form-group" style="flex:1;min-width:220px;">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" placeholder="Jean Dupont" value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                </div>
                <div class="form-group" style="flex:1;min-width:220px;">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="jean.dupont@example.com" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Écris votre message ici..." rows="10" style="min-height:320px;resize:vertical;" required><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
            </div>
            <div style="text-align:right;">
                <button type="submit" class="btn-submit">Envoyer</button>
            </div>
        </form>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>