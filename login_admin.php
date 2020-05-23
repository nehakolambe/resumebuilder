<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$link = mysqli_connect("localhost:3307","root","","example");
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($link,$email);
$password = mysqli_real_escape_string($link,$password);


mysqli_select_db($link,"example");

$result = mysqli_query($link,"select * from admin where email = '$email' and password = '$password'")
            or die("Failed to query database".mysql_error());

$row = mysqli_fetch_row($result);
if($row[0] == $email && $row[1] == $password)
{

    header("Location:index.php");

}
else
{
    echo "Failed";
}           
?>
<!-- HTML -->
