<?php
    
    //configuration
    require('config.php');
    require_once('../models/models.php');
    
    //if user requests page via GET render postad form
    if ($_SERVER["REQUEST_METHOD"] == 'GET')
    {
        $categories = category_list();
        render('postad_form.php' , ["title" => "PostAd" , "categories" => $categories]);
    }
    
    //if user requests page via POST i.e. submits the form then check the info
    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {   
        if (empty($_POST["title"]) || empty($_POST["desc"]) || empty($_POST["contact"]) || (!isset($_POST["choice"])))
            apologise('Please fill all details.');
        else if ($_POST["category"] == 0)
            apologise('Select a valid category.');
        else if ($_POST["choice"] == 0 && !empty($_POST["price"]))
            apologise('Invalid Price');
        else if ($_POST["choice"] == 1 && (preg_match('/[\D]/',$_POST["price"]) || $_POST["price"] == 0))
            apologise('Please enter a valid price.');
        else if (strlen($_POST["title"]) < 4)
            apologise('Min. title length is 4 characters.');
        else if (strlen($_POST["desc"]) > 200 )
            apologise('Description length exceeded.');
        else if (strlen($_POST["contact"]) < 4)
            apologise('Min. contact length is 4 characters.');        
        
        $img_path = '';
        
        //Uploading the image if any
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
                    chmod ($img_path , 0711);
                    
                }
                do 
                {   
                    $img_path .= "/" .img_name(). '.' .$ext;
                
                }while(file_exists($img_path));
                  
                if (!move_uploaded_file($_FILES["image"]["tmp_name"],$img_path))
                    echo "Image could not be uploaded";
                else
                    chmod($img_path, 0644 );
            }
        }
        else
        {
            $img_path = "/img/default.png";
        }
        
        //if choice is Donate price must be zero
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
        
        //passing all the details to the model to store details
        if (postad_query($details))
        {
            render ('postad_status.php',["title" => "Post Ad : Success" ,"status" => "Success"]);
        }
        else
        {
            render ('postad_status.php' , ["title" => "Post Ad : Failed" , "status" => "Fail"]);
        }

    }
    
?>
