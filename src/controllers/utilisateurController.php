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
