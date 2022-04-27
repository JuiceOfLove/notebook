<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<?php
    require 'menu.php';
?>
<body>
    <main>
        <?php
            if(!isset($_GET['p'])) $_GET['p'] = 'view';
            if($_GET['p'] == 'view') include 'viewer.php';
            else if(file_exists($_GET['p'].'.php')) include $_GET['p']. '.php';

        ?>
    </main>
</body>
</html>