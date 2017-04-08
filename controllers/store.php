<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    $items = store_list_query();
    $categories = category_list();
    $colleges = college_list();
    if (isset($_GET["sid"]))
    {   
        $message = 'This seller has put only '. sizeof($items) . ' items on sale.';
        render("store_view.php" , ["title" => "Store : Seller Items " , "message" => $message , "items" => $items , "categories" => $categories, "colleges" => $colleges ] );
    }
    else
    {
        render ("store_view.php" , ["title" => "Store" , "items" => $items, "categories" => $categories, "colleges" => $colleges ] );   
    }
?>
