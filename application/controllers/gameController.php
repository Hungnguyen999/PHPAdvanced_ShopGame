<?php
    class gameController extends Controller {
        public function getAll(){
             $model = $this->model("Game");
             $games = $model->getAll();
            $this->view("Homepage",[
                'gamelist' => $games
            ]);
        }
        public function getDetail($name){
            $model = $this->model("Game");
            $gameDetail = $model->gameDetail($name);
            $this->view("GameDetailpage",[
                'game' => $gameDetail
            ]);
        }
    }
?>