<?php

ini_set('display_errors' ,1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/models/model_patients.php';

function age ($bdate) {
    $date = new DateTime($bdate);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
 }

$firstName = '';
$lastName = '';
$birthdate = '';
$married = '';
$heightFt = '';
$heightIn = '';
$weight = '';

$error = 0;


if (isset($_POST['submitBtn'])){
    $error = 0;
    if (!empty($firstName = filter_input(INPUT_POST, 'firstName'))){

    
    }
    else{
        $error += 1;
        echo "<p style='color:red'>Empty first name!</p>";
    }
    if (empty($lastName = filter_input(INPUT_POST, 'lastName'))){
        echo "<p style='color:red'>Empty last name!</p>";
        $error += 1;
    }
    if (empty($married = filter_input(INPUT_POST, 'married'))){
        $error += 1;
        echo "<p style='color:red'>Please select married choice!</p>";
    }
    if ($married == 'Is married'){
        $married = 0;

    }
    else{
        $married = 1;
    }
    if (empty($birthdate = filter_input(INPUT_POST, 'birthdate'))){
        $error += 1;
        echo "<p style='color:red'>Must Enter a Birthdate!</p>";
    }
    else{
        $now = new DateTime();
        if ($birthdate >= $now){
            echo "<p style='color:red'>Must enter a past date!";
            $error += 1;
        }
        $age = age($birthdate);
        if ($age > 120){
            $error += 1;
            echo "<p style='color:red'>Invalid Birthdate!</p>";
        }
    }
    if (empty($heightFt = filter_input(INPUT_POST, 'heightFt', FILTER_VALIDATE_INT))){
        $error += 1;
        echo "<p style='color:red'>Must enter height FT</p>";

    }
    else{
        if ($heightFt < 0){
            $error += 1;
            echo "<p style='color:red'>Feet to small!</p>";
        }
        elseif ($heightFt > 8){
            $error += 1;
            echo "<p style='color:red'>Feet to large!</p>";
        }
    }
    if (empty($heightIn = filter_input(INPUT_POST, 'heightIn', FILTER_VALIDATE_INT))){
        $error += 1;
        echo "<p style='color:red'>Must enter height IN</p>";

    }
    else{
        if ($heightIn < 0){
            $error += 1;
            echo "<p style='color:red'>Inches to small!</p>";
        }
        elseif ($heightIn > 12){
            $error += 1;
            echo "<p style='color:red'>Inches to large!</p>";
        }
    }
    if (empty($weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT))){
        $error += 1;
        echo "<p style='color:red'>Must enter Weight!</p>";

    }
    else{
        if ($weight < 0){
            $error += 1;
            echo "<p style='color:red'>Weight to small!</p>";
        }
        elseif ($weight > 500){
            $error += 1;
            echo "<p style='color:red'>Weight to large!</p>";
        }
    }


    if ($error == 0){
        $heightFinal = $heightFt * 12 + $heightIn;

        // $bmi = bmi($heightFt, $heightIn, $weight);
        // $desc = bmides($bmi);
        addPatient ($firstName, $lastName, $married, $birthdate, $age, $heightFinal, $weight);
        echo "<h2>Patient Added: </h2>";
        echo "<p>Name: ", $firstName , " " , $lastName, "</p>";
        echo "<p>Marital Status: ", $married ;
        echo "<p>Birthdate: ",$birthdate, " Age: ", $age,  "</p>";
        echo "<p>Height: ", $heightFt , "Ft ", $heightIn, "In" ;
        echo "<p>Weight: ", $weight ;

    }
    
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Intake</title>
</head>
<body>
    <h1>Patient Intake</h1>
    <h3>Please enter your information</h3>


    <form method="post" name='checkForm'>
        <div>
            <label for="firstName">First Name: </label>
            <input type="text" name='firstName' value="<?php echo $firstName?>">
        </div>
        <div>
            <label for="lastName">Last Name: </label>
            <input type="text" name='lastName'value="<?php echo $lastName?>">
        </div>
        <div>
            <label for="married">Married: </label>
            <input type="radio" id="ismarried" name='married' value='Is married' <?= $married==0?"checked":""; ?>>
            <label for="ismarried">Yes</label>
            <input type="radio" id="nomarried" name='married' value='Not married'<?= $married==1?"checked":""; ?>>
            <label for="nomarried">No</label>
        </div>
        <div>
            <label for="birthdate">Birthdate: </label>
            <input type="date" name="birthdate" value="<?php echo $birthdate?>">
        </div>
        <div>
            <label for="heightFt">Height:   Feet:</label>
            <input type="text" name='heightFt'value="<?php echo $heightFt?>">
            <label for="heightFt">Inches: </label>
            <input type="text" name='heightIn'value="<?php echo $heightIn?>">
        </div>
        <div>
            <label for="weight">Weight: </label>
            <input type="text" name='weight'value="<?php echo $weight?>">
        </div>
        <div>
            <input type="submit" name='submitBtn'>
        </div>

    </form>
    <br><br>
    <a href="./view_patients.php">Return</a>
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