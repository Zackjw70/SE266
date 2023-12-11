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

        $games = getGamesHome();
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
        </div>
        <div class="row">
            <br>
            <br>
        </div>
        <div class="row">
            <h2 style="margin-left:auto;margin-right:auto;">New Releases!!!</h2>
        </div>
        <div class="row">
            <br>
            <br>
        </div>

        <div class="row" style="margin-left:7%">
        <?php foreach($games as $newGames): ?>
            
           <div class="col-lg-4">
                <a href="view.php?gameId=<?= $newGames['gameId']; ?>"><img src="<?= $newGames['gameImgPath']; ?>" class="img-thumbnail" style="width: 350px;height:200px;"></a>
                <p></p>
                <h6><?= $newGames['gameName'];?></h6>
                <h6>$<?= $newGames['cost']; ?></h6>
            </div>
       
        <?php endforeach; ?>
        </div>


        <div class="row">
            <br><br><br><br><br>
        </div>
        <div class="row">
            <h2 style="margin-left:auto;margin-right:auto;">News and Quotes!!!</h2>
        </div>
        <div class="row" style="margin-left:5%; height:250px">
            <div class="col-lg-4 news">
                <p>Plans on many new games to be joining us here on Free 99 very soon. We are always open to requests on new games for us to add.</p>
            </div>
            <div class="col-lg-4 news">
                <p>We're eventually planning to bring on mobile games that will be playable on both mobile and on pc.</p>
            </div>
            <div class="col-lg-4 news">
                <p>Would you rather have unlimited bacon but no more games, or games unlimited games and no games?</p>
            </div>
        </div>

    </div>
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
    
</body>
</html>