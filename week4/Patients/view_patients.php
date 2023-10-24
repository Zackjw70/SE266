



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
    <div>
        <a href="addPatients.php">Add Patient</a>
    </div>
    

    <?php
        include __DIR__ . '/models/model_patients.php';

        $pa = getPatients();



    ?>

    <table>
        <thead>
            <tr>
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