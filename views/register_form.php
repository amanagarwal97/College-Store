<form action="register.php" method="post">
    <input autofocus type="email" name="email" placeholder="E-mail Address" />
    <input type="text" placeholder="First Name" name="fname" />
    <select name="cid">
        <option value='0' selected disabled>Select College</option>
		<option value=0>All</option>
        <?php
            for ($i=1 ; $i<=sizeof($colleges) ; $i++)
            {
                echo '<option value=' .$i. '>' .$colleges[$i-1]. '</option>' ;
            }
        ?>
    </select>
    <input type="password" name="pwd" placeholder="Password"><br>
    <input type="password" name="rpwd" placeholder="Re-type Password"><br>
    <input type="radio" name="gender" value="0">M<input type="radio" name="sex" value="1">F<br>
<button type="submit" name="submit">Register</button>   
</form>
