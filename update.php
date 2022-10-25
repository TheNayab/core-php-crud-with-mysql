<?php
include("crud.php");
$id = $_GET['email'];
$sql = "SELECT * FROM First where Email='$id'";
$data = mysqli_query($connection, $sql);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: red;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            top: 50px;
        }

        form {
            border: 2px solid white;
            width: 50%;
            height: 44vh;
            border-radius: 5px;
            padding: 3px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form:hover {
            width: 52%;
            height: 45vh;

        }

        form input {
            width: 90%;
            height: 22px;
            border-radius: 3px;
        }

        form .btn input {
            background-color: black;
            width: 100px;
            height: 40px;
            border: 3px solid black;
            border-radius: 8px;
            color: white;
            cursor: pointer;
        }

        form .btn input:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <form method="post" action="#">
        First name:<br>
        <input type="text" name="first_name" value="<?php echo $result['Fname'] ?>">
        <br>
        Last name:<br>
        <input type="text" name="last_name" value="<?php echo $result['LName'] ?>">
        <br>
        City name:<br>
        <input type="text" name="city_name" value="<?php echo $result['City'] ?>">
        <br>
        Email Id:<br>
        <input type="email" name="email" value="<?php echo $result['Email'] ?>">
        <br><br>
        <div class="btn">
            <input type="submit" name="update" value="submit">
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city_name = $_POST['city_name'];
    $email = $_POST['email'];

    if ($first_name != "" && $last_name != "" && $city_name != "" && $email != "") {

        $sql = "UPDATE First set Fname='$first_name', Lname='$last_name', City='$city_name', Email='$email' WHERE Email='$id'";


        if (mysqli_query($connection, $sql)) {
            echo "<script>alert('Successfully updated') </script>";
?>
            <meta http-equiv="refresh" content="0; url = http://localhost/display.php" />

<?php
        } else {
            echo "Error: " . $sql . "
" . mysqli_error($connection);
        }
        mysqli_close($connection);
    } else {
        echo "<script>alert('Please fill all the field') </script>";
    }
}
?>