<?php
require_once __DIR__ . '/../repositories/utilisateurRepository.php';

function indexBoutique(Request $request, Response $response)
{
    // Affiche la page d'accueil, que l'utilisateur soit connecté ou non.
    $response->view(__DIR__ . '/../../templates/index.php', []);
    return;
}

function loginBoutique(Request $request, Response $response)
{
    if (isset($_SESSION['user'])) {
        // Si l'utilisateur est déjà connecté, rediriger vers la route dashboard
        // pour que `dashboardSanction` fournisse les données nécessaires.
        $response->redirect('index.php?action=dashboard');
        return;
    }

    if ($request->isPost()) {

        $post = $request->allPost();
        $errors = [];

        // Validation côté serveur
        if (empty($post['email'])) {
            $errors[] = "L'adresse email est requise.";
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email n'est pas valide.";
        }

        if (empty($post['password'])) {
            $errors[] = "Le mot de passe est requis.";
        }

        if (!empty($errors)) {
            $response->view(__DIR__ . '/../../templates/login/login.php', ['errors' => $errors, 'old' => $post]);
            return;
        }

        $user = Login($post);
        if ($user === false) {
            $errors[] = "Echec de la connexion. Vérifiez vos identifiants.";
            unset($_SESSION['user']);
            $response->view(__DIR__ . '/../../templates/login/login.php', ['errors' => $errors, 'old' => $post]);
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['head_message'] = "Connexion réussie !";
            $response->redirect('index.php?action=dashboard');
        }
    } else {
        $response->view(__DIR__ . '/../../templates/login/login.php', ['errors' => [], 'old' => []]);
    }
}

function signinBoutique(Request $request, Response $response)
{
    if (isset($_SESSION['user'])) {
        // L'utilisateur est déjà connecté -> afficher le dashboard via sa route
        $response->redirect('index.php?action=dashboard');
        return;
    }

    if ($request->isPost()) {
        $errors = ValidateCreateUtilisateurInput($request->allPost());
        if (empty($errors)) {
            $result = createUtilisateur($request->allPost());
            if (is_array($result) && ($result['ok'] ?? false)) {
                // Auto-login user after successful registration
                $user = Login($request->allPost());
                if ($user === false) {
                    // Fallback: redirect to login if auto-login failed
                    $_SESSION['head_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                    $response->redirect('index.php?action=login');
                    return;
                }

                // Set session and redirect to dashboard
                $_SESSION['user'] = $user;
                $_SESSION['head_message'] = "Inscription réussie ! Vous êtes connecté.";
                $response->redirect('index.php?action=dashboard');
                return;
            } else {
                $msg = is_array($result) ? ($result['error'] ?? 'Erreur lors de la création du compte.') : 'Erreur lors de la création du compte.';
                $errors['server'] = $msg;
                $response->view(__DIR__ . '/../../templates/signin/signin.php', ['errors' => $errors, 'old' => $request->allPost()]);
                return;
            }
        } else {
            $response->view(__DIR__ . '/../../templates/signin/signin.php', ['errors' => $errors, 'old' => $request->allPost()]);
            return;
        }
    } else {
        $response->view(__DIR__ . '/../../templates/signin/signin.php', ['errors' => [], 'old' => []]);
    }
}

function dashboardBoutique(Request $request, Response $response)
{
    if (!isset($_SESSION['user'])) {
        $response->redirect('index.php?action=login');
        return;
    }

    $user = $_SESSION['user'];
    $response->view(__DIR__ . '/../../templates/account/account.php', ['user' => $user]);
}

function cartBoutique(Request $request, Response $response)
{
    // Only allow access to cart for authenticated users
    if (!isset($_SESSION['user'])) {
        $_SESSION['head_message'] = "Veuillez vous connecter pour accéder au panier.";
        $response->redirect('index.php?action=login');
        return;
    }

    // Get cart from session (simple implementation)
    $cart = $_SESSION['cart'] ?? [];
    $response->view(__DIR__ . '/../../templates/cart/cart.php', ['cart' => $cart]);
}

function logoutBoutique(Request $request, Response $response)
{
    // Clear session and redirect to home
    session_unset();
    session_destroy();
    session_start(); // restart a session so we can set a flash message
    $_SESSION['head_message'] = "Vous êtes déconnecté.";
    $response->redirect('index.php?action=index');
}
