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

    function updatePatient ($id, $fName, $lName, $married, $age, $bDay, $height, $weight) {
        global $db;

        $birthdate = new DateTimeImmutable($bDay);
        $results = "";

        
        $sql = "UPDATE patients SET fName = :fN, lName = :lN, married = :m, birthDate = :bD, height = :h, pWeight = :w, age = :a WHERE id=:id";
        $stmt = $db->prepare($sql);
        $binds = array(
            ":fN" => $fName,
            ":lN" => $lName,
            ":m" => $married,
            ":bD" => $birthdate->format('Y-m-d'),
            ":h" => $height,
            ":w" => $weight,
            ":a" => $age,
            ":id" => $id

        );

        

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Patient Updated';
        }

        return ($results);
    }
    function deletePatient ($id) {
        global $db;

        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        $stmt->bindValue(':id', $id);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

    function getPatient ($id){
        global $db;

        $results = [];
        $stmt = $db->prepare("SELECT * FROM patients WHERE id=:id");
        $stmt->bindValue(':id', $id);

        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return ($results);
    }


?>