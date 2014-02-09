<?php
session_start();
require('db.php');

$db = new Db();
if($_GET['action'] == 'login') {
	if($user = $db->checkUser($_POST['login'], $_POST['password'])) {
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['id'] = $user;	
		header("Location: index.php?page=listNotes");
	} else {
		include("pages/login.php");
		echo "<div class='box5'>Zły login lub hasło</div>";
	}
}
else if ($_GET['action'] == 'register') {
	if(!$db -> existUser($_POST['login'])) {
		$db -> saveUser($_POST['login'], $_POST['password']);
		header("Location: index.php");
	} else {
		echo 'Taki użytkownik już istnieje';	
	}
	
	
}
else if ($_GET['action'] == 'add') {
	$db->addNote($_POST['title'],$_POST['content'], $_SESSION['id']);
	header("Location: index.php?page=listNotes");
	
	}
	
else if ($_GET['action'] == 'update') {
	
	$db->updateNote( $_GET['id'],$_POST['title'],$_POST['content']);
	header("Location: index.php?page=listNotes");
	
	}

?>