# Mini-Bibliothèque 📚

Application web de gestion de bibliothèque développée en PHP/MySQL avec PDO.

## Fonctionnalités

- Système d'authentification (login/mot de passe)
- Deux rôles : Administrateur et Bibliothécaire
- Seul l'administrateur peut créer des comptes
- CRUD complet sur les livres (Ajouter, Modifier, Supprimer)
- Alerte automatique quand le stock d'un livre est ≤ 2
- Filtres par genre
- Horodatage automatique (date d'ajout et de modification)

## Technologies utilisées

- PHP 8
- MySQL
- PDO (Prepared Statements)
- HTML/CSS
- CLAUDE IA

## Installation

1. Cloner le projet dans le dossier `htdocs` de XAMPP
2. Importer la base de données via phpMyAdmin
3. Lancer Apache et MySQL depuis XAMPP
4. Accéder via `localhost/minibibliotheque`

## Structure

minibibliotheque/

├── connexion.php

├── login.php

├── inscription.php

├── livres.php

├── ajouter_livre.php

├── modifier_livre.php

├── supprimer_livre.php

└── style.css

## Auteur

Tessa — Formation Développement Web Fullstack