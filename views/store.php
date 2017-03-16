        <ul class="category">
        	<?php
          
                for ($i=0 ; $i<sizeof($categories) ; $i++)
                {   
                    echo '<li>' ;
                    echo '<a href="store.php?category=' .$categories[$i]["id"]. '">' .$categories[$i]["name"]. '</a>' ;
                    echo '</li>' ;
                }
            ?>
        </ul>
        <form action="store.php" type = "post">
        <select name="cid">
            <option value='0' selected disabled>Select College</option>
            <option value=0>All</option>
            <?php
                for ($i=0 ; $i<sizeof($colleges) ; $i++)
                {
                    echo '<option value=' .$colleges[$i]["cid"]. '>' .$colleges[$i]["cname"]. '</option>' ;
                }
            ?>
        </select>
        <button type="submit">Submit</button>
        </form>
        <table style='
        border: 2px solid wheat;'>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th>College</th>
            <th>Category</th>
            <th>Date</th>
            <th>Contact Seller</th>
        </tr>
        <?php 
            
            for ($i=0 ; $i < sizeof($items) ; $i++)
            {   print('<tr>');
                print('<td><img width=100px height=50px src="' .$items[$i]["image"]. '"></td>');
                print('<td>' .$items[$i]["title"]. '</td>');
                if ($items[$i]["price"] != 0)
                    print('<td>' .$items[$i]["price"]. '</td>');
                else
                    print('<td>On donation</td>');
                print('<td>' .$items[$i]["cname"]. '</td>');
                print('<td>' .$items[$i]["category"]. '</td>');
                print('<td>' .$items[$i]["date"]. '</td>');
                print('</tr>');
            }
         ?>
