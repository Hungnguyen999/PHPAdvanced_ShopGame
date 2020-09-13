<?php
    class Game {
        public $ID;
        public $Name;
        public $Price;
        public $Image;
        public $Producer;
        public function __construct($Name,$Price,$Image,$Producer){
            $this->Name = $Name;
            $this->Price = $Price;
            $this->Image = $Image;
            $this->Producer = $Producer;
        }
        
        public static function getAll(){
            $listGames = [];
            try{
                $db = dbConnector::connect(); 
                $result = mysqli_query($db,'SELECT * FROM Product');
                while($row = mysqli_fetch_assoc($result)){
                     $listGames[] = new Game($row['Name'], $row['Price'], $row['Image'], $row['Producer']);
                }
                $db->close();
                return $listGames;
            }
            catch(Exception $e){
                $db->close(); 
                throw $e;   
            }
        }
        public static function gameDetail($name){
            try{
                $db = dbConnector::connect(); 
                $stmt = $db->prepare('SELECT * FROM Product WHERE Product.Name = ?');
                $stmt->bind_param('s',$name);
                $stmt->execute();
                $result=$stmt->get_result();
                while($row = mysqli_fetch_assoc($result)){
                        $gameDetail = new Game($row['Name'], $row['Price'], $row['Image'], $row['Producer']);
                }
                return $gameDetail;
            }
            catch(Exception $e){
                $db->close(); 
                throw $e;   
            }
          
        } 
    }
?>