<?php
class Note{
	public $id;
	public $title;
	public $content;
	public $id_user;
	
	public function construct($title,$content,$id_user){
		$this->title = $title;
		$this->content = $content;
		$this->id_user = $id_user;
	}
}
?>