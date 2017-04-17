<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    //array containing list of all items for a user
    $list = user_item_list();
    
    if (empty($list))
    {
        $message = "You don't have any items for Sale :(";
        render("dashboard_view.php",["title" => "Dashboard" , "message" => $message , "items" => $list]);
    }
    
    else
    {   
        render("dashboard_view.php",["title" => "Dashboard" ,"items" => $list]);
    }
?>
