<?php
session_start();
require('db.php');

$db = new Db();

$note = $db->getNotes($_SESSION['id']);
?>
<div class="box4">
<img src="images/sticky7.png" alt="sticky" width="160" height="160">
</div>
<div class='main'>
<?php
foreach($note as $obiekt) {
   echo "<div class='boxnote'>";
   echo "<div class='title1'>Tytuł  :  " . $obiekt -> title . "</div></br>" ;
   
   echo "<div class='content1'>" . $obiekt -> content . "</div></br>";
   echo "<a href='?page=update&id=".$obiekt -> id . "'><button class='but'type='button'>Edytuj</button></a>";
   echo "<a href='?page=delete&id=".$obiekt ->id . "' onClick=\"return confirm('Usunac?');\"><button type='button' class='but'>Usuń</button></a></div>";
}
?>
</div>


