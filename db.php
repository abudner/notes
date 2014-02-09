<?php
require "note.php";

class Db {
	private $db_conn;
	private $salt = "nWZO!7x3IO";
	
	public function __construct() {
		try {
			$this->db_conn = new PDO('mysql:host=localhost;dbname=notes', 'root', '');
			$this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			echo "Connection error";
		}
	}
	public function getNotes($id_user) {
		$stmt = $this->db_conn->prepare('SELECT * FROM note WHERE id_user = :id');
		$stmt -> bindValue(':id', $id_user, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS,"note");
	}
	
	public function getNote($id) {
		$stmt = $this ->db_conn->prepare('SELECT * FROM note WHERE id=:id');
		$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
		$stmt -> execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "note");
		return $stmt -> fetch();
		}
	
	public function addNote($title, $content, $id_user) {
		$stmt = $this->db_conn->prepare('INSERT INTO note (title, content, id_user) VALUES (:title,:content,:id)');	
		$stmt -> bindValue(':title',$title);
		$stmt -> bindValue(':content',$content);
		$stmt -> bindValue(':id',$id_user,PDO::PARAM_INT);
		return $stmt -> execute();
	}
	
	public function deleteNote($id){
		$stmt = $this -> db_conn -> prepare ('DELETE FROM note WHERE id = :id ');
		$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
		return $stmt -> execute();
			
	}
	public function updateNote($id,$title,$content){
		
		$stmt = $this -> db_conn -> prepare ('UPDATE `note` SET `title`=:title, `content`=:content WHERE `id`=:id');
		$stmt ->bindValue (':id', $id, PDO::PARAM_INT);
		$stmt ->bindValue (':title', $title);
		$stmt ->bindValue (':content', $content);
		
		return $stmt -> execute();
	
	}
	public function saveUser($login,$password){
		$stmt = $this -> db_conn -> prepare ('INSERT INTO user (login,password) VALUES (:login,:password)');
		$stmt -> bindValue(':login', $login);
		$stmt -> bindValue(':password',crypt($password,$this->salt));
		return $stmt -> execute();	
	}
	public function checkUser($login,$password){
		$stmt = $this -> db_conn -> prepare ('SELECT id FROM user WHERE login=:login AND password = :password');
		$stmt -> bindValue(':login',$login);
		$stmt -> bindValue(':password',crypt($password,$this->salt));
		$stmt -> execute();
		
		if($row = $stmt->fetch())
			return $row['id'];
		else
			return false;
		
	}
	public function existUser($login){
		$stmt = $this -> db_conn -> prepare ('SELECT count(*) FROM user WHERE login=:login');
		$stmt -> bindValue(':login', $login);
		$stmt -> execute();
		$res = $stmt->fetch();
		return $res[0];
		}
	
}

?>