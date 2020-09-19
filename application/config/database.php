<?php 
    class dbConnector {
        //public $dbconfig = parse_ini_file(".env",true);
        public $con;
        public $host = 'localhost';
        public $user = 'phpmyadmin';
        public $pass = 'hungreoA7@123';
        public $db   = 'dbGameStore';
        function __construct(){

            $this->con = mysqli_connect($this->host,$this->user,$this->pass,$this->db);;
            mysqli_select_db($this->con, $this->db);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }
        // public static function connect(){
        //     $dbconfig = parse_ini_file("../../.env");
        //     $host = $dbconfig['DB_HOST'];
        //     $user = $dbconfig['DB_USERNAME'];
        //     $pass = $dbconfig['DB_PASSWORD'];
        //     $db   = $dbconfig['DB_DATABASE'];
        //     $connection = mysqli_connect($host,$user,$pass,$db);
        //     //echo 'Đang chuẩn bị kết nối';
        //     //print_r($connection);
        //     if(!$connection){
        //         echo 'Kết nối không thành công';
        //     }
        //     else{
        //         echo 'Kết nối thành công';
        //     }
        //     return $connection;
        // }
    }
?>