<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT NetworkID, password, DeptID FROM student WHERE NetworkID = '$username' AND password = '$password';";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{

    if($row['NetworkID'] == $username && $row['password'] = $password)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['department'] = $row['DeptID'];
        echo "true";
        return;
    }



}
echo("Login Unsuccessful");
return;






?>