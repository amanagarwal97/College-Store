<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    $items = store_list_query();
    $categories = category_list();
    $colleges = college_list();
    render ("store.php" , ["title" => "Store" , "items" => $items, "categories" => $categories, "colleges" => $colleges ] );   

?>
