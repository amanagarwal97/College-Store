<table style='
        border: 2px solid wheat;'>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Date</th>
            <th>Remove</th>
        </tr>
        <?php
            for ($i=0 ; $i < sizeof($items) ; $i++)
            {   print('<tr>');
                print('<td><img width=100px height=50px src="' .$items[$i]["image"]. '"></td>');
                print('<td>' .$items[$i]["title"]. '</td>');
                print('<td>' .$items[$i]["desc"]. '</td>');
                if ($items[$i]["price"] != 0)
                    print('<td>' .$items[$i]["price"]. '</td>');
                else
                    print('<td>On donation</td>');
                print('<td>' .$items[$i]["date"]. '</td>');
                print('</tr>');
            }
        ?>
</table>
            
        
