<?php

    $username = 'ic_01';
    $password = '3vXt73bGW7mEcGnI';
    $database = 'Project_2';

    $con = mysqli_connect('localhost',$username,$password,$database);
    
    //check for errors
    if (mysqli_connect_errno())
    {
        echo 'Failed to connect to database : ' . mysqli_connect_error();
    }

?>

