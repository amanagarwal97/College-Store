    <form class="product-search" >
        <input type="text" name="product" placeholder="Search for Products" class="store-in" id="js-product"/>
        <select name="cid" class="college">
            <option value='0' selected disabled>Select College</option>
            <option value=0>All</option>
            <?php
                for ($i=0 ; $i<sizeof($colleges) ; $i++)
                {
                    echo '<option value=' .$colleges[$i]["cid"]. '>' .$colleges[$i]["cname"]. '</option>' ;
                }
            ?>
        </select>
        <select name="category" class="categor">
            <option value="0" selected disabled>Select Category</option>
            <?php
                for ($i=0 ; $i<sizeof($categories) ; $i++)
                {
                    echo '<option value=' .$categories[$i]["id"]. '>' .$categories[$i]["name"]. '</option>' ;
                }
            ?>
        </select>
        <input type="image" src="img/search.png" alt="Submit form" class="glass">
    </form>
  
<?php 
    
    if (isset($message))
    {
        echo '<p class="message-text">' .$message. '</p>';
    }
    
    $size = sizeof($items)/4;
    
    //To show only 4 products per row 
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
