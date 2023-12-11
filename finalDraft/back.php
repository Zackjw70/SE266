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
                <h3>

                </h3>
            </div>
        </div>
        <div class="row">
            <br><br>
            
            

        </div>
        <div class="row">
            <h4  style="margin-left:15%"><a href="game.php" >Add a new Game</a></h4>
            <h2 style="margin-left:16%">Current Games</h2>
        </div>
        <div class="row" style="justify-content:right;margin-right:20px">
            <input type="text" name="searchGames" style="margin-right:20px">
            <label for="searchGames">Search</label>
        </div>
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
                <tr>
                    <td><a href="Edit">Edit</a></td>
                    <td>1</td>
                    <td style="width:200px">Fortnite</td>
                    <td>$149.99</td>
                    <td>12-3-2021</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="Edit">Edit</a></td>
                    <td>2</td>
                    <td style="width:200px">Rocket League</td>
                    <td>$189.99</td>
                    <td>12-4-2021</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="Edit">Edit</a></td>
                    <td>3</td>
                    <td style="width:200px">Valorant</td>
                    <td>$324.99</td>
                    <td>12-5-2021</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="Edit">Edit</a></td>
                    <td>4</td>
                    <td style="width:200px">Call of duty: Warzone</td>
                    <td>$120.99</td>
                    <td>12-8-2021</td>
                    <td><a href="Delete">Delete</a></td>
                </tr>
                <tr>
                    <td><a href="Edit">Edit</a></td>
                    <td>5</td>
                    <td style="width:200px">Stardew Valley</td>
                    <td>$212.99</td>
                    <td>12-31-2021</td>
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