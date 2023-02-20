<?php

include("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch(PDOException $e){
    echo $e->getMessage();
}

$sql = "UPDATE nailShop SET 
    eMail = :eMail,
    pNumb = :pNumb,
    aDate = :aDate,
    oDate = CURRENT_TIMESTAMP,
    treatments = :treatments,
    colors = :colors
    WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(":Id", $_POST["id"]);
$statement->bindValue(":eMail", $_POST["email"]);
$statement->bindValue(":pNumb", $_POST["pnumb"]);
$statement->bindValue(":aDate", $_POST["adate"]);

$selectedTreatments = "";
$allTreatments = "nailbiting, royalmanicure, nailrepare";


foreach($_POST as $item){
    if(str_contains($allTreatments, $item)){
        $selectedTreatments = $selectedTreatments . $item . ", ";
    }
}

$selectedTreatments = rtrim($selectedTreatments, ", ");
$statement->bindValue(":treatments", $selectedTreatments);

$selectedColors = "";

foreach($_POST as $item){
    if(str_contains($item, "#")){
        $selectedColors = $selectedColors . $item . ",";
    }
}
$selectedColors = rtrim($selectedColors, ",");
$statement->bindValue(":colors", $selectedColors);

$statement->execute();

if($statement){
    echo "Record is veranderd";
    header('Refresh:3; url=../index.php');
}
else{
    echo "Record is niet veranderd";
    header('Refresh:3; url=../index.php');
}