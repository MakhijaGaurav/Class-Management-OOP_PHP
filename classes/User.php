<?php
include_once("database.php");
include_once("Functions.php");
include_once("Session.php");
class User{
    private $connection;
    public function __construct(){
            global $database;
            $this->connection = $database->getConnection();
         //this will show that the connection is established here also or not
            Session::sessionStart();
    }
    
    /************************************************************************
    * The below function is used to log in the user
    * It automatically assigns session attributes
    * It is the responsibility of the CALLEE to start the session
    * Returns true if credentials were correct otherwise false.
    ************************************************************************/
    public function processLogin($email, $password){
        /*$query = "SELECT * FROM members WHERE member_email = ?";
        $select_user = mysqli_query($this->connection, $query);
        while($row = mysqli_fetch_Assoc($select_user)){
            extract($row); //It will get all the data from the row
        }*/
        
        $query = "SELECT * FROM members WHERE member_email = ?";
        $preparedStatement = $this->connection->prepare($query);
        
        $preparedStatement->bind_param("s", $email); 
        //the '?' in the query is given value in $preparedStatement by using a finction 'bind_param' which takes the datatype of the value of '?' and tit willl be passed to '$email'
        
        $preparedStatement->execute(); //to execute the preparedStatement and return a table
        $preparedStatement->store_result(); //php 7 method (it will copy the data from the table so if you want to use 'num_row' you need this function)
        
        $count = $preparedStatement->num_rows;
    
        if($count == 1){
            $preparedStatement->bind_result($id, $member_name, $memeber_email, $member_password, $member_role, $created_at, $updated_at);
        
            $preparedStatement->fetch();
            
            if($password === $member_password){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['member_name'] = $member_name;
                $_SESSION['member_id'] = $id;
                $_SESSION['member_role'] = $member_role;
                return true;    
            }else{
                return false;
            } 
        }
    }
    public function get_session(){
        return $_SESSION['login'];
    }
    public function user_logout(){
        $_SESSION['login'] = false;
        $_SESSION['member_role'] = null;
        $_SESSION['member_id'] = null;
        $_SESSION['member_name'] = null;
        session_destroy();
    }
    
    public static function checkActiveSession(){
        if(!Session::isSessionStart()){
            Functions::redirect("login.php");
            //die("<p>You are not logged in Please login from  <a href='login.php'>here</a></p>");
        }
    }
    
}
?>












