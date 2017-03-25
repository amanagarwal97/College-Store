<?php 
    
    //item view should have image, title , description , date , price and a contact info field 
       echo '<div class="display">';
       echo '<div class="product-image"><img src="' .$item["image"]. '" alt="product-name"></img></div>';
       echo '<span class="title">' .$item["title"]. '</span><br>';
       echo '<span class="description">' .$item["desc"]. '</span><br>';
       echo '<span class="contact">' .$item["date"]. '</span><br>';
       echo '<span class="status">Price/Donate</span>';
       echo '</div>';
?>
