<?php
    
    require('config.php');
    require('../models/models.php');
    
    if ($_SERVER["REQUEST_METHOD"] == 'GET')
    {   
        $colleges = college_list();
        render('register_form.php' , ["title" => "Register" , "colleges" => $colleges]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        if (empty($_POST["email"]) || empty($_POST["fname"]) || empty($_POST["pwd"]) || empty($_POST["rpwd"]))
            echo 'Please fill all details';
        else if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
            echo 'Invalid Email address';
        else if ($_POST["cid"] == 0)
            echo 'No college selected';
        else if (!isset($_POST["gender"]))
            echo "No gender selected" ;
        else if ($_POST["pwd"] != $_POST["rpwd"])
            echo "passwords do not match";
        else
        {   
            $details = [
                "fname" => $_POST["fname"],
                "email" => $_POST["email"],
                "password" => $_POST["pwd"],
                "cid" => $_POST["cid"],
                ];
            if ($_POST["gender"] == 0)
                $details["gender"] = 'M';
            else
                $details["gender"] = 'F';
            
            if (register_query($details))
                echo "Registration Success";
            else
                echo "Unable to Register"; 
        }    
    }
?>
