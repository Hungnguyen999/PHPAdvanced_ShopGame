<?php
    class User extends dbConnector{
        public function Login($userEmail, $userPassword){
            // echo 'Login modellll';
            // echo 'Login modelllsadasl'. $userEmail, $userPassword;
            $query = $this->con->prepare("SELECT * FROM User WHERE Email = ? and Pass = ? ");
            $query->bind_param('ss',$userEmail, $userPassword);
            $query->execute();
            $result =  $query->get_result();
           
            if (mysqli_num_rows($result) == 1) {
                // echo 'Login true';
                $userCur = mysqli_fetch_array($result);
                $_SESSION['username'] = $userCur['Email'];
                $_SESSION['userrole'] = $userCur['IsAdmin'];
                $_SESSION['name'] = $userCur['Firstname'];
            }
            else{
                // echo 'Login errrrr';
                $_SESSION['msgLogin'] = "Error";
            }
        }
    }
?>