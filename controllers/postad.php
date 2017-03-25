<?php
    
    //configuration
    require('config.php');
    require_once('../models/models.php');
    
    if ($_SERVER["REQUEST_METHOD"] == 'GET')
    {
        $categories = category_list();
        render('postad_form.php' , ["title" => "PostAd" , "categories" => $categories]);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        if (empty($_POST["title"]) || empty($_POST["desc"]) || empty($_POST["contact"]) || (!isset($_POST["choice"])))
            echo "Please fill all details";
        else if ($_POST["category"] == 0)
            echo "Select a category";
        else if ($_POST["choice"] == 0 && isset($_POST["price"]))
            echo "Invalid Price";
        else if (preg_match('/[.]/',$_POST["price"]) || $_POST["price"] == 0)
            echo "Please enter a valid price";
        
        $img_path = '';
        if (file_exists($_FILES["image"]["tmp_name"]) || is_uploaded_file($_FILES["image"]["tmp_name"]))
        {
            $file_name = basename($_FILES["image"]["name"]);
            $ext = pathinfo($file_name,PATHINFO_EXTENSION);
            if(check_file($file_name,$ext))
            {
                $img_path = 'img/' .$_SESSION["cid"];
                //Upload the file
                if (!file_exists($img_path))
                {
                    mkdir ($img_path);
                }
                do 
                {   
                    $img_path .= "/" .img_name(). '.' .$ext;
                
                }while(file_exists($img_path));
                  
                if (!move_uploaded_file($_FILES["image"]["tmp_name"],$img_path))
                    echo "Image could not be uploaded";
            }
        }
        else
        {
            $img_path = "/img/default.jpg";
        }
        
        if ($_POST["choice"] == 0)
        {
            $price = 0;
        }
        else
        {
            $price = $_POST["price"];
        }
        
        $details = [
            "title" => $_POST["title"],
            "category" => $_POST["category"],
            "desc" => $_POST["desc"],
            "contact" => $_POST["contact"],
            "price" => $price,
            "choice" => $_POST["choice"],
            "image" => $img_path
          ];
        
        if (@postad_query($details))
        {
            render ('postad_success.php',["title" => "Ad posted successfully"]);
        }
        else
            echo 'unable to postad';

    }
    
?>
