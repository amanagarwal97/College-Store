<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    $list = user_item_list();
    render("dashboard_view.php",["title" => "Dashboard" , "items" => $list]);
    
?>
