<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    $item = get_item($_GET["item"]);
    render ('item_view.php',["title" => "Item" , "item" => $item ]);
    
?> 