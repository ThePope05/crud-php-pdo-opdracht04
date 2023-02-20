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
    <fieldset class="scroll">
        <legend>
            <h1>All Appointments</h1>
        </legend>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer email</th>
                <th>Customer phone number</th>
                <th>Appointment date</th>
                <th>Order date</th>
                <th>Treatments</th>
                <th>Colors</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                include("phpFiles/read.php");

                $orders = retInfo();

                foreach($orders as $order){
                    echo "<tr>";
                        echo "<td>$order->Id</td>";
                        echo "<td>$order->eMail</td>";
                        echo "<td>$order->pNumb</td>";
                        echo "<td>$order->aDate</td>";
                        echo "<td>$order->oDate</td>";
                        echo "<td>$order->treatments</td>";
                        echo "<td class='col'>";
                            if($order->colors != "no colors"){
                                $colors = explode(",", $order->colors, PHP_INT_MAX);
                                foreach($colors as $color){
                                    echo "<div style='background-color: $color;'>$color</div>";
                                }
                            }else{
                                echo "no colors";
                            }
                        echo "</td>";
                        echo "<td><a href='editForm.php?id=$order->Id'><span class='material-symbols-outlined'>edit</span></a></td>";
                        echo "<td><a href='phpFiles/delete.php?id=$order->Id'><span class='material-symbols-outlined'>delete</span></a></td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td><a href="createForm.php"><span class='material-symbols-outlined'>add_circle</span></a></td>
            </tr>
        </table>
    </fieldset>
</body>
</html>