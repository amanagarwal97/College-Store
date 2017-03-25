    <form class="product-search">
        <input type="text" name="product" placeholder="Search for Products" id="js-product"/>
        <button type="submit">Search</button><br/>
    </form>
    
<?php 
    
    //dashboard should have image, title , description , date , price and a remove item field
    for ($i = 0; $i < sizeof($items) ; $i++)
    {   
        echo '<div class="display">';
        echo '<div class="product-image"><img src="' .$items[$i]["image"]. '" alt="product-name"></img></div>';
        echo '<span class="title">' .$items[$i]["title"]. '</span><br>';
        echo '<span class="description">' .$items[$i]["desc"]. '</span><br>';
        echo '<span class="contact">' .$items[$i]["date"]. '</span><br>';
        echo '<span class="status">Price/Donate</span>';
        echo '</div>';
    }
?>
