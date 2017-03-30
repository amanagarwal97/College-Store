<div class="middle">
<form action="postad.php" method="post" enctype="multipart/form-data" class="postad-form">
    <h1>PostAd</h1>
    <select name="category">
        <option value="0" selected disabled>Select Category</option>
        <?php
            for ($i=0 ; $i<sizeof($categories) ; $i++)
            {
                echo '<option value=' .$categories[$i]["id"]. '>' .$categories[$i]["name"]. '</option>' ;
            }
        ?>
    </select>
        <input type="text" name="title" placeholder="Item Title (Min. length 4 char)" required>
        <textarea type="text" name="desc" placeholder="Item description (Max. length 200 char)" required></textarea>
        <textarea type="text" name="contact" placeholder="Contact info (Min. length 4 char)" required></textarea>
        <input type="radio" name="choice" value="0" class="sell"><span>Donate</span>
        <input type="radio" name="choice" value="1" class="sell"><span>Sell</span><br><br>
        <input type="text" name="price" placeholder="Your Price (In Rs.)">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
        <label for="image">Upload Image:</label> 
        <input class="upload-img" type="file" name="image">
        <button type="submit">Submit</button>
</form>
</div>
