    <form class="product-search" >
        <input type="text" name="product" placeholder="Search for Products" id="js-product"/>
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
        <button type="submit" id="search-button"><img src="img/search.png"></button>
    </form>
  
<?php 
    
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
            echo '<span>' .$items[$j]["cname"]. '</span><br>';
            echo '<span>' .$items[$j]["category"]. '</span><br>';
            echo '<span>' .$items[$j]["date"]. '</span><br>';
            if ( $items[$j]["price"] == 0 )
            {
                echo '<span>On Donation</span>';
            }
            else 
            {
                echo '<span>' .$items[$j]["price"]. '</span>';
            }
            echo '</div></div>';
         }
            
            echo '</div>';
     }
?>
