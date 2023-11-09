<?php
    session_start();
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

    <?php if(isset($_SESSION['user'])): ?>
        <h4>Welcome <?= $_SESSION['user']; ?></h4>
        <a href="search.php">Search Patients</a><br>
        <a href="logout.php">Logout</a><br>
    <?php else: ?>
    <a href="login.php">Login</a><br>
    <?php endif; ?>
    <a href="addPatients.php">Add Patient</a>
    

    <?php
        include __DIR__ . '/models/model_patients.php';

        if(isset($_POST['deletePatient'])){
            $id = filter_input(INPUT_POST, 'patientId');
            deletePatient($id);
        }

        $pa = getPatients();



    ?>

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