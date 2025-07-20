<?php

class User {
    private $id, $name, $username, $password, $age;

    public function __construct($id, $name, $username, $password, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->age = $age;
    }

    public function toFileFormat() {
        return "{$this->id}|{$this->name}|{$this->username}|{$this->password}|{$this->age}\n";
    }
}