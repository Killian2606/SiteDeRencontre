# Site de rencontre MVC en POO

Ce projet est une implémentation d'un site de rencontre en utilisant le pattern de conception MVC et la programmation orientée objet (POO). Le site de rencontre permet l'inscription, la connexion, l'affichage des utilisateurs et la possibilité de liker et matcher.

Fonctionnalités:

Inscription et connexion
L'utilisateur peut créer un compte en remplissant le formulaire d'inscription qui contient les champs suivants : pseudo, photo de profil, résumé et infos. Après la création du compte, l'utilisateur peut se connecter en utilisant son pseudo et son mot de passe.

Affichage des utilisateurs:

Une fois connecté, l'utilisateur peut voir la liste des utilisateurs sous forme de cards qui contiennent leur photo de profil, leur pseudo et leur résumé. Chaque card a deux boutons : "voir plus" qui renvoie vers la page profil de l'utilisateur et "liker" qui ajoute un match entre l'utilisateur actuel et l'utilisateur liké (si la ligne n'existe pas déjà dans la table match).

Matching:

Si l'utilisateur liké like également l'utilisateur actuel, le statut du match est mis à jour en actif et un message indiquant que l'utilisateur a un match est affiché.

Connexion:

Compte pour tester le site:

user: Gargamel
mdp: =Gargamel

Application en local:

-Avec xaamp (version 3.3.0): activer la base de donnée puis importer le fichier sql et activer apache.
