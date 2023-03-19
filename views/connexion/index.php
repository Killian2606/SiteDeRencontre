<link rel="stylesheet" href="/css/enregistrement.css">

<div class="container">
    <h2>Se connecter</h2>
    <form method="post" action="/connexion/connexion">
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required>
        <input type="password" name="mot-de-passe" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter">
    </form>
    <a href="/inscription">S'inscrire</a>
</div>