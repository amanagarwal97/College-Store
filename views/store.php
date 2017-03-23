    <form class="product-search" >
        <input type="text" name="product" placeholder="Search for Products" id="js-product"/>
        <button type="submit">Search</button><br/>
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
