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
                <h3><a href="back.php" class="btn-lg">Return to Games</a></h3>
            </div>
            <div class="col-sm-5">
                <h1 style="margin-left:5%">
                    New Game
                </h1>
            </div>
            <div class="col-sm-2">
                <h3>

                </h3>
            </div>
        </div>
        <form action="POST" style="margin-left:5%">
            <div class="row" style="width:100%;padding-bottom:50px;padding-top:25px">
                <label for="gName" class="gLabel" style="width:10%">Name: </label>
                <input type="text" name="gName" class="gInput" style="width:20%;margin-left:2%">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gDesc" class="gLabel" style="width:10%">Description: </label>
                <input type="textbox" name="gDesc" class="gInput" style="width:20%;margin-left:2%">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gCost" class="gLabel" style="width:10%">Price: </label>
                <input type="text" name="gCost" class="gInput" style="width:20%;margin-left:2%">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gRelease" class="gLabel" style="width:10%">Release Date: </label>
                <input type="date" name="gRelease" class="gInput" style="width:20%;margin-left:2%">
            </div>
            <div class="row" style="width:100%;padding-bottom:50px">
                <label for="gImg" class="gLabel" style="width:10%">Upload Img: </label>
                <input type="file" name="gImg" class="gInput" style="width:20%;margin-left:2%">
            </div>
            <div class="row">
                <br>
                <br>
            </div>
            <div class="row">
                <input type="submit" text="Submit">
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