<div>
<h1 color="black" style="margin-top : 100px;">
    Welcome , <?php echo $_SESSION["name"] ; ?> </h1>
    </div>

<?php 
    
    //dashboard should have image, title , description , date , price and a remove item field
    $size = sizeof($items)/4;
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
            
            echo '<form method="POST" action="delete.php">';
            echo '<button id="remove" name="delete" value=' .$items[$i]["id"]. '>Remove Item</button>';
            echo '</form>';
            echo '</div></div>';
         }
            
            echo '</div>';
     }
?>
