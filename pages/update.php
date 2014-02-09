<?php
require('db.php');

$db = new Db();

$note = $db->getNote($_GET['id']);
?>
<div class="box4">
<img src="images/sticky8.png" alt="sticky" width="160" height="160">
</div>
<div class="box3">
<form method="post" action="?page=action&action=update&id=<?php echo $_GET['id']?> ">
    
    <div class="box2">
    <label for="title">Title</label>
    </div>
    <div class="box2">
    <input type="text" name="title" id="title" value="<?php echo $note->title ?>" >
    </div>
    <div class="box2">
    <label for="content">Content</label>
    </div>
    <div class="box2">
    <textarea rows="4" cols="50" name="content" ><?php echo $note->content ?></textarea>
    </div>
    <div class="box2">        
    <input type="submit" value="Wyślij">
    </div>
    
   
    </form>
</div>