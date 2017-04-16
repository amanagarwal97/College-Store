<div class="middle">
    <form action="register.php" method="post" class="signup-form">
        <h1>Register</h1>
        <span id="emailcheck">Invalid Email</span>
        <input autofocus type="Email" name="email" placeholder="E-mail Address" id="email" required>
        <span id="namecheck">Invalid Name</span>
        <input type="text" placeholder="First Name" name="fname" id="fname" required>
        <select name="cid" required>
            <option value='' selected disabled>Select College</option>
            <?php
                for ($i=0 ; $i<sizeof($colleges) ; $i++)
                {
                    echo '<option value=' .$colleges[$i]["cid"]. '>' .$colleges[$i]["cname"]. '</option>' ;
                }
            ?>
        </select>
        <input type="Password" name="pwd" placeholder="Password" id="password" required>
        <input type="Password" name="rpwd" placeholder="Re-type Password" id="re_password" required>
        <input type="radio" name="gender" value="0" class="sex" required><span class="male">M </span><input type="radio" name="gender" value="1" class="sex"><span class="female">F</span><br>
        <button type="submit" name="submit" id="js-button">Sign Up</button>   
    </form>
</div>
<h3>Already have an account? <a href="login.php">Sign In</a></h3>

