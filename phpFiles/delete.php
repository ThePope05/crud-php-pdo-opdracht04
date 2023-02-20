<?php

include("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch(PDOException $e){
    echo $e->getMessage();
}

$sql = "DELETE FROM nailShop WHERE Id = :ID";

$statement = $pdo->prepare($sql);

$statement->bindValue(":ID", $_GET["id"]);

$statement->execute();

if($statement){
    echo "Record is verwijderd";
    header('Refresh:3; url=../index.php');
}
else{
    echo "Record is niet verwijderd";
    header('Refresh:3; url=../index.php');
}