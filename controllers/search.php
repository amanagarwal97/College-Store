<?php

    require('config.php');
    require('../models/models.php');
    
    
    
    header("Content-type: application/json");
    print(json_encode($products, JSON_PRETTY_PRINT));

?>