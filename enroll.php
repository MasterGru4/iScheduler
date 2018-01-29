<?php

//print_r($_POST['classes']);

$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



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
echo("</tr>");
echo("</thead>");

foreach ($_POST['classes'] as $value) 
{
    $sql = "SELECT CourseNo, SubjectArea, CourseTitle FROM course WHERE CourseID = '$value'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result))
    {
        echo("<tr style='text-align:center;'>");
        echo("<td>" . $row['SubjectArea'] . "</td>");
        echo("<td>" . $row['CourseNo'] . "</td>");
        echo("<td>" . $row['CourseTitle'] . "</td>");
        echo("</tr>");
    }
}
echo("</tbody>");
echo("</table>");


mysqli_close($con);

?>