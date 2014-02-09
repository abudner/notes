<?php
ob_start();
session_start();?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Notes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
    <div id='menu'>
        <ul>
           <li><a href='?'><span>Strona domowa</span></a></li>
           
          
    
    <?php
		if($_SESSION['login'] == ""){ // jeżeli user nie zalogowany
			echo "<li class='rightsite'><a href='?page=login'>logowanie</a></li><li class='rightsite'><a href='?page=register'>rejestracja</a></li>";
		}
		else{
			echo "<li><a href='?page=addNote'><span>Dodaj notatkę</span></a></li>";
			echo "<li><a href='?page=listNotes'><span>Lista notatek</span></a></li>";
			echo "<li class='rightsite'><a href='?page=logout'> wyloguj</a></li><li class='rightsit'>Zalogowany : ". $_SESSION['login'] . "</li>";
			
			}
	?>
    	    </ul>
	</div>
	<?php
		if(!empty($_GET['msg'])) {
			echo $_GET['msg'];	
		}
		else if($_GET['page'] == ""){
			require "pages/main.php";	
		}
	
		else{
			require "pages/". $_GET['page'].".php";	
		}
	?>

	</body>
</html>
<?php ob_end_flush(); ?>