<?php
    require "include/connection.php";

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
            echo "Fill in the required fields";
        }
        else{
            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            

            $sql = "INSERT INTO jar(Username, email, password) 
            VALUES('$user_name', '$email', '$password')";
            $results = $in->query($sql);

            if(!$results){
                echo "There is an error in your query".mysqli_connect_error();
            }
            else{
                header("location: login.html");
            }
        }
    }
    else{
        header("location: index.html");
    }

?>