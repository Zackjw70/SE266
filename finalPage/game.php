<?php
    session_start();

    if(isset($_SESSION['perm']) && $_SESSION['perm'] == 'Staff' || isset($_SESSION['perm']) && $_SESSION['perm'] == 'Admin'){

    }else{
        header('Location: restricted.php');
    }
    include __DIR__ . '/model/modelGames.php';
    $error = 0;
    

    


    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'gameId');

        if($action == "Edit"){
            $ga = getGame($id);
            $id = $ga['gameId'];
            $gameName = $ga['gameName'];
            $desc = $ga['description'];
            $cost = $ga['cost'];
            $releaseDate = $ga['officialReleaseDate'];
            $imgUrl = $ga['gameImgPath'];
        }
        else{
            $gameName = '';
            $desc = '';
            $cost = '';
            $releaseDate = '';
        }

    
        
        if (isset($_POST['Edit'])){
            $action = filter_input(INPUT_GET, 'action');
            if (!empty($gameName = filter_input(INPUT_POST, 'gName'))){
                
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Empty game name!</p>";
    
            }
            if (!empty($desc = filter_input(INPUT_POST, 'gDesc'))){
    
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Empty description!</p>";
            }
            if(!empty($cost = filter_input(INPUT_POST, 'gCost', FILTER_VALIDATE_FLOAT))){
    
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Invalid Cost</p>";
            }
            $releaseDate = filter_input(INPUT_POST, 'gRelease');
            if (!empty($imgUrl = filter_input(INPUT_POST, 'editImgHolder'))){ 
                
            }
            else{
                $imgUrl = 'imgs/noimage.png';
            }
            if (isset($_FILES['gImg'])){
                $tmp_name = $_FILES['gImg']['tmp_name'];
        
                $path = getcwd() .DIRECTORY_SEPARATOR . 'imgs';
        
                $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['gImg']['name'];
        
                move_uploaded_file($tmp_name, $new_name);

                $new_name = str_replace(['C:\xampp\htdocs\SE266\finalPage\\'],'',$new_name);
                

                if ($_FILES['gImg']['name'] != ''){
                    $imgUrl = $new_name;
                }

               

                
            }
            $now = new DateTime();
    
            if ($error == 0){
                updateGame($id, $gameName, $desc, $cost, $releaseDate, $imgUrl);
                header('Location: back.php');
            }
    
            
    
        }elseif (isset($_POST['Add'])){
            $action = filter_input(INPUT_GET, 'action');
            if (!empty($gameName = filter_input(INPUT_POST, 'gName'))){
                
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Empty game name!</p>";
    
            }
            if (!empty($desc = filter_input(INPUT_POST, 'gDesc'))){
    
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Empty description!</p>";
            }
            if(!empty($cost = filter_input(INPUT_POST, 'gCost', FILTER_VALIDATE_FLOAT))){
    
            }
            else{
                $error += 1;
                echo "<p style='color:red'>Invalid Cost</p>";
            }
            if (!empty($imgUrl = filter_input(INPUT_POST, 'editImgHolder'))){ 
                
            }
            else{
                $imgUrl = 'imgs/noimage.png';
            }
            if (isset($_FILES['gImg'])){
                $tmp_name = $_FILES['gImg']['tmp_name'];
        
                $path = getcwd() .DIRECTORY_SEPARATOR . 'imgs';
        
                $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['gImg']['name'];
        
                move_uploaded_file($tmp_name, $new_name);
                if ($new_name == '')
                {

                }
                else{
                    $imgUrl = $new_name;
        
                    $imgUrl = str_replace(['C:\xampp\htdocs\SE266\finalPage\\'],'',$imgUrl);
                }
                
            }
            $releaseDate = filter_input(INPUT_POST, 'gRelease');
            $now = new DateTime();
            $now = $now->format('Y-m-d');

    
            if ($error == 0){
                addGame($gameName, $desc, $cost, $releaseDate, $imgUrl, $now);
                header('Location: back.php');
            }
    
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$action ?> Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylesheets/back.css">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 login">
                <h3><a href="back.php" class="btn-lg">Return to Games</a></h3>
            </div>
            <div class="col-sm-5">
                <h1 style="margin-left:5%">
                    <?= $action ?> Game
                </h1>
            </div>
            <div class="col-sm-2">
                <h3>

                </h3>
            </div>
        </div>
        <form method="post" style="margin-left:5%" name="<?=$action?>_game" enctype="multipart/form-data">
            <div class="row" style="width:100%;padding-bottom:50px;padding-top:25px">
                <label for="gName" class="gLabel" style="width:10%">Name: </label>
                <input type="text" name="gName" class="gInput" style="width:20%;margin-left:2%" value="<?php echo $gameName?>">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gDesc" class="gLabel" style="width:10%">Description: </label>
                <input type="textbox" name="gDesc" class="gInput" style="width:20%;margin-left:2%" value="<?php echo $desc?>">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gCost" class="gLabel" style="width:10%">Price: </label>
                <input type="text" name="gCost" class="gInput" style="width:20%;margin-left:2%" value="<?php echo $cost?>">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gRelease" class="gLabel" style="width:10%">Release Date: </label>
                <input type="date" name="gRelease" class="gInput" style="width:20%;margin-left:2%" value="<?php echo $releaseDate?>">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px" class="img">
                <label for="gImg" class="gLabel" style="width:10%">Upload Img: </label>
                <input type="file" name="gImg" class="gInput" style="width:20%;margin-left:2%" value="<?= $imgUrl ?>">
                <input type="hidden" name="editImgHolder" value="<?= $imgUrl ?>">
            </div>
            <div class="row">
                <br>
                <br>
            </div>
            <div class="row">
                <input type="submit" value="<?=$action?> Game" name="<?=$action?>">
            </div>
            
        </form>

    </div>

    
    <div>
        <br><br><br>
    </div>

    
    <footer class="mt-auto" style="bottom:50%">
        &copy; Free 99 | Zachary Wyeth
    </footer>
</body>
</html>