<?php
class Session{
    public static function sessionStart(){
        if(!Session::isSessionStart()){
            session_start();
        }
    }
    public static function isSessionStart(){
        if(!isset($_SESSION['login'])){
            return true;
        }else{
            return false;
        }
    }
}
?>