<?php
    require "include/connection.php";

    if(isset($_POST['submit'])){

        if(!empty($_POST['username'])){
            echo 'error';        
        }else{
            $username = $_POST['username'];
            $email = $_POST['email'];
    
            $password = hash('md5', $password);
    
            $query = "INSERT INTO jar(Username, email, password) VALUES('$username', '$email', '$password')";
            $query = mysqli_query($in, $query);
    
            if(!$query){
                die('Error'.'<br>'.mysqli_error($in));
            }
    
            // header("location: login.html");
        }
        
       
    }

    else{
        // header("location: index.html");
    }

    
?>