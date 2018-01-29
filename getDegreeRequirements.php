<?php

$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT
academic_program.DegreeID, 
requirements.requirementtext, 
requirements.mincreditsrequired,
detailed_requirement.detailedrequirementtext,
satisfied_by.CourseID, 
course.subjectarea,
course.courseno,
course.coursetitle,
course.mincredits as CREDITS,
satisfied_by.MinGradeRequired
    FROM 
    academic_program, requirements, detailed_requirement, course, satisfied_by
    WHERE 
    academic_program.DegreeID = 'BSINFBS'
    AND academic_program.DegreeID = requirements.Degreeid
    AND requirements.requirementid = detailed_requirement.RequirementID
    AND detailed_requirement.DetailedRequirementID = satisfied_by.DetailedRequirementID
    AND satisfied_by.CourseID = course.CourseID
    ORDER BY
    requirements.requirementid, requirements.orderofappearance,
detailed_requirement.orderofappearance, course.courseno";

$result = mysqli_query($con,$sql);


echo("<table border ='1' style='width:1200px'>");
echo("<thead>");
echo("<tr>");
echo(" <th colspan='15' style='color:white;height:50px' bgcolor='#990000'>");
echo(" iScheduler Courses");
echo(" </th>");
echo("</tr>");
echo("<tr>");
echo(" <th bgcolor='#3BA3D0'>");
echo("Select");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'>");
echo("Degree ID");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Requirement Text");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Min Credits Required");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Detailed Requirement Text");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("CourseID");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Subject Area");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Course Num");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Course Title");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Credits");
echo(" </th>");
echo(" <th bgcolor='#3BA3D0'> ");
echo("Min Grade Required");
echo(" </th>");
echo("</tr>");
echo("</thead>");
echo("<tbody>");
$i = 1;
while($row = mysqli_fetch_array($result))
{
    echo("<tr style='text-align:center;'>");
    echo("<td><input id='checkBox$i' type='checkbox'></td>");
    echo("<td>" . $row['DegreeID'] . "</td>");
    echo("<td>" . $row['requirementtext'] . "</td>");
    echo("<td>" . $row['mincreditsrequired'] . "</td>");
    echo("<td>" . $row['detailedrequirementtext'] . "</td>");
    echo("<td  id='courseid$i'>" . $row['CourseID'] . "</td>");
    echo("<td>" . $row['subjectarea'] . "</td>");
    echo("<td>" . $row['courseno'] . "</td>");
    echo("<td>" . $row['coursetitle'] . "</td>");
    echo("<td id='credits$i'>" . $row['CREDITS'] . "</td>");
    echo("<td>" . $row['MinGradeRequired'] . "</td>");
    $i++;
    echo("</tr>");
}
echo("</tbody>");
echo("</table>");


mysqli_close($con);



?>