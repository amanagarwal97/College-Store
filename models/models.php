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
    
    function sell_item($values)
    {
        require('connect.php');
        extract($values);
        $query = 'INSERT INTO items(uid,category,title,description,contact,itype,price,date,image) 
                  VALUES(' .$_SESSION["id"]. ',"' .$category. '","' .$title. '","' .$desc. '","' .$contact. '","' .$type. '",' .$price. ',' .CURRENT_TIMESTAMP. ',"' .$image. '")';
        if (mysqli_query($con,$query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function college_list()
    {
        require('connect.php');
        $query = 'SELECT * FROM colleges';
        if ($rows = mysqli_query($con,$query))
        {   
            $i = 0;
            while($row = mysqli_fetch_assoc($rows))
            {
                $college_data[$i++] = $row["cname"];
            }
            return $college_data;
        }
    }
?>
