<?php
$title = "Accessoires - Noam Clothing";
ob_start();
?>
<section class="products-section">
    <div class="products-container">
        <h1>Accessoires</h1>
        <div class="product-grid">
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=Casquette')"></div>
                <div class="product-title">Casquette</div>
                <div class="product-price">19,99 €</div>
            </div>
            <div class="product-card">
                <div class="product-image" style="background-image:url('https://via.placeholder.com/600x600?text=Echarpe')"></div>
                <div class="product-title">Écharpe</div>
                <div class="product-price">24,99 €</div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>