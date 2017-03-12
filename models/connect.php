<?php

    $con = mysqli_connect('localhost', 'jharvard', 'crimson','Project_2');
    
    //check for errors
    if (mysqli_connect_errno())
    {
        echo 'Failed to connect to database : ' . mysqli_connect_error();
    }

?>

