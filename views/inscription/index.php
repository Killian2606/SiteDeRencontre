<link rel="stylesheet" href="/css/enregistrement.css">

<div class="container" style="margin-top: 5%">
    <h2>S'inscrire</h2>
    <form method="post" action="/inscription/inscription" enctype="multipart/form-data">
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" required>
        <input type="password" name="mot-de-passe" placeholder="Mot de passe" required>
        <input type="text" name="resume" placeholder="Phrase d'accroche" required>
        <input type="text" name="description" placeholder="Description" required>
        <label>Sélectionner une photo de profil <input type="file" name="photo" accept="image/png, image/jpeg" required></label>
        <input type="submit" value="S'inscrire">
    </form>
    <a href="/connexion">Se connecter</a>
</div>