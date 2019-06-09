<?php
session_start();
require_once('db.php');
if(isset($_POST['connect']) && !isset($_SESSION['connected'])) {
  if($_POST['login'] == 'root' && $_POST['password'] == 'root') {
    $_SESSION['connected'] = true;
  }
}
if(isset($_POST['disconnect'])) {
  session_unset();
  session_destroy();
}
if(isset($_SESSION['connected'])) {
  require_once('dashboard.php');
} else { ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h1>Connexion</h1>
  <form class="w-50 mx-auto m-2" action="admin.php" method="post">
    <input class="form-control mb-2" type="text" placeholder="Login" name="login" />
    <input class="form-control mb-2" type="password" placeholder="password" name="password" />
    <button class="btn btn-primary mx-auto d-block" type="submit" name="connect">Connexion</button>
  </form>
</body>
</html>
<?php } ?>
