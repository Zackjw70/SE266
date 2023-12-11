<?php
    session_start();

    if(isset($_SESSION['perm']) && $_SESSION['perm'] == 'Staff' || isset($_SESSION['perm']) && $_SESSION['perm'] == 'Admin'){

    }else{
        header('Location: restricted.php');
    }
    include __DIR__ . '/model/modelGames.php';

    if(isset($_POST['deleteGame'])){
        $id = filter_input(INPUT_POST, 'gameId');
        deleteGame($id);
    }

    if (isset($_POST['searchGames'])){
        $gName = filter_input(INPUT_POST, 'searchames');
    }else{
        $gName = '';
    }

    $ga = searchGames($gName);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheets/back.css">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 login">
                <h3><a href="home.php" class="btn-lg">Return to Front</a></h3>
            </div>
            <div class="col-sm-5">
                <h1 style="margin-left:5%">
                    Backend
                </h1>
            </div>
            <div class="col-sm-2">
            <?php if(isset($_SESSION['perm']) && $_SESSION['perm'] == 'Admin'): ?>
                <h3>
                    <a href="admin.php">Admin</a>
                </h3>
                <?php endif; ?>
                
            </div>
        </div>
        <div class="row">
            <br><br>
            
            

        </div>
        <div class="row">
            <h4  style="margin-left:15%"><a href="game.php?action=Add" >Add a new Game</a></h4>
            <h2 style="margin-left:16%">Current Games</h2>
        </div>
        <form method="post" style="justify-content:right;margin-right:20px">
            <input type="text" name="searchames" style="margin-right:20px" value="<?=$gName; ?>">
            <input type="submit" name="searchGames" value="Search">
        </form>
        <table class="table" style="margin-bottom:0px">
            <thead>
                <tr>
                    <th>
                        
                    </th>
                    <th style="margin-left:20px">
                        Id
                    </th>
                    <th>
                        Game Name
                    </th>
                    <th style="margin-left:100px">
                        Cost
                    </th>
                    <th>
                        Upload Date
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ga as $g): ?>
                <tr>
                    <td><a href="game.php?action=Edit&gameId=<?= $g['gameId']; ?>">Edit</a></td>
                    <td><?= $g['gameId']; ?></td>
                    <td style="width:200px"><?= $g['gameName']; ?></td>
                    <td><?="$" . $g['cost']; ?></td>
                    <td><?= $g['uploadDate']; ?></td>
                    <td>
                        <form action="back.php" method='post'>
                            <input type="hidden" name="gameId" value="<?= $g['gameId']; ?>">
                            <input type="submit" name="deleteGame" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>

    
</body>
</html>