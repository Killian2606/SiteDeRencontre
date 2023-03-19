<link rel="stylesheet" href="/css/user.css">

<div class="big-card">
    <h2><?= $utilisateur['pseudo'] ?></h2>
    <img src="data:image/jpeg;base64, <?= base64_encode($utilisateur['photo_de_profil']) ?>" class="card-img"/>
    <p><?= $utilisateur['résumé'] ?></p>
    <h2><?= $utilisateur['description'] ?></h2>
</div>

<a href="/" class="button">Retour</a>