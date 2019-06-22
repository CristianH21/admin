<?php

    $SERVERNAME = 'localhost';
    $DBUSERNAME = 'root';
    $DBPASSWORD = '';
    $DBNAME = 'ehm_admin';

    $conn = mysqli_connect($SERVERNAME, $DBUSERNAME, $DBPASSWORD, $DBNAME);

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

?>