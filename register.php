<?php

$conn = mysqli_connect('localhost:3307','root','','example');

if(!$conn)
{
    die('Connection failed!'.mysqli_error($conn));
}

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users(id, name, email, password) VALUES('$id', '$name','$email',
 '$password')";

if(mysqli_query($conn,$sql))
{
    //echo "Registerd Successfully";
    $_SESSION["name"] = $row[1];
    header('Location:login.html');
}
else
{
    echo mysqli_error($conn);
}

?>