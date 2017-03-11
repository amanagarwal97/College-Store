<html>
    <head>
        
            <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
            <?php else: ?>
            <title>MyCollegeStore</title>
            <?php endif ?>
        
        <meta charset="utf-8">
	    <meta name="description" content="MyCollegeStore">
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
    </head>
    <body>
        <nav>
		    <a href="" class="store">MyCollegeStore</a>
		    <a href="" class="post">Submit your Product</a>
		    <a href="" class="account">Sign In</a>
	    </nav>
        <div class="top">
            <?php if(!empty($_SESSION["id"])) : ?>
            <h2>Welcome Back</h2>
            <?php endif ?>
        </div>
        <ul class="category">
    		<li><a href="">ALL</a></li>
    		<li><a href="">BOOKS</a></li>
    		<li><a href="">CLOTHING</a></li>
    		<li><a href="">ELECTRONICS</a></li>
    		<li><a href="">FURNITURE</a></li>
    		<li><a href="">SPORTS</a></li>
    		<li><a href="">VEHICLES</a></li>
    		<li><a href="">OTHERS</a></li>
	    </ul>
        <div class="mid">
    