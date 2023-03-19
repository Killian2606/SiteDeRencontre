<link rel="stylesheet" href="/css/main.css">

<?php foreach ($utilisateurs as $utilisateur) { ?>

    <div class="card">
        <img src="data:image/jpeg;base64, <?= base64_encode($utilisateur['photo_de_profil']) ?>" class="card-img"/>
        <div>
            <h4><?= $utilisateur['pseudo'] ?></h4>
            <p><?= $utilisateur['résumé'] ?></p>
        </div>
        <div class="buttons">
            <a href="/users/voir/<?= $utilisateur['id'] ?>" class="button">Voir plus</a>
            <?php if ($utilisateur['statut'] == 'Like') { ?>
                <label class="green">Déjà liké !</label>
            <?php }
            else if ($utilisateur['statut'] == 'Match') { ?>
                <label class="red">Match !</label>
            <?php }
            else { ?>
                <a href="/users/like/<?= $utilisateur['id'] ?>" class="button">Liker</a>
            <?php } ?>
        </div>
    </div>

<?php } ?>