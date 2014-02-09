<?php
class User {
	public $id;
    public $login;
    public $password;
	
	public function __construct($login,$password){
		$this->login = $login;
		$this->password = $password;
	}

}
?>