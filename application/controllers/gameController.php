<?php
    require_once('application/config/database.php');
    require_once('application/models/Game.php');
    class gameController extends dbConnector {
        public function __construct() { 
            $dbcon = new parent(); 
            // this is not needed in your case
            // you can use $this->conn = $this->connect(); without calling parent()
            $this->conn = $dbcon->connect();
        }
        public function getAll(){
            $games = Game::getAll();
            include_once('../PHPmvc/application/views/Homepage.php');
        }
        public function getDetail($name){
            $gameDetail = Game::gameDetail($_GET['name']);
            include_once('../PHPmvc/application/views/GameDetailpage.php');
        }
    }
?>