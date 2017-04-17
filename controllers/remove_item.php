<?php

    //configuration
    require('config.php');
    require_once('../models/models.php');
    
    //if user submits the reuqest via POST i.e. remove button is pressed
    if ($_SERVER["REQUEST_METHOD"] == 'POST' )
    {
        $status = remove_item($_POST["delete"]);
        if ($status == true)
        {
            render('delete_status.php' , ["title" => "Delete Item : Success" , "status" => "Success"]);
        }
        else
        {
            render('delete_status.php' , ["title" => "Delete Item : Failed" , "status" => "Failed"]);
        }
    }
    
?>
