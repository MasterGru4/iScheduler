<?php


$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['campus']))
{
    if($_POST['campus'] !== "SB")
    {
        echo("No results!");
        return;
    }
}
if($_POST['department'] == "CSCI" && $_POST['college'] == "LAS")
{




    $sql="SELECT
 campus.CampusID,
 department.DeptID,
 semester.AcademicTerm,
 semester.Semester,
 semester.Year,
 section_past.SectionID,
 section_past.NumberOfStudentsEnrolled,
 section_past.SectionTopicDescription, 
 section_past.CourseID, 
 section_past.TeachingMode,
 course.SubjectArea,
 course.CourseNO,
 course.CourseTitle,
 section_past_meets_at.StartTime,
 section_past_meets_at.EndTime,
 section_past_meets_at.M,
 section_past_meets_at.T,
 section_past_meets_at.W,
 section_past_meets_at.R,
 section_past_meets_at.F,
 section_past_meets_at.S,
 section_past_meets_at.BuildingID,
 section_past_meets_at.RoomID

FROM
 campus, department, semester, section_past, course, section_past_meets_at

WHERE
 campus.Name = 'IU South Bend'
 AND
 department.campusID = campus.CampusID
 AND
 department.Name ='Computer and Information Sciences'
 AND
 semester.CurrentTerm = 1
 AND
 section_past.academicterm = semester.AcademicTerm
 AND
 section_past.courseID = course.courseID
 AND
 section_past.sectionID = section_past_meets_at.SectionID
 AND
 section_past.AcademicTerm = section_past_meets_at.AcademicTerm";


    $result = mysqli_query($con,$sql);
    //$bob = mysqli_fetch_array($result);
    //print_r($bob);
    echo("<table border ='1' style='width:1200px'>");
    echo("<thead>");
    echo("<tr>");
    echo(" <th colspan='15' style='color:white;height:50px' bgcolor='#990000'>");
    echo(" iScheduler Courses");
    echo(" </th>");
    echo("</tr>");
    echo("<tr>");
    echo(" <th bgcolor='#3BA3D0'>");
    echo("Course ID");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Course Title");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Subject Area");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Course Number");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Start Time");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("End Time");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("M");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("T");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("W");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("R");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("F");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("S");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Section ID");
    echo(" </th>");
    echo(" <th style='width:200px' bgcolor='#3BA3D0'> ");
    echo("Additional Functions");
    echo(" </th>");
    echo("</tr>");
    echo("</thead>");
    echo("<tbody>");
    while($row = mysqli_fetch_array($result))
    {
        echo("<tr style='text-align:center;'>");
        echo("<td>" . $row['CourseID'] . "</td>");
        echo("<td>" . $row['CourseTitle'] . "</td>");
        echo("<td>" . $row['SubjectArea'] . "</td>");
        echo("<td>" . $row['CourseNO'] . "</td>");
        echo("<td>" . $row['StartTime'] . "</td>");
        echo("<td>" . $row['EndTime'] . "</td>");
        if($row['M'] == '1')
        {
            echo("<td style='test-align:center;'>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        if($row['T'] == '1')
        {
            echo("<td>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        if($row['W'] == '1')
        {
            echo("<td>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        if($row['R'] == '1')
        {
            echo("<td>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        if($row['F'] == '1')
        {
            echo("<td>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        if($row['S'] == '1')
        {
            echo("<td>X</td>");
        }
        else
        {
            echo("<td></td>");
        }
        echo("<td>" . $row['SectionID'] . "</td>");
        echo("</tr>");
    }
    echo("</tbody>");
    echo("</table>");


    mysqli_close($con);
}
else
{
    
    $department = $_POST['department'];
    $college = $_POST['college'];
    $campus = $_POST['campus'];
    $sql="SELECT course.CourseTitle, course.CourseID, course.SubjectArea, course.CourseNO FROM course WHERE course.DeptID = '$department' AND course.CollegeID = '$college'";

    
    $result = mysqli_query($con,$sql);
    echo("<p style='color:#990000;'>These are classes offered by $campus, please talk to your advisor for more information.</p>");
    
    echo("<table border ='1' style='width:1200px'>");
    echo("<thead>");
    echo("<tr>");
    echo(" <th colspan='15' style='color:white;height:50px' bgcolor='#990000'>");
    echo(" iScheduler Courses");
    echo(" </th>");
    echo("</tr>");
    echo("<tr>");
    echo(" <th bgcolor='#3BA3D0'>");
    echo("Course ID");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Course Title");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Subject Area");
    echo(" </th>");
    echo(" <th bgcolor='#3BA3D0'> ");
    echo("Course Number");
    echo(" </th>");
    echo(" <th style='width:200px' bgcolor='#3BA3D0'> ");
    echo("Additional Functions");
    echo(" </th>");
    echo("</tr>");
    echo("</thead>");
    echo("<tbody>");
    while($row = mysqli_fetch_array($result))
    {
        echo("<tr style='text-align:center;'>");
        echo("<td>" . $row['CourseID'] . "</td>");
        echo("<td>" . $row['CourseTitle'] . "</td>");
        echo("<td>" . $row['SubjectArea'] . "</td>");
        echo("<td>" . $row['CourseNO'] . "</td>");
        echo("<td>NA</td>");
        echo("</tr>");
    }
    echo("</tbody>");
    echo("</table>");


    mysqli_close($con);
}


/*
if(isset($_POST['semester']))
{
    echo $_POST['semester'];
}
else
    echo("No variable 1");
echo("<br>");

if(isset($_POST['campus']))
{
    echo $_POST['campus'];
}
else
    echo("No variable 2");
echo("<br>");

if(isset($_POST['college']))
{
    echo $_POST['college'];
}
else
    echo("No variable 3");
echo("<br>");

if(isset($_POST['department']))
{
    echo $_POST['department'];
}
else
    echo("No variable 4");
echo("<br>");*/



?>
