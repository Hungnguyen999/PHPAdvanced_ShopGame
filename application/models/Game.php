<?php
    class Game extends dbConnector{
        public function getAll(){
            try{
                $result = mysqli_query($this->con,'SELECT * FROM Product Where Product.Quantity > 0');
                return $result;
            }
            catch(Exception $e){
                throw $e;   
            }
        }
        public function gameDetail($name){
            try{
                $stmt = $this->con->prepare('SELECT * FROM Product WHERE Product.Name = ?');
                $stmt->bind_param('s',$name);
                $stmt->execute();
                $result=$stmt->get_result();
                return $result;
            }
            catch(Exception $e){
                throw $e;   
            }
            
        } 
        public function gameInsert($gameName,$gamePrice,$gameProducer,$gameImage,$gameDescription,$gameQuantity){
            try{
                if($gamePrice = is_numeric($gamePrice) AND $gameQuantity = is_numeric($gameQuantity)){
                    $gamePrice = intval($gamePrice);
                    $gameQuantity = intval($gameQuantity);
                    $query = $this->con->prepare("INSERT INTO Product (Name, Price, Producer, Image, Descripton, Quantity) VALUES (?,?,?,?,?,?)");
                    $query->bind_param('sisssi',$gameName,$gamePrice,$gameProducer,$gameImage,$gameDescription,$gameQuantity);
                    $result = $query->execute();
                    return $result;
                }
                else{
                    echo 'Vui lòng nhập đúng định dạng';
                }
              
            }
            catch(Exception $e){
                throw $e;   
            }
            
        } 
    }
?>