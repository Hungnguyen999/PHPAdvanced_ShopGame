<?php 
class adminController extends Controller{
    public function Admin(){
        $game = $this->model("Game");
        $data = [
            'gamelist' => $game->getAll()
        ];
        $this->view("InsertGamepage", $data);
    }
    public function Logout(){
            unset($_SESSION['username']);
            unset($_SESSION['userrole']);
            unset($_SESSION['msgLogin']);
            unset($_SESSION['name']);
            session_destroy();
            header('Location: /PHPmvc/index.php?url=gameController');
    }
    public function gameInsert(){
        if (isset($_POST['submit'])) {
            $gameName = isset($_POST['gameName']) ? $_POST['gameName'] : '';
            $gamePrice = isset($_POST['gamePrice']) ? $_POST['gamePrice'] : '';
            $gameProducer = isset($_POST['gameProducer']) ? $_POST['gameProducer'] : '';
            $gameQuantity = isset($_POST['gameQuantity']) ? $_POST['gameQuantity'] : '';
            $gameDescription = isset($_POST['gameDescription']) ? $_POST['gameDescription'] : '';
            $gameImage = isset($_POST['gameImage']) ? $_POST['gameImage'] : '';
            $game = $this->model("Game");
            $game->gameInsert($gameName,$gamePrice,$gameProducer,$gameImage,$gameDescription,$gameQuantity);
            header('Location: /PHPmvc/index.php?url=adminController/Admin');  
        }
        else{
            echo 'không vào nhé';
        }

    }
    public function gameInsertCSV(){
        if (isset($_POST["import"])) {
            echo "Vào được csv";
            $fileName = $_FILES["file"]["tmp_name"];
            if ($_FILES["file"]["size"] > 0 AND $_FILES["file"]["size"] < 1000) {
                $file = fopen($fileName, "r");
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $gameName = "";
                    if (isset($column[0])) {
                        $gameName = $column[0];
                    }
                    $gamePrice = 0;
                    if (isset($column[1])) {
                        $gamePrice = $column[1];
                    }
                    $gameProducer = "";
                    if (isset($column[2])) {
                        $gameProducer = $column[2];
                    }
                    $gameImage = "";
                    if (isset($column[3])) {
                        $gameImage =  $column[3];
                    }
                    $gameDescription = "";
                    if (isset($column[4])) {
                        $gameDescription = $column[4];
                    }
                    $gameQuantity = 0;
                    if (isset($column[5])) {
                        $gameQuantity = $column[5];
                    }
                    $game = $this->model("Game");
                    //echo $gameName,$gamePrice,$gameProducer,$gameQuantity,$gameDescription,$gameImage;
                    $result = $game->gameInsert($gameName,$gamePrice,$gameProducer,$gameImage,$gameDescription,$gameQuantity);
                    

                    // $gameName = mysqli_real_escape_string($this->conn, $column[0]);
                    // $gamePrice = is_numeric($this->conn, $column[1]);
                    // $gameProducer = mysqli_real_escape_string($this->conn, $column[2]);
                    // $gameQuantity = is_numeric($this->conn, $column[3]);
                    // $gameDescription = mysqli_real_escape_string($this->conn, $column[4]);
                    // $gameImage = mysqli_real_escape_string($this->conn, $column[5]);
                    if (! empty($result)) {
                        $data = [
                            'type' => "success",
                            'message' => "CSV Data Imported into the Database",
                        ];
                        
                        header('Location: /PHPmvc/index.php?url=adminController/Admin');
                        $this->view("InsertGamepage", $data);
                    } else {
                        $data = [
                            'type' => "error",
                            'message' => "Problem in Importing CSV Data",
                        ];
                       
                        header('Location: /PHPmvc/index.php?url=adminController/Admin');
                        $this->view("InsertGamepage", $data);
                    }
                }
            }
        }
    }
}
?>