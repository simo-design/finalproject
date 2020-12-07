<?php
session_start(); //Start your session as the first thing on this page
 
  define("DB_SERVER", "localhost"); //Server name
  define("DB_USER", "root"); //Asmin username
  define("DB_PASS", ""); //Admin password
  define("DB_NAME", "test"); //Database
  
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  
  if(mysqli_connect_error()){ //Detects errors that occur while connecting to the database
    die("Database connection failed: ") .
    mysqli_connect_error() . 
    
    "(" . mysqli_connect_error() . ")";
  }
  
  //Successful connection
  
  $errors = array();
  $message = "";
  $username = "";
  $password = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submit"])){
      $username = trim($_POST["username"]);
      $password = trim($_POST["password"]);
      
      $required = array("username", "password");
      
      function sanitize($username, $password){
        $errors = array(); 
        if($username === ""){
          $errors["username"] = "Username cannot be blank";
          
        } else{
            if(strlen($username) < 4){
            $errors["username"] = "Username atleast 4 characters";
          }
        }
        if($password === ""){
           $errors["password"] = "Password cannot be blank";
        }else{
            if(strlen($password) < 4){
            $errors["password"] = "Password must atleast 4 characters";
          }
        }
        return $errors;
      } 
      
      $errors = sanitize($username, $password);

      if(count($errors) !== 0){
        $message .= "<ul>"; 
        foreach($errors as $field => $value){
          
          $message .= "<li>{$value}</li>";
        }
        $message .= "</ul>"; 

      }else{
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 3";
        $result = mysqli_query($connection, $query);
        $row = mysqli_num_rows($result);
        if($row === 1){
          $user = mysqli_fetch_assoc($result);
          if($user["username"] == $username && $user["password"] === $password){
            $_SESSION["user"] = $user["username"];
            header("Location: p1.html"); //pass user to home screen
          }else{
            $message = "Username and Password does not match";
          }
        }else{
          $message = "That user does not exist";
        }
      }
      
    }
  }
?>