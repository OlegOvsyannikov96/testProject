<?php
class User {
    private $login = null;
    private $email = null;
    private $name = null;
    private $password = null;
    private $password_confirm = null;
    public function __construct($data) {
        $this->login = $data['login'];
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->password = $data['password'];
        $this->password_confirm = $data['password-confirm'];
    }
    public function __get($field) {
        return $this->$field;
    }
}