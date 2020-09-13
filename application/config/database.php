<?php 
    class dbConnector {
        public function connect(){
            $dbconfig = parse_ini_file("../PHPmvc/.env");
            $host = $dbconfig['DB_HOST'];
            $user = $dbconfig['DB_USERNAME'];
            $pass = $dbconfig['DB_PASSWORD'];
            $db   = $dbconfig['DB_DATABASE'];
            $connection = mysqli_connect($host,$user,$pass,$db);
            //echo 'Đang chuẩn bị kết nối';
            //print_r($connection);
            if(!$connection){
                //echo 'Kết nối không thành công';
            }
            else{
                //echo 'Kết nối thành công';
            }
            return $connection;
        }
    }
?>