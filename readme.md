🌴 StudiVoyage - Documentation du projet

🌱 Description du projet
StudiVoyage est une plateforme web dédiée aux voyages, permettant de découvrir les différentes options de séjours, circuits, croisières, dernières minutes et promotions disponibles dans l'agence de voyage. Ce projet vise à offrir une expérience utilisateur fluide et intuitive, tout en intégrant un tableau de bord (dashboard) pour les administrateurs et les employés, facilitant ainsi la gestion globale.
L'application a été développée en PHP avec une architecture MVC, en utilisant des services et des repository pour gérer les données. La plateforme est containerisée avec Docker, ce qui simplifie son déploiement et la gestion des environnements.

 🎯Fonctionnalités principales

Visiteurs : Consultation d'informations sur les séjours, circuits, croisières, dernières minutes et promotions.

Consultation des détails de chaque voyage et de ses offres spéciales.

DASHBOARD :

Gestion des utilisateurs (Administrateur) : Ajout, modification, suppression et gestion des permissions d'accès au dashboard.

Gestion des voyages : Ajout, modification, suppression et consultation des séjours, circuits, croisières, dernières minutes et promotions.

Authentification :

Adresse mail et mot de passe (mail envoyé via PHP Mailer depuis l'adresse de l'administrateur).

Accès au dashboard avec un niveau de permission spécifique en fonction du rôle de l'utilisateur (administrateur ou employé).

🛠️ Technologies utilisées

Maquettage : Figma

Front-end : HTML5, CSS3 (avec Bootstrap), JavaScript pour l'interactivité.

Back-end : PHP 8.2 avec une architecture MVC, gestion des données avec PDO.

Base de données : MySQL (AlwaysData) pour la gestion des données relationnelles.

Variables d'environnement : Dotenv

Gestion des e-mails : PHPMailer

Gestion des dépendances : Composer.

Conteneurisation : Docker pour la gestion des environnements de développement et de production.


⚙️ Installation et déploiement

1️⃣ Prérequis
Avant de commencer, assurez-vous que les outils suivants sont installés sur votre machine :

PHP 8.2 ou supérieur

MySQL

Composer

Docker

2️⃣ Cloner le dépôt

Clonez le projet depuis GitHub :

git clone : https://github.com/Oume59/studiVoyage.git
cd studiVoyage

3️⃣ Installer les dépendances

composer install

4️⃣ Configurer les variables d'environnement

Créez un fichier .env à la racine du projet avec les éléments suivants :

# Configuration pour l'email
MAIL_HOST=smtp.gmail.com
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=ssl
MAIL_PORT=587

# Configuration pour la base de données (MySQL)
DB_HOST=localhost
DB_NAME=your_db_name
DB_USER=your_db_user
DB_PASS=your_db_password
MYSQL_ROOT_PASSWORD=your_mysql_root_password
MYSQL_DATABASE=your_db_name
MYSQL_USER=your_db_user
MYSQL_PASSWORD=your_db_password

5️⃣ Importer la base de données
Exécutez les commandes SQL pour configurer la base de données :

mysql -u root -p < database.sql

6️⃣ Lancer l'application localement
Avec Docker :

docker-compose up --build

Sans Docker :

php -S localhost:8085 -t Public

7️⃣ Déployer sur Heroku (optionnel)
Si vous souhaitez déployer sur Heroku, utilisez les commandes suivantes :

heroku login
heroku create studi-voyage
heroku config:set DB_HOST=... DB_USER=... DB_PASS=...
git add .
git commit -m "Déploiement sur Heroku"
git push heroku main
heroku open

👥 Contributeur
Mélissa Ould Youcef, Développeuse Web Full-Stack en formation 🖥️

Merci d'utiliser StudiVoyage pour organiser vos voyages !

