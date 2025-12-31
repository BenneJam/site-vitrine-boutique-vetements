<?php
$title = "Accueil - Boutique vêtements";
ob_start();
?>

<section class="hero">
    <div>
        <h1>NOUVELLE COLLECTION LIMITÉE</h1>
        <button class="btn-hero">Découvrir</button>
    </div>
</section>

<section class="products-section">
    <h2 class="section-title">Nos Best Sellers</h2>
    <div class="product-grid">
        <div class="product-card">
            <div class="product-image"></div>
            <div class="product-title">Veste "СОВЕТСКИЙ"</div>
            <div class="product-price">149,99 €</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <span class="promo-badge">PROMO</span>
            </div>
            <div class="product-title">T-shirt Oversize "NOT FROM PARIS"</div>
            <div class="product-price">
                <span class="old-price">49,90 €</span> 49,99 €
            </div>
        </div>

        <div class="product-card">
            <div class="product-image"></div>
            <div class="product-title">Hoodie “BRATAN”</div>
            <div class="product-price">69,99 €</div>
        </div>

        <div class="product-card">
            <div class="product-image"></div>
            <div class="product-title">Cagoule "BRAT"</div>
            <div class="product-price">19,99 €</div>
        </div>
    </div>
</section>

<section class="features">
    <div class="feature-item">
        <div class="feature-icon">🚀</div>
        <div class="feature-title">Livraison Rapide</div>
        <div class="feature-desc">
            Livraison en France et à l'international.
        </div>
    </div>
    <div class="feature-item">
        <div class="feature-icon">🔒</div>
        <div class="feature-title">Paiement Sécurisé</div>
        <div class="feature-desc">
            Transactions 100% sécurisées sur notre site.
        </div>
    </div>
    <div class="feature-item">
        <div class="feature-icon">🇫🇷</div>
        <div class="feature-title">Made in France</div>
        <div class="feature-desc">Designé et marqué en France.</div>
    </div>
    <div class="feature-item">
        <div class="feature-icon">💬</div>
        <div class="feature-title">Service Client</div>
        <div class="feature-desc">Réponse rapide du Lundi au Vendredi.</div>
    </div>
</section>

<?php
$content = ob_get_clean();
include __DIR__ . '/layout.php';
?>