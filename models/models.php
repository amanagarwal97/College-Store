<?php
    
    
    function login_query($values)
    {
        require('connect.php');
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
    
    function register_query($values)
    {
        require('connect.php');
        extract($values);
        $query = 'INSERT INTO users(name,email,password,college,gender) VALUES';
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $query = $query . '("' . $fname . '","' . $email . '","' . $password_hash . '",' . $cid . ',"' . $gender . '")';
        if (mysqli_query($con,$query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>