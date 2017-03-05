<?php
    
    $con = mysqli_connect('localhost', 'ic_01', '3vXt73bGW7mEcGnI');
    
    //check for errors
    if (mysqli_connect_errno())
    {
        echo 'Failed to connect to database : ' . mysqli_connect_error();
    }
    if (mysqli_query($con,'USE Project_2'))
    {
        echo 'Unable to connect to database';
    }
    
    function login_query($values)
    {
        extract($values);
        $query = 'SELECT * FROM users WHERE email=' . $email;
        $result=mysqli_query($con,$query);
        if (empty($result))
        {
            return false;
        }
        else
        {
            $row=mysqli_fetch_assoc($result);
            if (password_verify($password,$row["password"]))
            {   
                $_SESSION["id"] = $row["id"];
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>