<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        
        <li>
            <strong>Name: </strong><?= $task['title']; ?>
        </li>
        
        <li>
            <strong>Due Date: </strong><?= $task['due']; ?>
        </li>
        
        <li>
            <strong>Person Responsible: </strong><?= $task['assigned_to']; ?>
        </li>

        <li>
            
            <strong>Accepted: </strong><?= $task['started'] ? 'Accepted' : 'Not Yet Accepted'; ?>

        </li>
        <li>
            <strong>Status</strong>
            <?php if ($task['completed']) : ?>
                <span class="icon">&#9989;</span>
            <?php else : ?>
                <span class="icon">Incomplete</span>
            <?php endif; ?>
        </li>
        
    </ul>
    <!--End of foreach statements-->
    <!--End of program-->
    
</body>
</html>