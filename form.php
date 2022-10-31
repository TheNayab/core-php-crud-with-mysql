<?php
include("crud.php")
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
      height: 60vh;
      border-radius: 5px;
      padding: 3px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    form:hover {
      border: 3px solid white;
      width: 52%;
      height: 55vh;
      border-radius: 5px;
      box-shadow: 10px 10px 20px white;
    }

    form input {
      width: 90%;
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
      ;
    }
  </style>
</head>

<body>
  <form method="post" action="#" enctype="multipart/form-data">
    First name:<br>
    <input type="text" name="first_name">
    <br>
    Last name:<br>
    <input type="text" name="last_name">
    <br>
    City name:<br>
    <input type="text" name="city_name">
    <br>
    Email Id:<br>
    <input type="email" name="email">
    <br><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    <input name="userfile" type="file" />
    <br><br>
    <div class="btn">
      <input type="submit" name="save" value="submit">
    </div>


  </form>
</body>

</html>

<?php

if (isset($_POST['save'])) {

  $filename = $_FILES["userfile"]["name"];
  $tempname = $_FILES["userfile"]["tmp_name"];
  $folder = "uploads/" . $filename;
  move_uploaded_file($tempname, $folder);

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $city_name = $_POST['city_name'];
  $email = $_POST['email'];


  if ($first_name != "" && $last_name != "" && $city_name != "" && $email != "") {

    $sql = "INSERT INTO First VALUES ('$folder','$first_name','$last_name','$city_name','$email')";

    if (mysqli_query($connection, $sql)) {
      echo "<script>alert('New record created successfully') </script>";
?>
      <meta http-equiv="refresh" content="0; url = http://localhost/crudoperation/display.php" />
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