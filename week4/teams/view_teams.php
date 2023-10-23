



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>NFL TEAMS</h1>
    </div>
    <div>
        <a href="addteam.php">Add Team</a>
    </div>
    

    <?php
        include __DIR__ . '/models/model_teams.php';

        $teams = getTeams();



    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>Division</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $t): ?>
                <tr>
                    <td>
                        <?= $t['id']; ?>
                    </td>
                    <td>
                        <?= $t['teamname']; ?>
                    </td>
                    <td>
                        <?= $t['division']; ?>
                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
    
</body>
</html>