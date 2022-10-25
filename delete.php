<?php
include("crud.php");

$id = $_GET['email'];
$sql = "DELETE FROM First WHERE Email='$id'";
$data = mysqli_query($connection, $sql);

if ($data) {
    echo "<script>alert('Successfully deleted...!')</script>";
?>
    <meta http-equiv="refresh" content="0; url = http://localhost/display.php" />
<?php

} else {
    echo "Failed to delete";
}
