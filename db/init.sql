-- Script d'initialisation de la base de données db_boutique

-- Utilisation de la base de données db_boutique
USE db_boutique;

-- Création de la table UTILISATEUR
CREATE TABLE IF NOT EXISTS UTILISATEUR (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL,
    prenom_utilisateur VARCHAR(50) NOT NULL,
    email_utilisateur VARCHAR(255) NOT NULL,
    mot_de_passe_utilisateur VARCHAR(60) NOT NULL,
    actif BOOLEAN NOT NULL DEFAULT TRUE
);