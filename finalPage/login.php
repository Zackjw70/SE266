<?php
include __DIR__ . '/model/modelGames.php';

if (isset($_POST['login'])){
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $user = login($username, $password);

    if(count($user) >0)
    {
        session_start();
        $_SESSION['user']=$username;
        $_SESSION['perm']=$user['priveldge'];

        header('Location: home.php');
    }else{
        session_unset();
    }

}else{
    $username = '';
    $password = '';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Free 99 | Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1 login">
            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-5">
                <h1 style="margin-left:5%">
                    Free 99
                </h1>
            </div>
            <div class="col-sm-2">
                <h3>

                </h3>
            </div>
        </div>
        <div class="row">
            <br><br>
        </div>
        <div class="row">
            <h2 style="margin-left:auto;margin-right:auto;">Login</h2>
        </div>
        <div class="row">
            <br><br>
        </div>
        <form method="POST" style="margin-left:25%" name="form_login">
            <div class="row">
                <h3>Username: </h3>
                <input type="text" name="username" style="margin-left:5%;width:500px">
            </div>
            <div class="row">
                <br><br><br>
            </div>
            <div class="row">
                <h3>Password: </h3>
                <input type="password" name="password" style="margin-left:5%;width:500px">
            </div>
            <div class="row">
                <br><br>
            </div>
            <div class="row">
                <input type="submit" name="login" value="login" style="margin-left:30%;width:100px;">
            </div>
        </form>

    </div>
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
    
</body>
</html>