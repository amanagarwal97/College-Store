<div class="middle">
    <form action="register.php" method="post" class="signup-form">
        <h1>Sign Up</h1>
        <input autofocus type="Email" name="email" placeholder="E-mail Address" required>
        <input type="text" placeholder="First Name" name="fname" required>
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
        <input type="Password" name="pwd" placeholder="Password" required>
        <input type="Password" name="rpwd" placeholder="Re-type Password" required>
        <input type="radio" name="gender" value="0" class="sex"><span>M </span><input type="radio" name="gender" value="1" class="sex"><span>F</span><br><br>
        <button type="submit" name="submit">Sign Up</button>   
    </form>
</div>
<h3>Already have an account? <a href="login.php">Sign In</a></h3>

