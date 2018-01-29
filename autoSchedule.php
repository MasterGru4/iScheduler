<?php

$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT CourseID, CourseNo, SubjectArea, CourseTitle FROM course ORDER BY RAND() LIMIT 3";
$sql2 = "SELECT CourseID, CourseNo, SubjectArea, CourseTitle FROM course WHERE DeptID = 'CSCI' ORDER BY RAND() LIMIT 2";

$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);



echo("<table style='margin-left:500px;' border ='1'>");
echo("<thead>");
echo("<tr>");
echo(" <th colspan='15' style='color:white;height:50px' bgcolor='#990000'>");
echo("Class Schedule");
echo(" </th>");
echo("</tr>");
echo("<tr>");
echo(" <th bgcolor='#3BA3D0'>");
echo("Course Number");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'>");
echo("Subject Area");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Course Title");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Course Number");
echo(" </th>");
echo("</tr>");
echo("</thead>");

while($row = mysqli_fetch_array($result))
{
    echo("<tr style='text-align:center;'>");
    echo("<td>" . $row['SubjectArea'] . "</td>");
    echo("<td>" . $row['CourseNo'] . "</td>");
    echo("<td>" . $row['CourseTitle'] . "</td>");
    echo("<td>" . $row['CourseID'] . "</td>");
    echo("</tr>");
}
while($row2 = mysqli_fetch_array($result2))
{
    echo("<tr style='text-align:center;'>");
    echo("<td>" . $row2['SubjectArea'] . "</td>");
    echo("<td>" . $row2['CourseNo'] . "</td>");
    echo("<td>" . $row2['CourseTitle'] . "</td>");
    echo("<td>" . $row2['CourseID'] . "</td>");
    echo("</tr>");
}

echo("</tbody>");
echo("</table>");


mysqli_close($con);



?>