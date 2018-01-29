<?php
//echo("<option>Bob is your uncle</option>");


$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if(mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}

$sql="SELECT Semester, Year FROM semester WHERE CurrentTerm = 1";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
    
}

//echo("<option>Bob is your uncle</option>");
mysqli_close($con);
?>