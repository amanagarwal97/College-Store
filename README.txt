# College Store

An online marketplace for selling and buying products for college students.

### Installing the site :
 - Install Apache.
 - Install MySQL.
 - Run your apache server with College-Store/public as root folder.
 - Run Mysql server.



### Configuring the database :
- Make a new database with any name and use PHPmyadmin interface to run the sql code in Project_1.sql.
- In models folder make a file named connect.php and include the following code :
```
<?php

    $username = 'your_mysql_username';
    $password = 'your_mysql_password';
    $database = 'your_database_name';

    $con = mysqli_connect('localhost',$username,$password,$database);
    
    //check for errors
    if (mysqli_connect_errno())
    {
        echo 'Failed to connect to database : ' . mysqli_connect_error();
    }

?>
```

### Adding college data :
- Add data of different colleges so that student can select their college.
- Run :
```
./import path/to/college_data.txt
```
- You can add more colleges to college_data.txt by editing the text file.

### Folder details :
Site is based on MVC Architecture
- bin : contains script to fetch data of colleges from text file and add to database.
- controllers : conatins all the controllers that selects which views to render based on users requests.
- models : contains all the database interactions like insertion,select statements and deletion.
- public : conatins all the files publicly accessible to user.
- views : contains HTML and basic design of the site that gets rendered through controllers.

                

