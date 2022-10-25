<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightslategray;
            color: white;
            margin-top: 35px;
        }

        table {
            width: 100%;
        }
    </style>
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php
include("crud.php");
// include("form.php");

$sql = "SELECT * FROM First";

$data = mysqli_query($connection, $sql);
$total = mysqli_num_rows($data);


if ($total != 0) {
?>
    <table border="">
        <tr>
            <th width="10%">First_Name</th>
            <th width="10%">Last_Name</th>
            <th width="15%">City</th>
            <th width="20%">Email</th>
            <th width="10%">Operations</th>
        </tr>
    <?php
    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
<td>" . $result["Fname"] . " </td>
<td>" . $result["LName"] . "  </td>
<td>" . $result["City"] . "  </td>
<td>" . $result["Email"] . "  </td>
<td style='display:flex;'>
            <a href='update.php?email=$result[Email] ' style=' width:45%; background-color:green;color:white;text-decoration: none; border: 2px solid green;border-radius: 6px;
            ' }>Update <a/>
            <a href='delete.php?email=$result[Email] ' style='align-items: center; width:45% ;background-color:red;color:white;text-decoration: none; border: 2px solid red;border-radius: 6px;
            ' }>  Delete <a/>

</td>
</tr>";
        $num++;
    }
} else {
    echo "Table has not Records";
}
    ?>
    </table>
    <!-- echo $result["First name"] . " " . $result["Last Name"] . " " . $result["City"] . " " . $result["Email"] . "<br>"; -->