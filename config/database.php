<?php

    session_start();

    define('SITEURL','http://localhost/food-order/');
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //check connection
    if(mysqli_connect_errno()){
        printf("Connect Failed: %s\n",mysqli_connect_error());
        exit();
    }

    // echo 'Connected Successfully to mySQL. <BR>';

    //Select a database to work with
    $conn->select_db("food-order");

    ?>
