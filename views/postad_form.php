<form action="postad.php" method="post" enctype="multipart/form-data">
    <select name="category">
    <option value="0" selected disabled>Select Category</option>
    <?php
          
          for ($i=0 ; $i<sizeof($categories) ; $i++)
          {
                echo '<option value=' .$categories[$i]["id"]. '>' .$categories[$i]["name"]. '</option>' ;
          }
    ?>
    </select><br>
    <input type="text" name="title" placeholder="Item Title (Min. length 4 char)"><br>
    <textarea type="text" name="desc" placeholder="Item description (Max. length 200 char)"></textarea><br>
    <textarea type="text" name="contact" placeholder="Contact info (Min. length 4 char)"></textarea><br>
    <input type="radio" name="choice" value="0">I want to Donate
    <input type="radio" name="choice" value="1">I want to Sell<br>
    <input type="text" name="price" placeholder="Your Price (In Rs.)"><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
    Upload Image: <input class="upload-img" type="file" name="image"><br></div>
    <button type="submit">Submit</button>
</form>