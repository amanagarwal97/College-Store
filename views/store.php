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
    </form>
    
    <div class="row">
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Tecknet M268 Raptor Black Wired Optical Mouse Gaming Mouse  (USB, Black, Blue)</h5>
				<span>&#8377;789</span>
			</div>
		</div>
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Name</h5>
				<span>&#8377;789</span>
			</div>
		</div>
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Name</h5>
				<span>On Donation</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Tecknet M268 Raptor Black Wired Optical Mouse Gaming Mouse  (USB, Black, Blue)</h5>
				<span>&#8377;789</span>
			</div>
		</div>
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Name</h5>
				<span>&#8377;789</span>
			</div>
		</div>
		<div class="item">
			<div class="product-card">
				<a href="">
					<img src="img/default.jpg" alt="image">
				</a>
			</div>
			<div class="product-info">
				<h5>Name</h5>
				<span>On Donation</span>
			</div>
		</div>
	</div>
    
<?php 
    
    //Store to have image,title,price,college,category,date and a view item field
    for ($i = 0; $i < sizeof($items) ; $i++)
    {   
        echo '<div class="display">';
        echo '<div class="product-image"><img src="' .$items[$i]["image"]. '" alt="product-name"></img></div>';
        echo '<span class="title">' .$items[$i]["title"]. '</span><br>';
        echo '<span class="college">' .$items[$i]["cname"]. '</span><br>';
        echo '<span class="category">' .$items[$i]["category"]. '</span><br>';
        echo '<span class="date">' .$items[$i]["date"]. '</span><br>';
        if ( $items[$i]["price"] == 0 )
        {
            echo '<span class="status">On Donation</span><br>';
        }
        else 
        {
            echo '<span class="status">' .$items[$i]["price"]. '</span><br>';
        }
        echo '</div>';
        echo '<a href="items.php?item=' .$items[$i]["id"]. '">View Item</a>';
    }
?>
