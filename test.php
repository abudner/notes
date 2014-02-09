<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dokument bez tytułu</title>
</head>

<body>
<?php
require "note.php";
require "db.php";

$db = new Db();
var_dump($db->getNotes(1));

?>
</body>
</html>