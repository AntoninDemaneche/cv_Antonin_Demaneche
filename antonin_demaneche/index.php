<?php require_once('db.php'); ?>
<?php require_once('requetes.php'); ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>CV <?= $me['first_name']." ".$me['last_name'] ?></title>
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<article class="d-flex">
    <div class="left d-flex flex-column justify-content-center">
        <div class="roundedImage">
            <img src="../digimon/Castralrock.png" alt="" class="profile">
        </div>
        <h1><?= $me['first_name']." ".$me['last_name'] ?></h1>
        <div class="info1">
            <p><?= $me['job'] ?></p>
            <p><?= $me['experience'] ?></p>
        </div>
        <div id="trait">
        </div>
        <div>
            <p class="competencetitle">★ Compétences ★</p>
            <?php foreach ($skills as $skill) { ?>
              <p class="competence"><?= $skill['name'] ?></p>
            <?php } ?>
        </div>
        <div id="trait">
        </div>
        <div id="centre">
            <p><?= $me['age'] ?> ans</p>
        </div>
        <div id="trait">
        </div>
        <div id="centre">
            <p><?= $me['mail'] ?></p>
            <p><?= $me['phone'] ?></p>
        </div>
        <div id="trait">
        </div>
        <div id="centre" >
            <h3> ★ Qui suis-je ? ★</h3>
            <p id="info2"><?= $me['whoami'] ?></p>
            <h3> ★ Informations supplémentaires : ★</h3>
            <p id="info2">
              <?= $me['supinfo'] ?>
            </p>
        </div>
    </div>
    <div class="right d-flex flex-column justify-content-center">
        <h3> ★ Mes formations ★</h3>
        <ul>
          <?php foreach ($formations as $formation) { ?>
            <li><?= $formation['name'] ?></li>
          <?php } ?>
        </ul>
        <h3> ★ Mes expériences profesionnelles ★</h3>
        <ul>
          <?php foreach ($experiences as $experience) { ?>
            <li><?= $experience['name'] ?></li>
          <?php } ?>
        </ul>
        <h3> ★ Mes divers projets ★</h3>
        <ul>
          <?php foreach ($projects as $project) { ?>
            <li><?= $project['name'] ?></li>
          <?php } ?>
        </ul>
    </div>

</article>

<footer>
</footer>
</body>
</html>
