<?php
    
    /*
     * Model for checking login
     */
    function login_query($values)
    {
        require('connect.php');
        extract($values);
        $query = 'SELECT * FROM users WHERE email="' .$email. '"';
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
                $_SESSION["cid"] = $row["college"];
                $_SESSION["name"] = $row["fname"];
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    
    /*
     * Model for Registering user
     */
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
    
    /*
     * Model for posting ad
     */
    function postad_query($values)
    {
        require('connect.php');
        extract($values);
        $query = 'INSERT INTO items(uid,cid,category,title,description,contact,itype,price,date,image) 
                  VALUES(' .$_SESSION["id"]. ',' .$_SESSION["cid"]. ',' .$category. ',"' .$title. '","' .$desc. '","' .$contact. '",' .$choice. ',' .$price. ',' .CURRENT_TIMESTAMP. ',"' .$image. '")';
        if (mysqli_query($con,$query))
        {
            return true;
        }
        else
        {   
            return false;
        }
    }
    
    /*
     * Model for getting college list
     */
    function college_list()
    {
        require('connect.php');
        $query = 'SELECT * FROM colleges';
        if ($rows = mysqli_query($con,$query))
        {   
            $i = 0;
            while($row = mysqli_fetch_assoc($rows))
            {
                $college_data[$i++] = [
                    "cid" => $row["cid"],
                    "cname" => $row["cname"]
                ];
            }
            
            return $college_data;
        }
    }
    
    /*
     * Model for getting category list
     */
    function category_list()
    {
        require('connect.php');
        $query = 'SELECT * FROM categories';
        if ($rows = mysqli_query($con,$query))
        {
            $i = 0;
            while ($row = mysqli_fetch_assoc($rows))
            {
                $category_data[$i++] = [
                    "id" => $row["id"],
                    "name" => $row["name"]
                ];
            }
            return $category_data;
        }
    }
    
    /*
     * Model for getting list of items in store
     */
    
    function store_list_query($offset)
    {
        require('connect.php');
        
        if (isset($_GET["category"]))
        {   
            $query = 'SELECT * FROM items WHERE category=' .$_GET["category"]. 'LIMIT 10 OFFSET '. $offset;
        }
        
        else if (isset($_GET["product"]))
        {
            $query = 'SELECT * FROM items WHERE title LIKE "%' .$_GET["product"]. '%"' . 'LIMIT 10 OFFSET '. $offset;
        }
        else if (isset($_GET["cid"]))
        {
            $query = 'SELECT * FROM items WHERE cid=' .$_GET["cid"]. 'LIMIT 10 OFFSET '. $offset;
        }
        
        else if (isset($_GET["cid"]) && isset($_GET["category"]))
        {
            $query = 'SELECT * FROM items WHERE cid=' .$_GET["cid"]. ' AND ' .'category=' .$_GET["category"]. 'LIMIT 10 OFFSET '. $offset;
        }
        else if (isset($_GET["cid"]) && isset($_GET["product"]))
        {
            $query = 'SELECT * FROM items WHERE cid=' .$_GET["cid"]. ' AND ' .'title LIKE "%'. $_GET["product"]. '%"' . 'LIMIT 10 OFFSET'. $offset;
        }
        else if (isset($_GET["category"]) && isset($_GET["product"]))
        {
            $query = 'SELECT * FROM items WHERE category=' .$_GET["category"]. ' AND ' .'title LIKE "%'. $_GET["product"]. '%"' . 'LIMIT 10 OFFSET'. $offset;
        }
        else if (isset($_GET["category"]) && isset($_GET["cid"]) && isset($_GET["product"]))
        {
            $query = 'SELECT * FROM items WHERE category=' .$_GET["category"]. ' AND ' .'cid=' .$_GET["cid"]. ' AND ' .'title LIKE "%'. $_GET["product"]. '%"' . 'LIMIT 10 OFFSET'. $offset;
        }
        else
        {
            $query = 'SELECT * FROM items LIMIT 10 OFFSET '. $offset;
        }
        
        if ($rows = mysqli_query($con,$query))
        {
            $i = 0;
            while($row = mysqli_fetch_assoc($rows))
            {
                
                $college_query = 'SELECT cname FROM colleges,items WHERE colleges.cid = items.cid AND items.uid = ' .$row["uid"];
                $college_rows = mysqli_query($con,$college_query);
                $college_row = mysqli_fetch_assoc($college_rows);
                
                $category_query = 'SELECT name FROM categories,items WHERE categories.id = items.category AND items.id = ' .$row["id"];
                $category_rows = mysqli_query($con,$category_query);
                $category_row = mysqli_fetch_assoc($category_rows);
                
                $item_list[$i++] = [
                    "id" => $row["id"],
                    "image" => $row["image"],
                    "title" => $row["title"],
                    "cname" => $college_row["cname"],
                    "date" => $row["date"],
                    "price" => $row["price"],
                    "category" => $category_row["name"]
                ]; 
            }
            
            return $item_list;
        }
        
    }
    
    /*
     * Model for getting items by each user
     */
    
    function user_item_list()
    {
        require('connect.php');
        $query = 'SELECT * FROM items WHERE uid=' . $_SESSION["id"];
        if ($rows = mysqli_query($con,$query))
        {
            $i = 0;
            while ($row = mysqli_fetch_assoc($rows))
            {
                $item_data[$i++] = [
                    "image" => $row["image"],
                    "title" => $row["title"],
                    "desc" => $row["description"],
                    "date" => $row["date"],
                    "type" => $row["itype"],
                    "price" => $row["price"]
                ];
                
             }
             
             return $item_data;
        }
    }
    
    
    function search_product()
    {
        require('connect.php');
        
        $products_list = [];
        
        $query = 'SELECT * FROM items WHERE title LIKE "%' .$_GET["product"]. '%"';
        
        if ($rows = mysqli_query($con,$query))
        {   
            $i=0;
            while ($row = mysqli_fetch_assoc($rows))
            {
                $products_list[$i++] = [
                    "title" => $row["title"],
                    "price" => $row["price"]
                  ];
            }
        }
        
        return $products_list;
     }
        

    function get_item($id)
    {
        require('connect.php');
        
        $item = [];
        
        $query = 'SELECT * FROM items WHERE id=' .$id;
        
        if ($rows = mysqli_query($con,$query))
        {
            $row = mysqli_fetch_assoc($rows);
            $item = [
                "title" => $row["title"],
                "desc" => $row["description"],
                "image" => $row["image"],
                "price" => $row["price"],
                "contact" => $row["contact"],
                "date" => $row["date"]
                ];     
        }
        
        return $item;
        
    }
    
        
        
        
        
        
        
        
        
            
    
    
?>
