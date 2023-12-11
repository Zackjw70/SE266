<?php
    session_start();
?>
<?php if(isset($_SESSION['perm']) && $_SESSION['perm'] == 'Admin'):?>

<?php else: ?>

    <?php header('Location: restricted.php');?>
<?php endif; ?>
<?php
include __DIR__ . '/model/modelGames.php';

    if(isset($_POST['deleteUser'])){
        $id = filter_input(INPUT_POST, 'username');
        deleteUser($id);
    }

    if (isset($_POST['searchUp'])){
        $users = filter_input(INPUT_POST, 'searchUsers');
    }else{
        $users = '';
    }

    $ua = searchUsers($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                    Admin
                </h1>
            </div>
            <div class="col-sm-2">
                <h3>
                    <a href="back.php">Staff</a>
                </h3>
            </div>
        </div>
        <div class="row">
            <br><br>
        </div>

        <div class="row">
            <h4  style="margin-left:15%"><a href="user.php">Add a new User</a></h4>
            <h2 style="margin-left:20%">Users</h2>
        </div>
        <div class="row" style="justify-content:right">
        <form method="post">
            <input type="text" name="searchUsers" style="margin-right:20px" value="<?=$users;?>">
            <input type="submit" name="searchUp" value="Search">
        </form>
            
        </div>
        <table class="table" style="margin-bottom:0px">
            <thead>
                <tr class=" ">
                    <th>
                        
                    </th>
                    <th style="margin-left:20px">
                        Username
                    </th>
                    <th style="margin-left:px">
                        Priveledge
                    </th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($ua as $u): ?>
                    
                <tr class=" ">
                <?php if ($u['username'] == $_SESSION['user']): ?>
                        <td></td>
                        <td><?=$u['username'];?></td>
                        <td><?=$u['priveldge'];?></td>
                        <?php else:?>
                            <td></td>
                            <td><?=$u['username'];?></td>
                            <td><?=$u['priveldge'];?></td>
                            <td> <form action="admin.php" method="post">
                                <input type="submit" name="deleteUser" value="Delete">
                            </form></td>
                           
                            
                    <?php endif ?>
                <?php endforeach ?>
                </tr>


            </tbody>
        </table>

    </div>
    
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
</body>
</html>