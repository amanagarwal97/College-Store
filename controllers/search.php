<?php
    
    //configuration
    require('config.php');
    require('../models/models.php');
    
    //array containing list of the products matching the search query
    $products = search_product();
    
    header("Content-type: application/json");
    print(json_encode($products, JSON_PRETTY_PRINT));

?>
