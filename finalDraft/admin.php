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
                    Admin
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
            <h4  style="margin-left:15%"><a href="user.php">Add a new User</a></h4>
            <h2 style="margin-left:20%">Users</h2>
        </div>
        <div class="row" style="justify-content:right">
            <input type="text" name="searchGames" style="margin-right:20px">
            <label for="searchGames" style="margin-right:20px">Search</label>
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
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>Zackjw70</td>
                    <td>Admin</td>
                </tr>
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>DRose</td>
                    <td>Staff</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>JSmith</td>
                    <td>Staff</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>Man1</td>
                    <td>User</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>Yady</td>
                    <td>User</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr class=" ">
                    <td><a href="Edit">Edit</a></td>
                    <td>Jemmy</td>
                    <td>User</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>


            </tbody>
        </table>

    </div>
    
    <footer class="mt-auto">
        &copy; Free 99 | Zachary Wyeth
    </footer>
</body>
</html>