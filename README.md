# 👗 Boutique de Vente de Vêtements en Ligne

Bienvenue sur le projet **Boutique de vente de vêtements en ligne** ! Une application web moderne pour la gestion et la vente de vêtements.

## 📋 Description

Cette application est une boutique en ligne complète permettant aux utilisateurs de parcourir, consulter et acheter des vêtements. Elle propose une interface intuitive avec un système d'authentification sécurisé et une gestion complète des produits et des commandes.

## 🛠️ Technologies Utilisées

- **Backend** : PHP (Architecture MVC)
- **Base de Données** : MySQL/MariaDB
- **Frontend** : HTML, CSS, PHP (Templates)
- **Serveur** : Apache/PHP

## 📁 Structure du Projet

```
site-vitrine-boutique-vetements/
├── db/
│   └── init.sql              # Schéma et données initiales de la base de données
├── public/
│   └── index.php             # Point d'entrée de l'application
├── src/
│   ├── config/
│   │   └── database.php      # Configuration de la base de données
│   ├── controllers/
│   │   └── utilisateurController.php    # Contrôleur utilisateur
│   ├── Http/
│   │   ├── Request.php       # Gestion des requêtes HTTP
│   │   └── Response.php      # Gestion des réponses HTTP
│   ├── repositories/
│   │   └── utilisateurRepository.php    # Accès aux données utilisateur
│   └── Routing/
│       └── Router.php        # Système de routage
├── templates/
│   ├── index.php             # Page d'accueil
│   ├── layout.php            # Mise en page principale
│   ├── login/
│   │   └── login.php         # Page de connexion
│   └── signin/
│       └── signin.php        # Page d'inscription
└── README.md                 # Ce fichier
```

## 🚀 Installation et Configuration

### Prérequis

- PHP 7.4 ou supérieur
- MySQL/MariaDB
- Apache avec support de URL rewriting
- Composer (optionnel)

### Étapes d'installation

1. **Cloner le projet**

   ```bash
   git clone <url-du-repo>
   cd site-vitrine-boutique-vetements
   ```

2. **Configurer la base de données**
   - Créer une nouvelle base de données MySQL
   - Importer le schéma : `mysql -u user -p database < db/init.sql`

3. **Configurer les paramètres de connexion**
   - Modifier `src/config/database.php` avec vos identifiants de base de données

4. **Déployer l'application**
   - Placer les fichiers sur votre serveur web
   - S'assurer que le dossier `public/` est le point d'entrée

## 📖 Utilisation

### Accès à l'application

- Accueil : `http://votredomaine.com/`
- Connexion : `http://votredomaine.com/login`
- Inscription : `http://votredomaine.com/signin`

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
- Les préférences et paramètres

## 📦 Dépendances

Consultez `composer.json` (si présent) pour la liste des dépendances du projet.

## 🐛 Dépannage

Voici quelques solutions aux problèmes courants :

- **Erreur de connexion BD** : Vérifiez la configuration dans `src/config/database.php`
- **Erreur 404** : Assurez-vous que URL rewriting est activé dans Apache
- **Erreur de permissions** : Vérifiez les permissions des dossiers

## Contact

Pour toute question ou suggestion, veuillez contacter l'équipe de développement.

---

**Dernière mise à jour** : Janvier 2026
