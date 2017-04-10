<?php 
    
    if (isset($message))
    {
        echo '<p class="message-text">' .$message. '</p>';
    }
    $size = sizeof($items)/4;
    //Store to have image,title,price,college,category,date and a view item field
    for ($i = 0; $i <= intval($size) ; $i++)
    {    
        echo '<div class="row">';
         if ($i == intval($size))
            $count = sizeof($items)%4 + 4*$i;
         else 
            $count = ($i+1)*4;
         for ($j = $i*4 ; $j < $count ; $j++)
         {
            echo '<div class="item"><div class="product-card"><a href="items.php?item=' .$items[$j]["id"]. '"><img src="' .$items[$j]["image"]. '" alt="Item Image" ></a></div>';
            echo '<div class="product-info">';
            echo '<h5>' .$items[$j]["title"]. '</h5>';
            if ( $items[$j]["price"] == 0 )
            {
                echo '<span>On Donation</span>';
            }
            else 
            {
                echo '<span>&#8377;' .$items[$j]["price"]. '</span>';
            }
            echo '</div></div>';
         }
            
            echo '</div>';
     }
?>