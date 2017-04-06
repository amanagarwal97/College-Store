<?php
    
    //configuration
    require('config.php');
    require_once('../models/models.php');
    
    if ($_SERVER["REQUEST_METHOD"] == 'GET')
    {
        render('login_form.php' , ["title" => "Login"]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        if (empty($_POST["email"]))
        {
            apologise("Please enter an e-mail address");
        }
        else if (empty($_POST["password"]))
        {
            apologise("Please enter the password");
        }
        else
        {
            $details = [
                "email" => $_POST["email"] ,
                "password" => $_POST["password"]
                ];
            if(login_query($details))
            {
                redirect ('index.php');
            }
            else
            {
                echo 'Incorrect e-mail or password';
            }
        }
    }
