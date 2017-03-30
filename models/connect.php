<?php

    $con = mysqli_connect('localhost','ic_01', '3vXt73bGW7mEcGnI','Project_2');
    
    //check for errors
    if (mysqli_connect_errno())
    {
        echo 'Failed to connect to database : ' . mysqli_connect_error();
    }

?>

