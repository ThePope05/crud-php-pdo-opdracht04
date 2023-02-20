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
<fieldset>
        <legend><h1>Make A new appointment</h1></legend>
        <form action="phpFiles/create.php" method="post">

            <h3>Enter your email</h3>
            <input type="email" name="email" placeholder="example@email.com">

            <h3>Enter your phone number</h3>
            <input type="tel" name="pnumb">

            <h3>Appointment date</h3>
            <input type="datetime" name="adate" placeholder="YYYY-MM-DD">

            <h3>Choose your treatements</h3>
            <input type="checkbox" name="treatment1" id="treatment1" value="nailbiting">
            <label for="treatment1">Nailbiting fixup $180</label>
            
            <input type="checkbox" name="treatment2" id="treatment2" value="royalmanicure">
            <label for="treatment2">Royal manicure $30</label>

            <input type="checkbox" name="treatment3" id="treatment3" value="nailrepare">
            <label for="treatment3">Nail repare (per nail) $5</label>

            <div>
                <h3>Choose 4 prefered colors</h3>
                <input type="color" name="col1">
                <input type="color" name="col2">
                <input type="color" name="col3">
                <input type="color" name="col4">
            </div>

            <button type="submit">Submit</button>
        </form>
    </fieldset>
</body>
</html>