<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
  
    if (isset($_GET["category"]))
    {
        $item_list = list_by_category($_GET["category"]);
    }
    else if (isset($_GET["cid"]))
    {
        $item_list = list_by_college($_GET["cid"]);
    }
    else if (isset($_GET["cid"]) && isset($_GET["category"]))
    {
        $item_list = list_by_search($_GET["cid"],$_GET["category"]);
    }
    
    $categories = category_list();
    $colleges = college_list();
    render("store.php" , ["title" => "Store" , "items" => $item_list , "categories" => $categories , "colleges" => $colleges ]);
?>
