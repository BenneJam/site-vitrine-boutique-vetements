# 👗 Boutique de Vente de Vêtements en Ligne

Bienvenue sur le projet **Boutique de vente de vêtements en ligne** ! Une application web moderne pour la gestion et la vente de vêtements.

## 📋 Description

Cette application est une boutique en ligne complète permettant aux utilisateurs de parcourir, consulter et acheter des vêtements. Elle propose une interface intuitive avec un système d'authentification sécurisé et une gestion complète des produits et des commandes.

## 🛠️ Technologies Utilisées

- **Backend** : PHP (Architecture MVC)
- **Base de Données** : MySQL/MariaDB
- **Frontend** : HTML, CSS, PHP (Templates)
- **Environnement de développement** : Docker

## 🚀 Installation et Configuration avec Docker

Ce projet est entièrement conteneurisé avec Docker, ce qui simplifie grandement l'installation et la configuration.

### Prérequis

- [Docker](https://www.docker.com/products/docker-desktop)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Étapes d'installation

1. **Cloner le projet**

   ```bash
   git clone https://github.com/BenneJam/site-vitrine-boutique-vetements.git
   cd site-vitrine-boutique-vetements
   ```

2. **Lancer les conteneurs Docker**

   ```bash
   docker-compose up -d
   ```

   Cette commande va construire et démarrer les services définis dans le fichier `docker-compose.yml`.

3. **Lancer le serveur PHP**

   ```php
   php -S localhost:8080 -t public
   ```

   Cette commande va lancer un serveur PHP permettant d'accéder à l'application.

4. **Accéder à l'application**
   - L'application est accessible à l'adresse : `http://localhost:8080/`
   - La base de données est gérée par phpMyAdmin, accessible à : `http://localhost:8010/`

### Services Docker

Le fichier `docker-compose.yml` définit les services suivants :

- **`db`**: Un conteneur MySQL 8.4 pour la base de données.
  - **Port**: `3330`
  - **Identifiants par défaut**:
    - `MYSQL_ROOT_PASSWORD`: secret
    - `MYSQL_DATABASE`: db_boutique
    - `MYSQL_USER`: user
    - `MYSQL_PASSWORD`: secret
- **`phpmyadmin`**: Un conteneur phpMyAdmin pour gérer la base de données.
  - **Port**: `8010`

## 📁 Structure du Projet

```
site-vitrine-boutique-vetements/
├── .docker/                # Fichiers de configuration Docker
│   ├── php/
│   │   └── php.ini         # Configuration de PHP
│   └── vhost/
│       └── default.conf    # Hôte virtuel Apache
├── db/
│   └── init.sql            # Schéma et données initiales
├── public/
│   └── index.php           # Point d'entrée de l'application
├── src/
│   ├── config/
│   │   └── database.php    # Configuration de la base de données
│   ├── controllers/
│   ├── models/
│   ├── repositories/
│   └── Routing/
├── templates/
│   ├── layout.php          # Mise en page principale
│   └── ...                 # Autres templates de vues
├── docker-compose.yml      # Fichier de configuration Docker Compose
└── README.md               # Ce fichier
```

## 📖 Utilisation

### Accès à l'application

- Accueil : `http://localhost:8080/`
- Connexion : `http://localhost:8080/login`
- Inscription : `http://localhost:8080/signin`

### Fonctionnalités principales

- ✅ Authentification des utilisateurs (connexion/inscription)
- ✅ Gestion des profils utilisateur
- ✅ Parcourir les produits de vêtements
- ✅ Ajouter des articles au panier
- ✅ Finaliser les commandes
- ✅ Historique des commandes

## 🏗️ Architecture

L'application suit le pattern **MVC** (Model-View-Controller) :

- **Models** : Représentation des données et accès base de données (repositories)
- **Views** : Templates HTML pour l'affichage
- **Controllers** : Logique métier et orchestration

### Composants clés

- **Router** : Gère le routage des URLs vers les contrôleurs appropriés
- **Request/Response** : Gestion des requêtes et réponses HTTP
- **Repositories** : Accès aux données de la base de données

## 🔒 Sécurité

- Validation des entrées utilisateur
- Protection contre les injections SQL via requêtes paramétrées
- Gestion sécurisée des sessions
- Hashage des mots de passe

## 👤 Gestion des Utilisateurs

L'application gère :

- L'authentification (login/logout)
- L'inscription de nouveaux utilisateurs
- Les profils utilisateur

## 🐛 Dépannage

Voici quelques solutions aux problèmes courants :

- **Erreur de connexion BD** : Vérifiez la configuration dans `src/config/database.php` et les logs du conteneur `db`.
- **Erreur 404** : Assurez-vous que les conteneurs Docker sont bien en cours d'exécution.
- **Problèmes de permissions** : Vérifiez les permissions des fichiers et dossiers du projet.

## Contact

Pour toute question ou suggestion, veuillez contacter l'équipe de développement.

---

**Dernière mise à jour** : Janvier 2026
