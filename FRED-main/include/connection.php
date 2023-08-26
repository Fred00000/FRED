<?php
    $in = mysqli_connect("localhost", 'root', '', 'Gamers');

    if (!$in) {
        die("Connection lost") . mysqli_connect_error();
    }
?>