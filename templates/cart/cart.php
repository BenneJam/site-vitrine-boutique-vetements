<?php
$title = "Mon Panier - Boutique vêtements";
ob_start();
?>
<section class="login-section">
    <div class="login-container">
        <h1>Mon Panier</h1>

        <?php if (empty($cart) || count($cart) === 0): ?>
            <p>Votre panier est vide.</p>
            <a href="index.php?action=index" class="create-account-link">Retour à la boutique</a>
        <?php else: ?>
            <table style="width:100%;text-align:left;">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name'] ?? 'Article') ?></td>
                            <td><?= (int)($item['quantity'] ?? 1) ?></td>
                            <td><?= htmlspecialchars(number_format($item['price'] ?? 0, 2, ',', ' ')) ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div style="margin-top:20px;text-align:right;">
                <a href="index.php?action=checkout" class="btn-submit">Passer à la caisse</a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>