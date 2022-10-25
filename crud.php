<?php

$servername="localhost";
$username="root";
$password="newpassword";
$dbname="Crud_Operations";

$connection=mysqli_connect($servername,$username,$password,$dbname);

if($connection){
    // echo "Connecting to database successfully";
}
else 
{
    echo "Connection failed due to an expecting error";
}


?>