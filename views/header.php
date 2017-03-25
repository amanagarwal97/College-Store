<html>
    <head>
        
            <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
            <?php else: ?>
            <title>MyCollegeStore</title>
            <?php endif ?>
        
        <meta charset="utf-8">
	    <meta name="description" content="MyCollegeStore">
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	    <script type="text/javascript" src="js/typeahead.jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/underscore-min.js"></script>
        
    </head>
    <body>
        <nav>
		    <a href="index.php" class="store">MyCollegeStore</a>
		    <a href="postad.php" class="post">Submit your Product</a>
		    <?php 
		        if(empty($_SESSION["id"]))
                    echo '<a href="login.php" class="account">Sign In</a>';
                else
                {   
                    echo '<a href="dashboard.php" class="dashboard">Dashboard</a>';
                    echo '<a href="logout.php" class="account">Sign Out</a>';
                }
            ?>
	    </nav>
