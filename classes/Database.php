<?php
    class Database{
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;
        
        public function __construct(){
            //'__construct' is used to create constructor in php 
            //defualt constructor in php
            //use '$this->' otherwise it will created other local variable
            $this->host = "localhost"; //this points to the current invoking object
            $this->username = "GauravMakhija";
            $this->password = "12345";
            $this->database = "classmanagement";
            $this->connectDB();
        } 
        
//        NOTE: PHP does not support CONSTRUCTOR OVERLOADING
//        public function __construct($host, $username, $password, $database){
//            //parameterized constructor in php
//            $this->host = $host; //this points to the current invoking object
//            $this->username = $username;
//            $this->password = $password;
//            $this->database = $database;
//        } 
        
        public function connectDB(){
            //(POP WAY)$this->connection = mysqli_connect($this->host, $this->username, $this->password);
            $this->connection = new mysqli($this->host, $this->username, $this->password);
            if(mysqli_connect_error()){
                //if the connection is not successful
                die("Connection Failed: " . mysqli_error());
                //mysqli_connect_error is used to check the error while establishing the connection and mysqli_error will print the error
            }
            
            //mysqli_select_db is used to select the database (it returb=ns the boolean value true or false)
            $db_selected = $this->connection->select_db($this->database);
            if(!$db_selected){
//                first export the classmanagement in form of sql ans save it 
//                this will help to create open source project, as if you give the project to any                         client you need to provide the tables so the query will create the database
//                $query = "CREATE DATABASE classmanagement";
//                if(mysqli_query($this->connection, $query)){
//                    echo "Database created Successfully";  
//                }
//                echo "No such database found";
            }else{
//                echo "Database Selected";
            }
//            return $this->connection;
        }
        
        public function query($sql){
            $result = $this->connection->query($sql);   
            if(!$result){
                die("Query Failed! " .$sql);
            }
            return $result;
        }
        
        public function getConnection(){
            return $this->connection;
        }
        
        public function escape_string($string){
            $escaped_string = $this->connection->real_escape_string($string);
            return $escaped_string;
        }
        
        function __destruct(){
            //'__destruct' is used to create destructor in php
        }
    }

    $database = new Database();
?>














