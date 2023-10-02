<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        
        <?php foreach ($task as $p => $val) : //start of foreach statements?>
            
            <li><strong><?= $p; ?></strong><?= $val; ?></li>
        <?php endforeach; ?>
    </ul>
    <!--End of foreach statements-->
    <!--End of program-->
    
</body>
</html>