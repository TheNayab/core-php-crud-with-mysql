<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* display: flex;
            justify-content: center;
            align-items: center; */
            background-color: lightslategray;
            color: white;
            margin-top: 35px;
        }

        table {
            width: 100%;
        }

        .con {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 900;
            font-size: 43px;
            margin-bottom: 23px;
            color: orangered;
        }

        .search {
            display: flex;
            justify-content: right;
            align-items: center;
            color: white;
            margin-bottom: 56px;
            font-weight: bold;

        }

        .search input {
            border: 6px solid white;
            margin: 2px;
            border-radius: 2px;
        }

        .search span input {
            border: 6px solid orange;
            background-color: orange;
            border-radius: 9px;
            margin: 2px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .search span input:hover {
            border: 6px solid blue;
            background-color: blue;

        }

        .sea {
            display: flex;
            justify-content: center;
            font-size: 23px;
            align-items: center;
            font-weight: bold;
            color: orangered;
            margin-bottom: 23px;
        }

        table {
            margin-bottom: 45rem;
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

?>

<div class="con">
    Dispaly All Data
</div>
<form action="" class="search" method="POST">
    Search:
    <input type="text" name="search" placeholder="Enter Email">
    <span>
        <input type="submit" name="submit">
    </span>
</form>

<div class="container">
    <!-- <table class="table" border=""> -->
    <?php

    if (isset($_POST['submit'])) {

        $search = $_POST['search'];

        $sql = "Select * from `First` where Fname like '%$search%'  or LName like '%$search%' or City like '%$search%' or Email like '%$search%'";

        $result = mysqli_query($connection, $sql);
        if ($result) {
            if ($num = mysqli_num_rows($result) > 0) {
                echo '     <table border="">

                      <tr>
                            <th width="5%">Image</th>
                            <th width="10%">First_Name</th>
                            <th width="10%">Last_Name</th>
                            <th width="15%">City</th>
                            <th width="20%">Email</th>
                            <th width="10%">Operations</th>

                        </tr>';
                while (
                    $row = mysqli_fetch_assoc($result)
                ) {
                    echo "<tr>
                                    <td> <img src='" . $row["std_img"] . "' height='100vh' width='100%'></td>
                                    <td>" . $row["Fname"] . " </td>
                                    <td>" . $row["LName"] . "  </td>
                                    <td>" . $row["City"] . "  </td>
                                    <td>" . $row["Email"] . "  </td>
                                    <td style='display:flex;'>
            <a href='update.php?email=$row[Email] ' style=' width:45%; background-color:green;color:white;text-decoration: none; border: 2px solid green;border-radius: 6px;
            ' }>Update <a/>
            <a href='delete.php?email=$row[Email] ' style='align-items: center; width:45% ;background-color:red;color:white;text-decoration: none; border: 2px solid red;border-radius: 6px;
            ' }>  Delete <a/>

</td>
                            </tr>";
                }
            } else {
                echo "<h1>Data not found</h1>";
            }
        }
    }




    ?>
    </table>
</div>



<?php




if ($total != 0) {
?>
    <table border="">
        <tr>
            <th width="5%">Image</th>
            <th width="10%">First_Name</th>
            <th width="10%">Last_Name</th>
            <th width="15%">City</th>
            <th width="20%">Email</th>
            <th width="10%">Operations</th>
        </tr>

    <?php


    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
<td> <img src='" . $result["std_img"] . "' height='100vh' width='100%'></td>
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
    }
} else {
    echo "Table has not Records";
}
    ?>
    </table>
    <!-- echo $result["First name"] . " " . $result["Last Name"] . " " . $result["City"] . " " . $result["Email"] . "<br>"; -->