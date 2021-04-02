<?php
require_once "model/userManager.class.php";

class UserController {
    private $userManager;

    public function __construct(){
        $this->userManager = new userManager;
    }

    public function addUser(){
        require "view/inscription.view.php";
    }
}
