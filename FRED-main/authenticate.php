<?php

    require 'include/connection.php';

    if (isset($_POST["login"])){
        $username = $_POST['username'];

        // Using prepared statement to prevent SQL injection
        $stmt = $in->prepare("SELECT * FROM jar WHERE Username = ?");
        $stmt->bind_param("s", $username); // "s" indicates a string parameter
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
        // User exists, retrieve and verify the hashed password
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['password']; // Replace 'password' with your actual column name
        $enteredPassword = $_POST['password']; // User's entered password
        

        if (password_verify($enteredPassword, $storedHashedPassword)) {
            // Passwords match, user is authenticated
            header("location: games.html");
        } else {
            // Passwords do not match, show error message
            echo "Incorrect password.";
        }
        } 
        else {
            // User does not exist
            echo "User not found.";
        }

        $stmt->close();
        $in->close();
    }
?>