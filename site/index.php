<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zachary Wyeth's Site</h1>

    <!--LINK TO GITHUB: https://github.com/Zackjw70/SE266/blob/main/site/index.php-->
    <h2>Weekly Assignments</h2>
    <ul>
        <li><a href="../week1/1G">Week 1</a></li>
        <li><a href="../week2">Week 2</a></li>
        <li><a href="../week3/atm/atm_starter.php">Week 3</a></li>
        <li><a href="">Week 4</a></li>
        <li><a href="">Week 5</a></li>
        <li><a href="">Week 6</a></li>
        <li><a href="">Week 7</a></li>
        <li><a href="">Week 8</a></li>
        <li><a href="">Week 9</a></li>
        <li><a href="">Week 10</a></li>
    </ul>
    <?php $file = basename($_SERVER['PHP_SELF']);
        $mod_date=date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date ";
        ?>
</body>
</html>