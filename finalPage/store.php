<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free 99 | Store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>


    <?php
        include __DIR__ . '/model/modelGames.php';

        if (isset($_POST['search'])){
            $gName = filter_input(INPUT_POST, 'gameName');
        }else{
            $gName = '';
        }

        $games = searchGames($gName);

        
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
            <br><br>
        </div>
        <div class="row">
            <h2 style="margin-left:auto;margin-right:auto;">Store</h2>
        </div>
        <div>
            <br><br>
            <form method="POST" name='search_games'>
                <input type="text" style="margin-left:20%;width:50%" name="gameName" value="<?=$gName; ?>">
                <input type="submit" name="search" value="Search">
            </form>
            <br>
            <br><br><br>
        </div>
        <?php foreach($games as $g): ?>

            <div class="row">
                <a href="view.php?gameId=<?= $g['gameId']; ?>" style="height:100px;width:200px;margin-left:15%;"><img src="<?= $g['gameImgPath']; ?>" style="height:100px;width:200px;margin-left:15%;"></a>
                &nbsp;
                <h5 class="storetext" style="padding-left:25px;margin-top:50px;">$<?= $g['cost']; ?></h5>&nbsp;
                <h5 class="storetext" style="padding-left:50px;margin-top:50px; width:400px"><?= $g['gameName'];?></h5>
                <div class="col-lg-5">
                    <p style="padding-left:25px;margin-top:25px;height:113px"><?= $g['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    <footer style="bottom:auto" class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
    
</body>
</html>