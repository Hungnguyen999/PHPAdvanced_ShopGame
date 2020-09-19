<?php
    class userController extends Controller {
        public function Login()
        {
            unset($_SESSION['msgLogin']);
            $error = array();
            $user = $this->model("User");
            $useremail = isset($_POST['username']) ? $_POST['username'] : '';
            $userpassword = isset($_POST['password']) ? $_POST['password'] : '';
            //echo $useremail. $userpassword;
            if (isset($_POST['submit'])) {
                 if (!empty($useremail) && !empty($userpassword)) {
                    $user->Login($_POST['username'], $_POST['password']);
                    if (isset($_SESSION['msgLogin'])) {
                        $error['login'] = "Sai tài khoản hoặc mật khẩu";
                    } else if ($_SESSION['userrole'] == 0) {
                        header('Location: /PHPmvc/index.php?url=gameController/getAll');
                    } else {
                        header('Location: /PHPmvc/index.php?url=adminController/Admin');
                    }
                }
            }
            $data = [
                'method' => 'Login',
                'error' => $error
            ];
            $this->view('Loginpage',$data);
        }
        public function Logout()
        {   
                unset($_SESSION['username']);
                unset($_SESSION['userrole']);
                unset($_SESSION['msgLogin']);
                unset($_SESSION['name']);
                session_destroy();
                header('Location: /PHPmvc/index.php?url=gameController');
        }

        ///Add to cart Part
        // public function loadUPSession(){
        //            //Load up session
        //     if ( !isset($_SESSION["total"]) ) {
        //         $_SESSION["total"] = 0;
        //         for ($i=0; $i< count($products); $i++) {
        //         $_SESSION["qty"][$i] = 0;
        //         $_SESSION["amounts"][$i] = 0;
        //     }
        //     }
        // }
 
        // public function Reset(){
        //      //Reset
        //     if ( isset($_GET['reset']) )
        //     {
        //     if ($_GET["reset"] == 'true')
        //         {
        //         unset($_SESSION["qty"]); //The quantity for each product
        //         unset($_SESSION["amounts"]); //The amount from each product
        //         unset($_SESSION["total"]); //The total cost
        //         unset($_SESSION["cart"]); //Which item has been chosen
        //         }
        //     }
        // }

        // public function addToCart(){
        //      //Add
        //     if ( isset($_GET["add"]) )
        //     {
        //         $i = $_GET["add"];
        //         $qty = $_SESSION["qty"][$i] + 1;
        //         $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
        //         $_SESSION["cart"][$i] = $i;
        //         $_SESSION["qty"][$i] = $qty;
        //     }
        // }
        // public function deleteCart(){
        //     if ( isset($_GET["delete"]) )
        //     {
        //         $i = $_GET["delete"];
        //         $qty = $_SESSION["qty"][$i];
        //         $qty--;
        //         $_SESSION["qty"][$i] = $qty;
        //         //remove item if quantity is zero
        //         if ($qty == 0) {
        //             $_SESSION["amounts"][$i] = 0;
        //             unset($_SESSION["cart"][$i]);
        //         }
        //         else
        //         {
        //             $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
        //         }
        //     }
        // }
    }
?>