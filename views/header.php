<html>
    <head>
        
            <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?></title>
            <?php else: ?>
            <title>MyCollegeStore</title>
            <?php endif ?>
        
        
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
    </head>
    <body>
        <div class="top">
            <?php if(!empty($_SESSION["id"])) : ?>
            <h2>Welcome Back</h2>
            <?php endif ?>
        </div>
        <div class="mid">
    