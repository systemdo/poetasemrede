<?php

Class Login {

    function __construct() {
        //ini_set("session.use_cookies", 1);
        //ini_set("session.use_only_cookies", 1);
        //ini_set("session.cookie_lifetime", 900);

        session_start();
    }

    static function login($email = false, $password = false) {
        if ($email && $password) {
            $user = Login::checkUser($email, $password);
            if ($user->getId()) {
                self::beginSession($user);
                return true;
            }
        }
        return false;
    }

//funcion que chequea  si hay usuario el la base de datos
    static private function checkUser($email, $pass) {
        
        $user = new UserSystem($email, md5($pass));
        return $user;
    }

//inicia a session
    static private function beginSession(UserSystem $user) {
        $current_time = date("Y-m-d H:i:s");
        
        if (!isset($_SESSION['login_user'])) {
            
            $_SESSION['login_user']['user'] = serialize($user);
            $_SESSION['login_user']['date'] = $current_time;
        }
    }

    static function getUserSession() {
          
        if (isset($_SESSION['login_user'])) {
            return unserialize($_SESSION['login_user']['user']);
        }
        return false;
    }

    static function isLogin() {
        if (isset($_SESSION['login_user'])) {
            return true;
        } else {
            return false;
        }
    }

    static function logout() {
        if (Login::isLogin()) {
            unset($_SESSION["login_user"]);
            session_destroy();
        }
    }

//logout despues de 15 min 
    static function desconect() {
        $time_entry = explode(' ', $_SESSION["time"]);
        $time_entry = strtotime($time_entry[1]);
        $time = time() - $time_entry;
        $time_logout = (self::typePermi() != 'G') ? 1200 : 3600;
        if ($time > $time_logout)
            Login::logout();

        //echo date("00:i:s",$time);
    }
    
    static function loginRedirect($place = "login"){
        SD::redirect($place);
    }

}

?>