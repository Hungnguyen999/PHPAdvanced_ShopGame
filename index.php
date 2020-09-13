
<?php
    require('application/controllers/gameController.php');
    $gameController = new gameController();
    if(isset($_GET['name'])){
        $gameController->getDetail($name);
    }
    else{
        $gameController->getAll();
    }


?>