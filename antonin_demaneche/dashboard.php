<?php
if(isset($_POST['sme'])) {
  $inject = $db->prepare("UPDATE me SET first_name = ?, last_name = ?, age = ?, job = ?, experience = ?, mail = ?, phone = ?, whoami = ?, supinfo = ? WHERE id = 1");
  $inject->execute([
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['age'],
    $_POST['job'],
    $_POST['experience'],
    $_POST['mail'],
    $_POST['phone'],
    $_POST['supinfo'],
    $_POST['whoami']
  ]);
}

// Compétences

if(isset($_POST['sskill'])) {
  foreach ($_POST as $key => $value) {
    if(explode('-', $key)[0] == "skill") {
      $id = explode('-', $key)[1];
      $name = $key;
    }
  }
  $inject = $db->prepare("UPDATE skills SET name = ? WHERE id = ?");
  $inject->execute([
    $_POST[$name],
    $id
  ]);
}

if(isset($_POST['askill'])) {
  $inject = $db->prepare("INSERT INTO skills(name) VALUES(?)");
  $inject->execute([
    $_POST['skillname']
  ]);
}

// Projets

if(isset($_POST['sproject'])) {
  foreach ($_POST as $key => $value) {
    if(explode('-', $key)[0] == "project") {
      $id = explode('-', $key)[1];
      $name = $key;
    }
  }
  $inject = $db->prepare("UPDATE projects SET name = ? WHERE id = ?");
  $inject->execute([
    $_POST[$name],
    $id
  ]);
}

if(isset($_POST['aproject'])) {
  $inject = $db->prepare("INSERT INTO projects(name) VALUES(?)");
  $inject->execute([
    $_POST['projectname']
  ]);
}

// Formations

if(isset($_POST['sformation'])) {
  foreach ($_POST as $key => $value) {
    if(explode('-', $key)[0] == "formation") {
      $id = explode('-', $key)[1];
      $name = $key;
    }
  }
  $inject = $db->prepare("UPDATE formations SET name = ? WHERE id = ?");
  $inject->execute([
    $_POST[$name],
    $id
  ]);
}

if(isset($_POST['aformation'])) {
  $inject = $db->prepare("INSERT INTO formations(name) VALUES(?)");
  $inject->execute([
    $_POST['formationname']
  ]);
}

// Compétences

if(isset($_POST['sexperience'])) {
  foreach ($_POST as $key => $value) {
    if(explode('-', $key)[0] == "experience") {
      $id = explode('-', $key)[1];
      $name = $key;
    }
  }
  $inject = $db->prepare("UPDATE experiences SET name = ? WHERE id = ?");
  $inject->execute([
    $_POST[$name],
    $id
  ]);
}

if(isset($_POST['aexperience'])) {
  $inject = $db->prepare("INSERT INTO experiences(name) VALUES(?)");
  $inject->execute([
    $_POST['experiencename']
  ]);
}

