<?php
    header("Access-Control-Allow-Origin: *");

    // Connect to database using credentials and return connection object
    function getConnectionInfo(){
        try {
            define('DBCONNECTION', 'mysql:host=remotemysql.com;dbname=KVZUJXHBYs');
            define('DBUSER', 'KVZUJXHBYs');
            define('DBPASS', 'gRXlKs1dZf');

            $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
        } catch(PDOException $e){
            die($e->getMessage());
        }

        return $pdo;
    }

    // Get all maps stored in the database
    function getAllMaps($pdo){
        $sql = 'SELECT name FROM maps';
        return $pdo->query($sql);
    }

    // Get image path of the requested map
    function getImagePathWithIndex($pdo, $index){
        $sql = 'SELECT imagepath FROM maps WHERE id=' . $index;
        return $pdo->query($sql);
    }

    // Get name of requested map
    function getMapNameWithIndex($pdo, $index){
        $sql = 'SELECT name FROM maps WHERE id=' . $index;
        return $pdo->query($sql);
    }

    // Get allcoordinates of the map
    function getAllCoordsForMap($pdo, $map_name){
        $sql = 'SELECT mappedx, mappedy FROM ' . $map_name;
        return $pdo->query($sql);
    }


?>