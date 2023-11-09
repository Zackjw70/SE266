<?php
session_start();

if (!isset($_SESSION['user'])){
    header('Location: restricted.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Patients: </h1>
    </div>
    <a href="view_patients.php">View All Patients</a>

    <?php
        include __DIR__ . '/models/model_patients.php';


        if (isset($_POST['search'])){
            $fName = filter_input(INPUT_POST, 'fName');
            $lName = filter_input(INPUT_POST, 'lName');
            $age = filter_input(INPUT_POST, 'age');
        }else{
            $fName = '';
            $lName = '';
            $age = '';
        }
        
        
        $pa = searchPatients($fName,$lName,$age);


    ?>

    <form method="POST" name='search_patients'>
        <div>
            <div>
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="fName" value="<?=$fName; ?>">
            </div>
            <div>
                <label>Last Name:</label>
            </div>
            <div>
            <input type="text" name="lName" value="<?=$lName; ?>">
            </div>
            <div>
                <label>Age:</label>
            </div>
            <div>
                <input type="text" name="age" value="<?=$age; ?>">
            </div>
            <div>
                <input type="submit" name="search" value="Search">
            </div>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <td>

                </td>
                <th>ID</th>
                <th>First Name </th>
                <th>Last Name</th>
                <th>Birth Date</th>
                <th>Age </th>
                <th>Height </th>
                <th>Weight</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pa as $p): ?>
                <tr>
                    <td>
                        <form action="view_patients.php" method='post'>
                            <input type="hidden" name="patientId" value="<?= $p['id'];?>">
                            <input class='' type="submit" name="deletePatient" value="Delete">
                        </form>
                    </td>
                    <td>
                        <?= $p['id']; ?>
                    </td>
                    <td>
                        <?= $p['fName']; ?>
                    </td>
                    <td>
                        <?= $p['lName']; ?> 
                    </td>
                    <td>
                        <?= $p['birthDate']; ?>
                    </td>
                    <td>
                        <?= $p['age']; ?>
                    </td>
                    <td>
                        <?= $p['height']; ?>
                    </td>
                    <td>
                        <?= $p['pWeight']; ?>
                    </td>
                    <td>
                        <a href="edit_patient.php?action=Update&patientId=<?= $p['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
    
</body>
</html>
<?php
    echo "<br>";
    echo "<br>";
    echo "<br>";
     $file = basename($_SERVER['PHP_SELF']);
    $mod_date=date("F d Y h:i:s A", filemtime($file));
    echo "File last updated $mod_date ";
?>