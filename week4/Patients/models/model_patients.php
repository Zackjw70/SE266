<?php

    include ( __DIR__ . '/db.php');

    function getPatients(){
        global $db;

        $results=[];

        $stmt = $db->prepare("SELECT id, fName, lName, birthDate, age, height, pWeight FROM patients ORDER BY lName");

        if ($stmt->execute()&& $stmt->rowCount() > 0 ){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($results);
    }

    function addPatient ($fName, $lName, $married, $bDay, $age, $height, $weight) {
        global $db;
        $results = [];

        $sql = "INSERT INTO patients set fName = :fN, lName = :lN, married = :m, birthDate = :bD, age = :a, height = :h, pWeight = :w";
        $stmt = $db->prepare($sql);
        $binds = array(
            ":fN" => $fName,
            ":lN" => $lName,
            ":m" => $married,
            ":bD" => $bDay,
            ":a" => $age,
            ":h" => $height,
            ":w" => $weight

        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = "Data Added";
        }

        return ($results);
    }

?>