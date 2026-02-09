<a id="readme-top"></a>

<div align="center">
  <h3 align="center">TP R3.13 - Gestion d'Adhérents (Sessions & SQL)</h3>

  <p align="center">
    Une application web de gestion d'adhérents réalisée dans le cadre du module "Développement Back-End" (BUT MMI).
    <br />
    Le projet combine la gestion de sessions PHP et les interactions avec une base de données MySQL.
    <br />
    <br />
    <a href="https://lecaer.alwaysdata.net/S3/R3.13/TPSession/"><strong>Voir le site en ligne »</strong></a>
  </p>
</div>

<details>
  <summary>Table des matières</summary>
  <ol>
    <li><a href="#a-propos-du-projet">À propos du projet</a></li>
    <li><a href="#acces-et-identifiants">Accès et Identifiants</a></li>
    <li><a href="#fonctionnalites">Fonctionnalités</a></li>
    <li><a href="#technologies">Technologies</a></li>
    <li><a href="#installation">Installation locale</a></li>
  </ol>
</details>

## À propos du projet

Ce projet a été réalisé durant le 3ème semestre du **BUT MMI**. Initialement centré sur l'apprentissage des **Sessions PHP** (authentification, cookies), le projet a été étendu pour inclure une gestion complète d'adhérents via une base de données **MySQL**.

Il permet de gérer une liste de membres (CRUD) à travers une interface sécurisée par une authentification.

> **Note :** Le design et le CSS (responsive et moderne) ont été générés par une Intelligence Artificielle afin de se concentrer exclusivement sur la logique PHP et SQL.

<p align="right">(<a href="#readme-top">retour en haut</a>)</p>

## Accès et Identifiants

Le projet est hébergé et accessible directement via AlwaysData.

**🔗 Lien :** [https://lecaer.alwaysdata.net/S3/R3.13/Projet-CRUD/](https://lecaer.alwaysdata.net/S3/R3.13/Projet-CRUD/)

Pour accéder à l'interface de gestion (Back Office), utilisez les identifiants suivants:

* **Login :** `toto`
* **Mot de passe :** `1234`

<p align="right">(<a href="#readme-top">retour en haut</a>)</p>

## Fonctionnalités

Le projet va au-delà des consignes initiales du TP en proposant un système CRUD complet :

### 🔐 Authentification & Sessions
* **Login :** Système de connexion sécurisé vérifiant les identifiants.
* **Protection :** Redirection automatique vers la page de login si un utilisateur non connecté tente d'accéder à l'index.
* **Logout :** Déconnexion propre avec destruction de la session.
* **Persistance :** Affichage du nom de l'utilisateur connecté sur toutes les pages.

### 🗃️ Gestion des Adhérents (CRUD)
* **Recherche dynamique :** Recherche d'adhérents par Nom et/ou Prénom.
* **Ajout intelligent :** Si la recherche ne donne aucun résultat, le site propose automatiquement d'ajouter ce nouvel adhérent avec les champs pré-remplis.
* **Liste des résultats :** Affichage sous forme de tableau responsive.
* **Modification :** Formulaire pour mettre à jour les informations d'un membre.
* **Suppression :** Bouton de suppression avec demande de confirmation.

<p align="right">(<a href="#readme-top">retour en haut</a>)</p>

## Technologies

* ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) **(Native / Procedural)**
* ![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white) **(via extension MySQLi)**
* ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) **(Généré par IA)**
* ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)

<p align="right">(<a href="#readme-top">retour en haut</a>)</p>

## Installation

Pour lancer le projet localement :

1.  **Cloner le dépôt :**
    ```sh
    git clone [https://github.com/votre-username/TPSession.git](https://github.com/votre-username/TPSession.git)
    ```

2.  **Configuration de la Base de données :**
    * Le fichier de configuration `db_config.php` est ignoré par Git pour des raisons de sécurité.
    * Créez un fichier nommé `db_config.php` à la racine du projet et collez-y le code suivant en adaptant vos identifiants:

    ```php
    <?php
    $host = 'localhost';      // Votre hôte (ex: localhost)
    $user = 'root';           // Votre utilisateur BDD
    $password = '';           // Votre mot de passe BDD
    $db = 'nom_de_votre_bdd'; // Le nom de votre base de données

    $link = mysqli_connect($host, $user, $password, $db);

    if (!$link) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }

    mysqli_set_charset($link, "utf8");
    ?>
    ```

3.  **Import SQL :**
    * Créez une base de données locale.
    * Importez la table `adherent` (colonnes requises : `id` [AUTO_INCREMENT], `nom`, `prenom`, `dateNaissance`).

4.  **Lancement :**
    * Placez le dossier dans votre serveur local (WAMP/MAMP/XAMPP) et accédez via `localhost`.

<p align="right">(<a href="#readme-top">retour en haut</a>)</p>