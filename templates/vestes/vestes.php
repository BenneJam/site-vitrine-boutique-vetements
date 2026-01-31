<?php
$title = "Vestes - Noam Clothing";
ob_start();
?>
<section class="products-section">
    <div class="products-container">
        <h1>Vestes</h1>
        <div class="product-grid">
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=Veste+1')"></div>
                <div class="product-title">Veste en cuir</div>
                <div class="product-price">119,99 €</div>
            </div>
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=Veste+2')">
                    <span class="promo-badge">PROMO</span>
                </div>
                <div class="product-title">Veste matelassée</div>
                <div class="product-price"><span class="old-price">99,99 €</span> 89,99 €</div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>