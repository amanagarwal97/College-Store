<?php

    require_once('config.php');
    
    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    
    /**
     * Logs out current user if any
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }
    
    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     */ 
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    
    /**
     * Shows an error message when something goes wrong.
     */
    function apologise($message)
    {
        render('apology.php' , [ "message" => $message ] );
    }
     
     
    /**
     * Checks the uploaded image for size and format
     */
    function check_file($_file_name,$imagetype)
    {
        $uploaded = true;
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) 
            {
                $uploaded = true;
            } 
            else 
            {
                $uploaded = false;
            }
        }

        // Check file size
        if ($_FILES["image"]["size"] > 30000000) 
        {
            apologise("Sorry, your file is too large.");
            $uploaded = false;
        }

        // Allow certain file formats
        if($imagetype != "jpg" && $imagetype != "png" && $imagetype != "jpeg") 
        {
            apologise("Sorry, only JPG, JPEG, PNG files are allowed.");
            $uploaded = false;
        }
        
        return $uploaded;

    }
    
    /**
     * Gives each image a unique name to store in the server
     */
    
    function img_name() 
    {
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

?>
