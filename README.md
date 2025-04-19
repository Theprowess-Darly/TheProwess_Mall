# TheProwess Mall

## Aperçu
TheProwess Mall est une marketplace en ligne permettant aux vendeurs de créer et gérer plusieurs boutiques sur une seule plateforme. Cette application web fullstack développée avec Laravel 12 facilite les interactions entre administrateurs, vendeurs et clients, avec une infrastructure de paiement intégrée.

## Fonctionnalités principales

### Utilisateurs & Rôles
- **Admin**: Validation des boutiques et produits, gestion globale de la plateforme
- **Vendeur**: Création de boutiques, ajout de produits par catégorie
- **Client**: Navigation, achat de produits, gestion de panier
- **Livreur** (acteur secondaire): Gestion des livraisons

### Commerce & Paiements
- E-portefeuille intégré pour tous les utilisateurs
- Paiements via Orange Money et Mobile Money (API)
- Transactions sécurisées intégrées à la plateforme
- Gestion des commandes et suivi des livraisons

### Boutiques & Produits
- Processus de création de boutique avec validation administrative
- Système de catégorisation des produits
- Workflow de validation pour les nouveaux produits
- Liste de souhaits pour les clients

## Architecture technique

### Frontend
- **Laravel Blade** pour les vues dynamiques
- **HTML5 & TailwindCSS** pour l'interface responsive
- **jQuery & AJAX** pour les interactions utilisateur en temps réel
- Affichage dynamique des produits avec filtrage et tri

### Backend
- **Laravel 12** comme framework principal
- **Laravel Breeze** pour l'authentification et la gestion des rôles
- **Laravel Echo/Pusher** pour les notifications en temps réel
- API RESTful pour la gestion des produits, commandes et paiements

### Base de données
Structure relationnelle (mysql) comprenant:
- Gestion des utilisateurs et portefeuilles
- Système de boutiques et produits
- Gestion des commandes et livraisons
- Système de transactions et paiements
- Abonnements et notifications

## Prérequis

Pour installer et exécuter TheProwess Mall localement, vous aurez besoin de:

- PHP 8.1 ou supérieur
- Composer
- Node.js et NPM
- MySQL ou PostgreSQL
- Extension PHP pour PDO, JSON et Mbstring
- Serveur web (Apache, Nginx)

## Installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Theprowess-Darly/TheProwess_Mall
   cd theprowess-mall
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances NPM**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurer la base de données**
   Modifiez le fichier `.env` avec vos identifiants de base de données:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tpmall
   DB_USERNAME=votre_username
   DB_PASSWORD=votre_mot_de_passe
   ```

6. **Exécuter les migrations et les seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Compiler les assets**
   ```bash
   npm run dev
   ```

8. **Lancer le serveur de développement**
   ```bash
   php artisan serve
   ```

L'application sera disponible à l'adresse [http://localhost:8000](http://localhost:8000)

## Contribution

Les contributions sont les bienvenues ! Pour contribuer:

1. Forkez le projet
2. Créez votre branche de fonctionnalité (`git checkout -b feature/amazing-feature`)
3. Committez vos changements (`git commit -m 'Add some amazing feature'`)
4. Poussez vers la branche (`git push origin feature/amazing-feature`)
5. Ouvrez une Pull Request

## Licence

Ce projet est sous licence MIT - voir le fichier `LICENSE` pour plus de détails.