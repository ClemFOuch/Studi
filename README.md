## Projet Ventalis Studi 2023
Ce projet est un projet ECF dans le cadre de la formation "Bachelor Concepteur Développeur Application Option Python ".
Ce projet est tiré d'un énoncé de la plateforme formatrice en ligne : Studi.

Plusieurs sources m'ont aidé à développer ce projet dont :
Grafikart
Online Tutorial
Graven
Python Doctor

Pour lancer le site en local, il vous faudra ouvrir le dossier complet "Ventalis" avec votre IDE préféré. Ensuite, il faut lancer un serveur virtuel php avec la commande depuis votre terminal : php -S localhost:8000 -t public
En parallèle, la base de données mySql avec Xampp doit être créée.
Pour créer cette base de données vous devez rentrer le bon login et mot de passe.

Suite à la connexion avec la base de données, vous pouvez utiliser le fichier bdd.sql pour lancer la transaction au sein de la base de données afin de créer les tables et ensuite vous pouvez effectuer la commande depuis votre terminal : php commands/fill.php pour remplir les tables.

Une fois la base de données remplie, je vous invite à lancer cette commande depuis votre terminal pour être sûr que "composer" est à jour : php composer.phar update

Bien vérifier que le dossier vendror comporte bien tous les fichiers dont il a besoin pour fonctionner. Pour cela il suffit de voir dans le fichier composer.json si tous les fichiers 'require' sont téléchargés.

