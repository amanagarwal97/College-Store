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
        if ( $items[$i]["price"] == 0 )
        {
            echo '<span class="status">On Donation</span><br>';
        }
        else 
        {
            echo '<span class="status">' .$items[$i]["price"]. '</span><br>';
        }
        echo '<form method="POST" action="delete.php">';
        echo '<button id="remove" name="delete" value=' .$items[$i]["id"]. '>Remove Item </button>';
        echo '</form>';
        echo '</div>';
    }
?>
