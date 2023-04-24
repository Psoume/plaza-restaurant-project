# plaza-restaurant-project
Projet de formation pour le site fictif du restaurant "Grand Plaza"

## Réflexions initiales sur le projet
J'ai d'abord envisagé de réaliser le projet avec le framework backend PHP Symfony, mais le projet étant à rendre dans quelques jours seulement, j'ai préféré m'en tenir à des technologies déjà connues. J'ai donc réalisé le projet en PHP natif, avec un code organisé selon le modèle MVC. 

Les requêtes à la base de données sont faites avec MySQL. Le projet est hébergé sur un serveur local Laragon.

Quant au front-end, il est réalisé en CSS et Javascript natif avec JQUERY pour faciliter la manipulation du DOM.

## Prérequis : 
Après avoir téléchargé les fichiers du site et créé la base de données à l'aide des instructions fournies dans instructions.sql, il faut s'assurer que la connexion à la base de données est fonctionnelle. Pour ce faire, il faut vérifier les valeurs de $host, $dbname, $user, $pass dans model/bddconnector.php et les adapter au contexte.

Ensuite, on peut accéder à l'index du site qui affiche la page d'accueil du restaurant. On accède aux pages carte et contact par la barre de navigation. Pour le panel admin, il faut se rendre à l'adresse : plaza-restaurant-project.test/index.php?uc=admin

Un compte administrateur a déjà été créé. Les identifiants sont : 
mail : admin@admin.fr
mot de passe : 123

L'utilisateur est invité à changer ses identifiants à la première connexion en se rendant dans le profil (accessible en cliquant sur le nom en haut à gauche une fois connecté).

Depuis le panel, l'administrateur peut modifier 1) les plats (les ajouter, modifier, supprimer, rendre disponibles à la carte, gérer les allergènes), 2) les menus (en construction), 3) les images de la gallerie de la page d'accueil, 4) les horaires d'ouverture