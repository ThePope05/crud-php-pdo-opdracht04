<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    include("phpFiles/read.php");

    $allInfo = retInfo();

    foreach($allInfo as $info){
        if($info->Id == $_GET['id']){
            $itemInfo = $info;
            break;
        }
    }
?>
<fieldset>
        <legend><h1>Change your Appointment</h1></legend>
        <form action="phpFiles/update.php" method="post">

            <input type="hidden" name="id" value="<?php echo $itemInfo->Id;?>">

            <h3>Enter your email</h3>
            <input type="email" name="email" value="<?php echo $itemInfo->eMail ?>">

            <h3>Enter your phone number</h3>
            <input type="tel" name="pnumb" value="<?php echo $itemInfo->pNumb ?>">

            <h3>Appointment date</h3>
            <input type="datetime" name="adate" value="<?php echo $itemInfo->aDate ?>">

            <h3>Choose your treatements</h3>
            <input type="checkbox" name="treatment1" id="treatment1" value="nailbiting"
            <?php 
                if(str_contains($itemInfo->treatments, "nailbiting")){
                    echo "checked";
                }
            ?>>
            <label for="treatment1">Nailbiting fixup $180</label>
            
            <input type="checkbox" name="treatment2" id="treatment2" value="royalmanicure"
            <?php 
                if(str_contains($itemInfo->treatments, "royalmanicure")){
                    echo "checked";
                }
            ?>>
            <label for="treatment2">Royal manicure $30</label>

            <input type="checkbox" name="treatment3" id="treatment3" value="nailrepare"
            <?php 
                if(str_contains($itemInfo->treatments, "nailrepare")){
                    echo "checked";
                }
            ?>>
            <label for="treatment3">Nail repare (per nail) $5</label>
            
            <?php
                $allColors = explode(",", $itemInfo->colors, PHP_INT_MAX);
            ?>

            <div>
                <h3>Choose 4 prefered colors</h3>
                <input type="color" name="col1" value="<?php echo $allColors[0]; ?>">
                <input type="color" name="col2" value="<?php echo $allColors[1]; ?>">
                <input type="color" name="col3" value="<?php echo $allColors[2]; ?>">
                <input type="color" name="col4" value="<?php echo $allColors[3]; ?>">
            </div>

            <button type="submit">Submit</button>
        </form>
    </fieldset>
</body>
</html>