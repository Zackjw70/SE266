<?php
    ini_set('display_errors' ,1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/models/model_teams.php';

    $teamname = "";
    $division = "";

    if (isset($_POST['storeTeam'])){
        $teamname = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');
        addTeam ($teamname, $division);


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
        <div>
            <div>
                <label>Team Name:</label>
            </div>
            <div>
                <input type="text" name="team_name" value="<?= $teamname; ?>">
            </div>
            <div>
                <label>Division:</label>
            </div>
            <div>
                <input type="text" name="division" value="<?= $division; ?>">
            </div>
            <div>
                <input type="submit" name="storeTeam" value="Save New Team Information">
            </div>
        </div>
    </form>


    <?php
        if (isset($_POST['storeTeam'])):
    ?>
        <h2>
            Team Was Added!!!
        </h2>

        <ul>
            <li><?php echo "Team Name: $teamname"?></li>
            <li><?php echo "Division: $division"?></li>
        </ul>
    <?php
        endif;
    ?>

    <div>
        <a href="view_teams.php">Return</a>
    </div>
</body>
</html>