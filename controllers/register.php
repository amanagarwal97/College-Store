<?php
    
    require('config.php');
    require('../models/models.php');
    
    //if user requests page via GET render the register form
    if ($_SERVER["REQUEST_METHOD"] == 'GET')
    {   
        $colleges = college_list();
        render('register_form.php' , ["title" => "Register" , "colleges" => $colleges]);
    }
    
    //if user requests page via POST i.e. form is submitted check the details submitte
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
            
            //Passing all the details to the model to store it in database
            if (register_query($details))
                render ('register_status.php',["title" => "Registration Successful", "status" => "Success" ]);
            else
                render ('register_status.php',["title" => "Registration Failed", "status" => "Failed" ]);
        }    
    }
?>
