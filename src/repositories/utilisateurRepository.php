<?php

require_once __DIR__ . '/../config/database.php';

function getAllUtilisateur()
{
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    } else {
        try {
            $sql = "SELECT * FROM UTILISATEUR";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
            return false;
        }
    }
};

function getUtilisateurById(int $id)
{
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    } else {
        try {
            $sql = "SELECT * FROM UTILISATEUR WHERE id_utilisateur = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }
};

function checkExistingEmail(array $data)
{
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    } else {
        try {
            $sql = "SELECT COUNT(*) FROM UTILISATEUR WHERE email_utilisateur = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $data['email']);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            error_log("Erreur lors de la vérification de l'email : " . $e->getMessage());
            return false;
        }
    }
}

function ValidateCreateUtilisateurInput(array $data): array
{
    $erreurs = [];
    if (empty($data['nom'])) {
        $erreurs['nom'] = "Le nom est requis.";
    }
    if (empty($data['prenom'])) {
        $erreurs['prenom'] = "Le prénom est requis.";
    }
    if (empty($data['email'])) {
        $erreurs['email'] = "L'adresse email est requise.";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "L'adresse email n'est pas valide.";
    } elseif (checkExistingEmail($data)) {
        $erreurs['email'] = "L'adresse email est déjà utilisée.";
    }

    if (empty($data['password'])) {
        $erreurs['password'] = "Le mot de passe est requis.";
    } elseif (strlen($data['password']) < 6) {
        $erreurs['password'] = "Le mot de passe doit contenir au moins 6 caractères.";
    }
    if (empty($data['password_confirmation'])) {
        $erreurs['password_confirmation'] = "La confirmation du mot de passe est requise.";
    } elseif ($data['password'] !== $data['password_confirmation']) {
        $erreurs['password_confirmation'] = "Les mots de passe ne correspondent pas.";
    }
    return $erreurs;
}

function createUtilisateur(array $data)
{
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return ['ok' => false, 'error' => 'Impossible de se connecter à la base de données.'];
    }

    try {
        $sql = "INSERT INTO UTILISATEUR (nom_utilisateur, prenom_utilisateur, email_utilisateur, mot_de_passe_utilisateur, actif) VALUES (:nom, :prenom, :email, :mot_de_passe, 1)";
        $stmt = $pdo->prepare($sql);
        // use bindValue when binding array elements or immediate values
        $stmt->bindValue(':nom', $data['nom']);
        $stmt->bindValue(':prenom', $data['prenom']);
        $stmt->bindValue(':email', $data['email']);
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bindValue(':mot_de_passe', $hashed_password);

        $ok = $stmt->execute();
        if ($ok) {
            return ['ok' => true];
        }

        $err = $stmt->errorInfo();
        $msg = isset($err[2]) ? $err[2] : 'Erreur inconnue lors de l\'insertion.';
        error_log('Erreur insertion UTILISATEUR: ' . $msg);
        return ['ok' => false, 'error' => $msg];
    } catch (PDOException $e) {
        error_log("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
        return ['ok' => false, 'error' => $e->getMessage()];
    }
}

function Login(array $data)
{
    $pdo = getDatabaseConnection();
    if (!$pdo) {
        return false;
    } else {
        try {
            $sql = "SELECT * FROM UTILISATEUR WHERE email_utilisateur = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $data['email']);
            $stmt->execute();
            $utilisateur = $stmt->fetch();

            if (!$utilisateur) {
                return false;
            }

            if (password_verify($data['password'], $utilisateur['mot_de_passe_utilisateur'])) {
                return $utilisateur;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erreur lors de la connexion de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }
}
