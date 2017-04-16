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
            apologise('Please Fill all the details');
        else if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
            apologise('Invalid Email address');
        else if ($_POST["cid"] == 0)
            apologise('No college selected');
        else if (!isset($_POST["gender"]))
            apologise("No gender selected") ;
        else if ($_POST["pwd"] != $_POST["rpwd"])
            apologise("Passwords do not match");
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
                render ('register_status.php',["title" => "Registration Successful", "status" => "Success" ]);
            else
                render ('register_status.php',["title" => "Registration Failed", "status" => "Failed" ]);
        }    
    }
?>
