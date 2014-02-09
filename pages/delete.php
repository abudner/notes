<?php


require('db.php');

$db = new Db();

$db->deleteNote($_GET['id']);
header("Location: index.php?page=listNotes");

?>