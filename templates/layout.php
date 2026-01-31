<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Noam Clothing - Luxury White Edition</title>
    <style>
        /* --- RESET ET STYLE DE BASE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #111;
            background-image: radial-gradient(circle at 50% 50%, #2a2a2a, #111);
            color: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        ul {
            list-style: none;
        }

        /* --- BARRE D'ANNONCE (MARQUEE 4X) --- */
        .announcement-bar {
            background-color: #c5a059;
            color: #000;
            padding: 12px 0;
            overflow: hidden;
            position: relative;
            z-index: 2000;
        }

        .marquee-track {
            display: flex;
            width: fit-content;
            animation: scroll 30s linear infinite;
        }

        .marquee-item {
            white-space: nowrap;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding-right: 50px;
            display: flex;
            align-items: center;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* --- HEADER --- */
        header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #c5a059;
            position: sticky;
            top: 0;
            background: #1a1a1a;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #c5a059;
        }

        nav ul {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        nav a {
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #ffffff;
        }

        nav a:hover {
            color: #c5a059;
        }

        /* Burger button */
        .burger {
            display: none;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.6rem;
            cursor: pointer;
            margin-left: 12px;
        }

        /* main-nav used to toggle menu on mobile */
        .main-nav {
            display: block;
        }

        .main-nav ul {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .header-icons span,
        .header-icons a {
            margin-left: 20px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #ffffff;
        }

        .header-icons span:hover,
        .header-icons a:hover {
            color: #c5a059;
        }

        /* Petit texte à côté de l'emoji compte */
        .header-icons .account-text {
            margin-left: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: none;
            color: #ffffff;
            text-decoration: none;
            vertical-align: middle;
        }

        .header-icons .account-divider {
            margin-left: 6px;
            margin-right: 6px;
            color: #ffffff;
            vertical-align: middle;
        }

        /* Garder le séparateur '/' blanc au survol */
        .header-icons .account-divider:hover {
            color: #ffffff;
        }

        /* --- HERO SECTION --- */
        .hero {
            height: 80vh;
            background-color: #000;
            background: linear-gradient(135deg,
                    rgba(20, 20, 20, 1) 0%,
                    rgba(40, 40, 40, 1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            border-bottom: 2px solid #c5a059;
        }

        .hero h1 {
            font-size: 4rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(197, 160, 89, 0.3);
        }

        .btn-hero {
            background-color: #ffffff;
            color: #c5a059;
            padding: 15px 35px;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }

        .btn-hero:hover {
            background-color: #c5a059;
            color: #ffffff;
            border-color: #c5a059;
        }

        /* --- SECTION PRODUITS --- */
        .products-section {
            padding: 80px 40px;
            text-align: center;
            background: radial-gradient(circle at top center, #222, #0a0a0a);
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 50px;
            text-transform: uppercase;
            font-weight: 700;
            color: #c5a059;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background-color: #c5a059;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 50px;
        }

        /* Container spécifique pour les pages produits afin d'autoriser plusieurs colonnes */
        .products-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .product-card {
            text-align: left;
            cursor: pointer;
            background-color: #1a1a1a;
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            border-color: #c5a059;
            box-shadow: 0 0 20px rgba(197, 160, 89, 0.15);
        }

        .product-image {
            width: 100%;
            height: 350px;
            background-color: #2a2a2a;
            margin-bottom: 15px;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .product-image {
                height: 320px;
            }
        }

        .promo-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ffffff;
            color: #000;
            padding: 5px 10px;
            font-size: 0.8rem;
            font-weight: bold;
            border: 1px solid #c5a059;
        }

        .product-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #ffffff;
        }

        .product-price {
            font-size: 1.1rem;
            color: #c5a059;
            font-weight: bold;
        }

        .old-price {
            text-decoration: line-through;
            color: #999;
            margin-right: 10px;
            font-size: 0.95rem;
        }

        /* --- SECTION FEATURES --- */
        .features {
            background-color: #c5a059;
            background: linear-gradient(to right, #a38143, #c5a059, #a38143);
            color: #000;
            padding: 60px 40px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            text-align: center;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #ffffff;
        }

        .feature-item {
            flex: 1;
            min-width: 200px;
            margin: 20px;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .feature-title {
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-size: 0.95rem;
        }

        .feature-desc {
            font-size: 0.9rem;
            color: #222;
        }

        /* --- FOOTER --- */
        footer {
            background-color: #0a0a0a;
            color: #ccc;
            padding: 70px 40px 40px;
            border-top: 2px solid #c5a059;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
        }

        .footer-column h4 {
            margin-bottom: 25px;
            text-transform: uppercase;
            font-size: 1rem;
            color: #c5a059;
        }

        .footer-column ul li {
            margin-bottom: 12px;
        }

        .footer-column ul li a {
            color: #ddd;
            font-size: 0.9rem;
        }

        .footer-column ul li a:hover {
            color: #ffffff;
        }

        .newsletter input {
            padding: 12px;
            width: 200px;
            border: 2px solid #ffffff;
            background-color: #ffffff;
            color: #000000;
            font-weight: 500;
        }

        .newsletter input:focus {
            outline: none;
            border-color: #c5a059;
        }

        .newsletter input::placeholder {
            color: #888;
        }

        .newsletter button {
            padding: 12px 25px;
            background-color: #c5a059;
            color: #000;
            border: 2px solid #c5a059;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .newsletter button:hover {
            background-color: #ffffff;
            color: #c5a059;
            border-color: #ffffff;
        }

        .copyright {
            margin-top: 60px;
            text-align: center;
            font-size: 0.8rem;
            color: #888;
            border-top: 1px solid #222;
            padding-top: 25px;
        }

        /* Section principale qui centre le formulaire */
        .login-section {
            flex: 1;
            /* Prend tout l'espace disponible */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            background: radial-gradient(circle at center, #222, #0a0a0a);
        }

        /* La carte du formulaire */
        .login-container {
            width: 100%;
            max-width: 500px;
            background-color: #1a1a1a;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            /* Bordure subtile style "Luxe" */
            transition: border-color 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .login-container:hover {
            border-color: #c5a059;
            box-shadow: 0 0 20px rgba(197, 160, 89, 0.15);
        }

        .login-container h1 {
            color: #c5a059;
            text-transform: uppercase;
            margin-bottom: 30px;
            font-size: 2rem;
            letter-spacing: 1px;
        }

        /* Container spécifique pour la page Contact */
        .contact-container {
            width: 100%;
            max-width: 900px;
            background-color: #1a1a1a;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: border-color 0.3s, box-shadow 0.3s;
            text-align: left;
            margin: 0 auto;
        }

        /* Styles du formulaire */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            color: #fff;
            font-size: 0.95rem;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            padding: 12px 25px;
        }

        .error-msg {
            background: #3b1616;
            color: #ffcccc;
            padding: 10px;
            border: 1px solid #7a2a2a;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: left;
        }

        /* --- RESPONSIVE: header, nav, layout --- */
        @media (max-width: 900px) {
            header {
                padding: 16px 20px;
            }

            nav ul {
                gap: 18px;
            }

            .logo {
                font-size: 1.2rem;
            }

            .header-icons span,
            .header-icons a {
                margin-left: 12px;
                font-size: 1rem;
            }

            .products-container {
                max-width: 900px;
                padding: 0 16px;
            }

            .contact-container {
                padding: 30px;
            }

            /* Burger menu behavior */
            .burger {
                display: block;
            }

            .main-nav {
                display: none;
                position: absolute;
                top: 64px;
                right: 16px;
                left: 16px;
                background: #1a1a1a;
                border: 1px solid rgba(255, 255, 255, 0.06);
                padding: 16px;
                border-radius: 8px;
                z-index: 1200;
            }

            .main-nav.open {
                display: block;
            }

            .main-nav ul {
                flex-direction: column;
                gap: 12px;
            }
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            nav ul {
                flex-direction: column;
                gap: 12px;
            }

            .product-grid {
                grid-template-columns: 1fr !important;
            }

            .product-image {
                height: 320px;
            }

            .contact-container {
                padding: 20px;
            }
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #ffffff;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ffffff;
            background-color: #ffffff;
            color: #000;
            font-size: 1rem;
            font-weight: 500;
        }

        .form-group input:focus {
            outline: none;
            border-color: #c5a059;
        }

        .form-links {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            font-size: 0.85rem;
            color: #bbb;
        }

        .form-links a:hover {
            color: #c5a059;
            text-decoration: underline;
        }

        /* Bouton spécifique "Submit" (style héritier du btn-hero) */
        .btn-submit {
            width: 100%;
            background-color: #ffffff;
            color: #c5a059;
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .btn-submit:hover {
            background-color: #c5a059;
            color: #ffffff;
            border-color: #c5a059;
        }

        .create-account-link {
            display: block;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .create-account-link:hover {
            color: #c5a059;
        }

        .register-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            background: radial-gradient(circle at center, #222, #0a0a0a);
        }

        .register-container {
            width: 100%;
            max-width: 600px;
            background-color: #1a1a1a;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: border-color 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .register-container:hover {
            border-color: #c5a059;
            box-shadow: 0 0 20px rgba(197, 160, 89, 0.15);
        }

        .register-container h1 {
            color: #c5a059;
            text-transform: uppercase;
            margin-bottom: 30px;
            font-size: 2rem;
            letter-spacing: 1px;
        }

        /* Grille pour aligner Prénom et Nom */
        .form-row {
            display: flex;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            font-weight: bold;
            color: #ffffff;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ffffff;
            background-color: #ffffff;
            color: #000;
            font-size: 1rem;
            font-weight: 500;
        }

        .form-group input:focus {
            outline: none;
            border-color: #c5a059;
        }

        /* Style de la case à cocher (CGV) */
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            text-align: left;
        }

        .checkbox-group input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #c5a059;
        }

        .checkbox-group label {
            font-size: 0.85rem;
            color: #bbb;
            text-transform: none;
            font-weight: normal;
            cursor: pointer;
        }

        .checkbox-group a {
            text-decoration: underline;
            color: #ffffff;
        }

        .checkbox-group a:hover {
            color: #c5a059;
        }

        /* Bouton Submit */
        .btn-submit {
            width: 100%;
            background-color: #ffffff;
            color: #c5a059;
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            border: 2px solid #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .btn-submit:hover {
            background-color: #c5a059;
            color: #ffffff;
            border-color: #c5a059;
        }

        .login-link {
            display: block;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .login-link:hover {
            color: #c5a059;
        }
    </style>
</head>

<body>
    <div class="announcement-bar">
        <div class="marquee-track">
            <div class="marquee-item">
                NOUVELLE COLLECTION &nbsp; • &nbsp; LIVRAISON EN 48H 📦 &nbsp; •
                &nbsp; WORLD WIDE SHIPPING 🌎 &nbsp; • &nbsp; PAIEMENT SÉCURISÉ 🔒
                &nbsp; • &nbsp; RETOURS GRATUITS
            </div>

            <div class="marquee-item">
                NOUVELLE COLLECTION &nbsp; • &nbsp; LIVRAISON EN 48H 📦 &nbsp; •
                &nbsp; WORLD WIDE SHIPPING 🌎 &nbsp; • &nbsp; PAIEMENT SÉCURISÉ 🔒
                &nbsp; • &nbsp; RETOURS GRATUITS
            </div>

            <div class="marquee-item">
                NOUVELLE COLLECTION &nbsp; • &nbsp; LIVRAISON EN 48H 📦 &nbsp; •
                &nbsp; WORLD WIDE SHIPPING 🌎 &nbsp; • &nbsp; PAIEMENT SÉCURISÉ 🔒
                &nbsp; • &nbsp; RETOURS GRATUITS
            </div>

            <div class="marquee-item">
                NOUVELLE COLLECTION &nbsp; • &nbsp; LIVRAISON EN 48H 📦 &nbsp; •
                &nbsp; WORLD WIDE SHIPPING 🌎 &nbsp; • &nbsp; PAIEMENT SÉCURISÉ 🔒
                &nbsp; • &nbsp; RETOURS GRATUITS
            </div>
        </div>
    </div>

    <header>
        <div class="logo">NOAM CLOTHING</div>
        <button class="burger" aria-label="Menu">☰</button>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php?action=index">Accueil</a></li>
                <li><a href="index.php?action=tshirts">T-shirts</a></li>
                <li><a href="index.php?action=vestes">Vestes</a></li>
                <li><a href="index.php?action=accessoires">Accessoires</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
            </ul>
        </nav>
        <div class="header-icons">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?action=dashboard">👤 <?= htmlspecialchars($_SESSION['user']['prenom_utilisateur'] ?? '') ?></a>
                <a href="index.php?action=logout" style="margin-left: 10px;">Déconnexion</a>
            <?php else: ?>
                <a href="index.php?action=login">👤</a>
                <a href="index.php?action=login" class="account-text">Connexion</a>
                <span class="account-divider">/</span>
                <a href="index.php?action=signin" class="account-text">Inscription</a>
            <?php endif; ?>
            <?php $cart_count = 0;
            foreach ($_SESSION['cart'] ?? [] as $i) {
                $cart_count += (int)($i['quantity'] ?? 1);
            } ?>
            <a href="index.php?action=cart" class="cart-link">🛒 (<?= $cart_count ?>)</a>
        </div>
    </header>

    <main>
        <?php if (!empty($_SESSION['head_message'])): ?>
            <div class="flash-message" role="status" style="background:#1a3b1a;color:#dff0d8;padding:12px;border-radius:6px;margin:20px auto;max-width:1000px;text-align:center;">
                <?= htmlspecialchars($_SESSION['head_message']) ?>
            </div>
            <?php unset($_SESSION['head_message']); ?>
        <?php endif; ?>
        <?= $content ?>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h4>Liens Rapides</h4>
                <ul>
                    <li><a href="#">Recherche</a></li>
                    <li><a href="#">Expédition</a></li>
                    <li><a href="#">Retours</a></li>
                    <li><a href="#">CGV</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Contact</h4>
                <ul>
                    <li>noam.contact@gmail.com</li>
                    <li>Lun-Ven: 11h - 16h</li>
                </ul>
            </div>
            <div class="footer-column newsletter">
                <h4>Newsletter</h4>
                <p style="color: #ddd; font-size: 0.9rem; margin-bottom: 10px">
                    Soyez les premiers informés.
                </p>
                <form>
                    <input type="email" placeholder="Votre email..." />
                    <button type="button">OK</button>
                </form>
            </div>
        </div>
        <div class="copyright">
            &copy; 2024 Noam Clothing. Tous droits réservés.
        </div>
    </footer>

    <script>
        (function() {
            var burger = document.querySelector('.burger');
            var nav = document.querySelector('.main-nav');
            if (!burger || !nav) return;
            burger.addEventListener('click', function() {
                nav.classList.toggle('open');
            });
            // close when clicking outside
            document.addEventListener('click', function(e) {
                if (!nav.classList.contains('open')) return;
                if (e.target === burger || nav.contains(e.target)) return;
                nav.classList.remove('open');
            });
        })();
    </script>
</body>

</html>