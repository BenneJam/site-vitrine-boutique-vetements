<?php
$title = "T-shirts - Noam Clothing";
ob_start();
?>
<section class="products-section">
    <div class="products-container">
        <h1>T-shirts</h1>
        <div class="product-grid">
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=T-shirt+1')"></div>
                <div class="product-title">T-shirt Classique</div>
                <div class="product-price">29,99 €</div>
            </div>
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=T-shirt+2')">
                    <span class="promo-badge">NOUVEAU</span>
                </div>
                <div class="product-title">T-shirt Premium</div>
                <div class="product-price">34,99 €</div>
            </div>
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=T-shirt+3')"></div>
                <div class="product-title">T-shirt Oversize</div>
                <div class="product-price">39,99 €</div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>