<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free 99 | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>



    <?php
        include __DIR__ . '/model/modelGames.php';

        if($id = filter_input(INPUT_GET, 'gameId')){
            $ga = getGame($id);
            $gameName = $ga['gameName'];
            $desc = $ga['description'];
            $cost = $ga['cost'];
            $releaseDate = $ga['officialReleaseDate'];
            $imgUrl = $ga['gameImgPath'];
            $uploadDate = $ga['uploadDate'];



        }
        else{
            header('Location: home.php');
        }


        
    ?>



    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 login">
                <?php if(isset($_SESSION['user'])): ?>
                    <h3><?= $_SESSION['user']; ?></h3>
                    <h3><a href="logout.php" class="btn-lg">Logout</a></h3>
                <?php else: ?>
                <h3><a href="login.php" class="btn-lg">Login</a></h3>
                <?php endif; ?>
            </div>
            <div class="col-sm-3">

            </div>
            <div class="col-sm-3">
                <h1 style="margin-left:5%">
                    Free 99
                </h1>
            </div>
            <div class="col-sm-4">
                <h3>
                    <?php if(isset($_SESSION['perm'])):?>
                        <?php if($_SESSION['perm'] == 'Staff'):?>
                            <a href="back.php">Back</a>
                            &nbsp;
                        <?php elseif($_SESSION['perm'] == 'Admin'): ?>
                            <a href="back.php">Staff</a>
                            &nbsp;
                            <a href="admin.php">Admin</a>
                            &nbsp;
                            <?php endif; ?>
                    <?php endif; ?>
                    <a href="home.php">Home</a>
                    &nbsp;
                    <a href="store.php">Store</a>
                </h3>
            </div>
            <div class="row" style="width:100%">
                <br><br><br>
                <img src="<?= $imgUrl; ?>" style="width:50%;height:calc(width/: 1.75em);margin-left:25%">
                
            </div>
            <div class="row" style="width:100%">
                <h3 style="margin-left:26%;width:20%"><?= $gameName ?></h3>
                <br>
                <h2 style="margin-left:20%">$<?= $cost ?></h2>

            </div>
            <div class="row">
                <br><br><br><br>
            </div>
            <div class="row" style="width:100%">
            <br>
                <h2 style="margin-left:26%; text-align:center; width:50%;height:20%">
                    <?= $desc ?>
                </h2>
            </div>
            <div class="row">
                <br><br><br><br>
            </div>
            <div class="row" style="width:100%">
            
                <h2 style="margin-left:27%">
                    Release: <?= $releaseDate ?>
                </h2>
                <h2 style="margin-left:6%">
                    Upload: <?= $uploadDate ?>
                </h2>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
</body>