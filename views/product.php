    <?php 
    
    //item view should have image, title , description , date , price and a contact info field 
       echo '<div class="product"><div class="image">';
       echo '<img src="' .$item["image"]. '" alt="product-image"><h2><span>On Sell</span></h2></div><main>';
       echo '<span class="catego">' .$item["category"]. '</span>';
       echo '<h2>' .$item["title"]. '</h2>';
       echo '<span class="price">&#8377;'.$item["price"]. '</span>';
       echo '<div class="descriptionp"><div class="descriptionh"><span><span>Description</span></span></div><div>';
       echo '<div id="descrip" class="descriptionn"><span>' .$item["desc"]. '</span><br>';
       echo '<div class="seller"><div class="sellerh"><span><span>Seller</span></span></div><div>';
       echo '<div id="sellerName" class="sellern"><a href="store.php?sid=' .$item["uid"]. '"><span>Other Items</span></a></div></div></div></main>';
       echo '</div>';
?>
