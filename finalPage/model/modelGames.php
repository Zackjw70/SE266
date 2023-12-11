<?php

    include ( __DIR__ . '/db.php');

    function getGamesHome(){
        global $db;

        $results=[];

        $stmt = $db->prepare("SELECT * FROM games ORDER BY uploadDate DESC limit 3;");

        if ($stmt->execute()&& $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        return ($results);
    }
    function getAllGames(){
        global $db;

        $results = [];

        $stmt = $db->prepare("SELECT * FROM games ORDER BY uploadDate DESC;");

        if ($stmt->execute()&& $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($results);
    }
    function login($user, $pass){
        global $db;

        $results=[];
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :user AND password = sha1(:pass)");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass);

        if ($stmt->execute()&& $stmt->rowCount() > 0)
            {$results = $stmt->fetch(PDO::FETCH_ASSOC);
            
        }
        return ($results);
    }
    function searchGames ($name){
        global $db;
        $binds = array();


        $sql = "SELECT * FROM games";

        if ($name != ""){
            $sql .= " WHERE gameName LIKE :gN";
            $binds['gN'] = '%'.$name.'%'; 
        }
        
        $sql .= " ORDER BY uploadDate DESC;";

        
        

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return($results);


    }
    function deleteGame($id) {
        global $db;

        $results = "Game was NOT deleted";

        $stmt = $db->prepare("DELETE FROM games WHERE gameId=:id");
        $stmt->bindValue(':id', $id);

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return($results);
    }

    function getGame($id){
        global $db;
        $results = [];
        $stmt = $db->prepare("SELECT * FROM games WHERE gameId=:id");
        $stmt->bindValue(':id', $id);


        if ($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return ($results);
    }
    function addGame ($gameName, $desc, $cost, $releaseDate ,$imgUrl, $now){
        global $db;
        $results = [];

        $sql = "INSERT INTO games set gameName = :gN, description = :d, gameImgPath = :gP, cost = :c, officialReleaseDate = :oRD, uploadDate = :uD";
        $stmt = $db->prepare($sql);
        $binds = array(
            ":gN" => $gameName,
            ":d" => $desc,
            ":gP" => $imgUrl,
            ":c" => $cost,
            ":oRD" => $releaseDate,
            ":uD" => $now
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = "Data Added";

        }

        return ($results);
    }
    function updateGame ($id, $gameName, $desc, $cost, $releaseDate ,$imgUrl){
        global $db;
        $results = "";

        $sql = "UPDATE games set gameName = :gN, description = :d, gameImgPath = :gP, cost = :c, officialReleaseDate = :oRD WHERE gameId = :iD";
        $stmt = $db->prepare($sql);
        $binds = array(
            ":gN" => $gameName,
            ":d" => $desc,
            ":gP" => $imgUrl,
            ":c" => $cost,
            ":oRD" => $releaseDate,
            ":iD" => $id
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = "Data Added";

        }

        return ($results);
    }
    function searchUsers ($name){
        global $db;
        $binds = array();


        $sql = "SELECT * FROM users WHERE 0 = 0";

        if ($name != ""){
            $sql .= " AND username LIKE :gN";
            $binds['gN'] = '%'.$name.'%'; 
        }
        
        
        $sql .= " ORDER BY priveldge;";
        

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return($results);


    }
    function deleteUser($id) {
        global $db;

        $results = "User was NOT deleted";

        $stmt = $db->prepare("DELETE FROM users WHERE username=:id");
        $stmt->bindValue(':id', $id);

        if($stmt->execute() && $stmt->rowCount() > 0){
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return($results);
    }
    function addUser($uName, $uPass, $perm){
        global $db;
        $results = [];

        $sql = "INSERT INTO users SET username = :u, password = :p, priveldge = :perm";
        $stmt = $db->prepare($sql);
        $binds = array(
            ":u" => $uName,
            ":p" => $uPass,
            ":perm" => $perm
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0){
            $results = "Data Added";

        }
        return($results);
        
    }