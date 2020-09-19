<?php
class App{
    protected $controller="gameController";
    protected $action="getAll";
    protected $params=[];

    function __construct(){
        $arr = $this->UrlProcess();
        // print_r($arr);
        // Controller
        if( file_exists("./application/controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            unset($arr[0]);
            require_once "./application/controllers/". $this->controller .".php";
            //require_once "./application/controllers/gameController.php";
            $this->controller = new $this->controller;
            // print_r($arr[1] ."arr 2323");
            // Action
            if(isset($arr[1])){
                //echo "1";
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                    //echo "2";
                }
                unset($arr[1]);
            }
    
            // Params
            $this->params = $arr ? array_values($arr):[];
            
            call_user_func_array([$this->controller, $this->action], $this->params );
    
        }
    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>