<?php
$me = $db->query("SELECT * FROM me WHERE id = 1");
$me = $me->fetch(PDO::FETCH_ASSOC);

$skills = $db->query("SELECT * FROM skills");
$skills = $skills->fetchAll();

$formations = $db->query("SELECT * FROM formations");
$formations = $formations->fetchAll();

$experiences = $db->query("SELECT * FROM experiences");
$experiences = $experiences->fetchAll();

$projects = $db->query("SELECT * FROM projects");
$projects = $projects->fetchAll();
?>
