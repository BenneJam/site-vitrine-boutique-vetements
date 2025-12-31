<?php

function indexBoutique(Request $request, Response $response)
{
    if (isset($_SESSION['user'])) {
        // Si déjà connecté, rediriger vers la route dashboard pour que le contrôleur
        // `dashboardSanction` fournisse les données attendues par la vue.
        $response->redirect('index.php?action=dashboard');
        return;
    } else {
        $response->view(__DIR__ . '/../../templates/index.php', []);
        return;
    }
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

        $_SESSION['user'] = Login($request->allPost());
        if ($_SESSION['user'] === false) {
            $errors['login'] = "Echec de la connexion.";
            unset($_SESSION['user']);
            $response->view(__DIR__ . '/../../templates/login/login.php', ["errors" => $errors]);
        } else {
            $_SESSION['head_message'] = "Connexion réussie !";
            $response->redirect('index.php?action=dashboard');
        }
    } else {
        $response->view(__DIR__ . '/../../templates/login/login.php', []);
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
                // Registration succeeded — redirect to login page per spec
                $_SESSION['head_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                $response->redirect('index.php?action=login');
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
        $response->view(__DIR__ . '/../../templates/signin/signin.php', ['old' => []]);
    }
}
