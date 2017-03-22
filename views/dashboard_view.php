    <form class="product-search">
        <input type="text" name="product" placeholder="Search for Products" id="js-product"/>
        <button type="submit">Search</button><br/>
    </form>
    
<?php for ($j = 0; $j < 10; $j++) {?>
    <div class="display">
        <div class="product-image"><img src="img/default.jpg" alt="product-name"></img></div>
        <span class="title">Sunglasses</span><br>
        <span class="description">Description</span><br>
        <span class="contact">Contact Info</span><br>
        <span class="status">Price/Donate</span>
    </div>
<?php } ?>
        