foreach($_POST as $key => $value) {
  if(explode('-', $key)[0] == 'dskill') {
    $inject = $db->prepare("DELETE FROM skills WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'dproject') {
    $inject = $db->prepare("DELETE FROM projects WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'dformation') {
    $inject = $db->prepare("DELETE FROM formations WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
  if(explode('-', $key)[0] == 'dexperience') {
    $inject = $db->prepare("DELETE FROM experiences WHERE id = ?");
    $inject->execute([
      explode('-', $key)[1]
    ]);
  }
}
?>
<?php require_once('requetes.php'); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>CV Dashboard</title>
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h1>Dashboard</h1>
  <form action="admin.php" method="post">
    <button class="btn btn-danger d-block mx-auto mb-2" type="submit" name="disconnect">Déconnexion</button>
  </form>
  <section class="border-top p-5">
    <h2>Moi</h2>
    <?php if(isset($_POST['mme'])) { ?>
      <form action="admin.php" method="post">
        <?php
        foreach ($me as $key => $value) {
          if($key != "age" && $key != 'id' && $key != 'whoami' && $key != 'supinfo') { ?>
            <label><?= $key ?> : </label><input class="form-control my-1" type="text" name="<?= $key ?>" value="<?= $value ?>" />
          <?php } else if ($key == "age") { ?>
            <label><?= $key ?> : </label><input class="form-control my-1" type="number" name="<?= $key ?>" value="<?= $value ?>" />
          <?php } else if ($key == 'whoami' || $key == 'supinfo') { ?>
            <label><?= $key ?> : </label><textarea class="form-control my-1" name="<?= $key ?>" /><?= $value ?></textarea>
          <?php }
        }
        ?>
        <button class="btn btn-success" type="submit" name="sme">Sauvegarder</button>
      </form>
    <?php } else { ?>
      <ul class="list-unstyled">
        <?php
        foreach ($me as $key => $value) {
          if($key != 'id') { ?>
            <li><span class="font-weight-bold"><?= $key ?> : </span><?= $value ?></li>
          <?php }
        }
        ?>
      </ul>
      <form action="admin.php" method="post">
        <button class="btn btn-primary" type="submit" name="mme">Modifier</button>
      </form>
    <?php } ?>
  </section>
  <section class="border-top p-5">
    <h2>Compétences</h2>
      <ul class="list-unstyled">
        <?php
        $mskills = false;
        $mskill = false;
        foreach($_POST as $key => $value) {
          if(explode('-', $key)[0] == "mskill") {
            $mskills = true;
            $mskill = explode('-', $key)[1];
          }
        }
        foreach ($skills as $skill) {
          if($mskills && $mskill == $skill['id']) { ?>
            <li>
              <form class="form-inline" action="admin.php" method="post">
                <input class="form-control my-1 mr-2" type="text" name="skill-<?= $skill['id'] ?>" value="<?= $skill['name'] ?>" />
                <button class="btn btn-success" type="submit" name="sskill">Sauvegarder</button>
              </form>
            </li>
          <?php } else { ?>
            <li class="mb-2">
              <form action="admin.php" method="post">
                <?= $skill['name'] ?>
                <button class="btn btn-primary" type="submit" name="mskill-<?= $skill['id'] ?>">Modifier</button>
                <button class="btn btn-danger" type="submit" name="dskill-<?= $skill['id'] ?>">Supprimer</button>
              </form>
            </li>
          <?php }
        }
        ?>
        <form class="form-inline" action="admin.php" method="post">
          <input class="form-control my-1 mr-2" type="text" name="skillname" placeholder="Nom de la compétence" />
          <button class="btn btn-info" type="submit" name="askill">Ajouter</button>
        </form>
      </ul>
  </section>
  <section class="border-top p-5">
    <h2>Projets</h2>
      <ul class="list-unstyled">
        <?php
        $mprojects = false;
        $mproject = false;
        foreach($_POST as $key => $value) {
          if(explode('-', $key)[0] == "mproject") {
            $mprojects = true;
            $mproject = explode('-', $key)[1];
          }
        }
        foreach ($projects as $project) {
          if($mprojects && $mproject == $project['id']) { ?>
            <li>
              <form class="form-inline" action="admin.php" method="post">
                <input class="form-control my-1 mr-2" type="text" name="project-<?= $project['id'] ?>" value="<?= $project['name'] ?>" />
                <button class="btn btn-success" type="submit" name="sproject">Sauvegarder</button>
              </form>
            </li>
          <?php } else { ?>
            <li class="mb-2">
              <form action="admin.php" method="post">
                <?= $project['name'] ?>
                <button class="btn btn-primary" type="submit" name="mproject-<?= $project['id'] ?>">Modifier</button>
                <button class="btn btn-danger" type="submit" name="dproject-<?= $project['id'] ?>">Supprimer</button>
              </form>
            </li>
          <?php }
        }
        ?>
        <form class="form-inline" action="admin.php" method="post">
          <input class="form-control my-1 mr-2" type="text" name="projectname" placeholder="Nom du projet" />
          <button class="btn btn-info" type="submit" name="aproject">Ajouter</button>
        </form>
      </ul>
  </section>
  <section class="border-top p-5">
    <h2>Formations</h2>
      <ul class="list-unstyled">
        <?php
        $mformations = false;
        $mformation = false;
        foreach($_POST as $key => $value) {
          if(explode('-', $key)[0] == "mformation") {
            $mformations = true;
            $mformation = explode('-', $key)[1];
          }
        }
        foreach ($formations as $formation) {
          if($mformations && $mformation == $formation['id']) { ?>
            <li>
              <form class="form-inline" action="admin.php" method="post">
                <input class="form-control my-1 mr-2" type="text" name="formation-<?= $formation['id'] ?>" value="<?= $formation['name'] ?>" />
                <button class="btn btn-success" type="submit" name="sformation">Sauvegarder</button>
              </form>
            </li>
          <?php } else { ?>
            <li class="mb-2">
              <form action="admin.php" method="post">
                <?= $formation['name'] ?>
                <button class="btn btn-primary" type="submit" name="mformation-<?= $formation['id'] ?>">Modifier</button>
                <button class="btn btn-danger" type="submit" name="dformation-<?= $formation['id'] ?>">Supprimer</button>
              </form>
            </li>
          <?php }
        }
        ?>
        <form class="form-inline" action="admin.php" method="post">
          <input class="form-control my-1 mr-2" type="text" name="formationname" placeholder="Nom de la formation" />
          <button class="btn btn-info" type="submit" name="aformation">Ajouter</button>
        </form>
      </ul>
  </section>
  <section class="border-top p-5">
    <h2>Expériences professionnelles</h2>
      <ul class="list-unstyled">
        <?php
        $mexperiences = false;
        $mexperience = false;
        foreach($_POST as $key => $value) {
          if(explode('-', $key)[0] == "mexperience") {
            $mexperiences = true;
            $mexperience = explode('-', $key)[1];
          }
        }
        foreach ($experiences as $experience) {
          if($mexperiences && $mexperience == $experience['id']) { ?>
            <li>
              <form class="form-inline" action="admin.php" method="post">
                <input class="form-control my-1 mr-2" type="text" name="experience-<?= $experience['id'] ?>" value="<?= $experience['name'] ?>" />
                <button class="btn btn-success" type="submit" name="sexperience">Sauvegarder</button>
              </form>
            </li>
          <?php } else { ?>
            <li class="mb-2">
              <form action="admin.php" method="post">
                <?= $experience['name'] ?>
                <button class="btn btn-primary" type="submit" name="mexperience-<?= $experience['id'] ?>">Modifier</button>
                <button class="btn btn-danger" type="submit" name="dexperience-<?= $experience['id'] ?>">Supprimer</button>
              </form>
            </li>
          <?php }
        }
        ?>
        <form class="form-inline" action="admin.php" method="post">
          <input class="form-control my-1 mr-2" type="text" name="experiencename" placeholder="Nom de l'expérience" />
          <button class="btn btn-info" type="submit" name="aexperience">Ajouter</button>
        </form>
      </ul>
  </section>
</body>
</html>
