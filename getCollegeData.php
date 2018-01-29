<?php


$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if(mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}

$sql="SELECT CollegeID FROM college WHERE CollegeID != 'TEMPLATE'";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
    echo("<option>" . $row['CollegeID'] . "</option>");
}


//echo("<option>Bob is your uncle</option>");
mysqli_close($con);
?>