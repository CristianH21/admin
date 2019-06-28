<?php

    $SERVERNAME = 'localhost';
    $DBUSERNAME = 'root';
    $DBPASSWORD = '';
    $DBNAME = 'ehm_admin';

    $conn = mysqli_connect($SERVERNAME, $DBUSERNAME, $DBPASSWORD, $DBNAME);

    mysqli_set_charset($conn, 'utf8'); //linea a colocar

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }

?>