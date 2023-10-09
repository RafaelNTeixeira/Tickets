<?php
    session_start();

    class CSRF
    {
        public static function create_token($str){
            $token = md5(time());
            $_SESSION["token"] = $token;

            echo "<input type='text' required name='$str' value='$token'>";
        }

        public static function validate($token){
            return isset($_SESSION['token']) && $_SESSION['token'] == $token;
        }
    }
 ?>