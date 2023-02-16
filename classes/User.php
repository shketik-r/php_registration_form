<?php

class User{
    public $name;
    public $login;
    public $password;
    public $email;
  
public function __construct($name, $login, $password, $email){
    $this->name = $name;
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
}

    public function createNewUser(){
    
        return $arrNewUser = [
            'name' =>$this->name,
            'login' => $this->login,
            'password' => md5($this->password),
            'email' =>$this->email
        ];
    }
}