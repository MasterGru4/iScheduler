<?php
session_start();

$keywords = strtolower($_POST['keywords']);


$con = mysqli_connect("localhost","iSched_user", "Pass123Word", "ischeduler");

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($keywords == "")
{
    echo"No Results";
    return;
}

if (strpos($keywords, 'computer') !== false || strpos($keywords, 'csci') !== false) {




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
    return;
}
elseif(strpos($keywords, 'admin') !== false)
{
    $keywords = "ADMIN";
}
elseif(strpos($keywords, 'ahlt') !== false)
{
    $keywords = "AHLT";
}
elseif(strpos($keywords, 'art') !== false)
{
    $keywords = "ARTS";
}
elseif(strpos($keywords, 'bio') !== false)
{
    $keywords = "BIOL";
}
elseif(strpos($keywords, 'bus') !== false)
{
    $keywords = "BUSE";
}
elseif(strpos($keywords, 'chem') !== false)
{
    $keywords = "CHEM";
}
elseif(strpos($keywords, 'just') !== false)
{
    $keywords = "CJUS";
}
elseif(strpos($keywords, 'coas') !== false)
{
    $keywords = "COAS";
}
elseif(strpos($keywords, 'den') !== false)
{
    $keywords = "DENT";
}
elseif(strpos($keywords, 'econ') !== false)
{
    $keywords = "ECON";
}
elseif(strpos($keywords, 'edu') !== false)
{
    $keywords = "EDUC";
}
elseif(strpos($keywords, 'eng') !== false)
{
    $keywords = "ENG";
}
elseif(strpos($keywords, 'fine') !== false)
{
    $keywords = "FINA";
}
elseif(strpos($keywords, 'folk') !== false)
{
    $keywords = "FOLK";
}
elseif(strpos($keywords, 'geol') !== false)
{
    $keywords = "GEOL";
}
elseif(strpos($keywords, 'hist') !== false)
{
    $keywords = "HIST";
}
elseif(strpos($keywords, 'hon') !== false)
{
    $keywords = "HON";
}
elseif(strpos($keywords, 'info') !== false)
{
    $keywords = "INFO";
}
elseif(strpos($keywords, 'inms') !== false)
{
    $keywords = "INMS";
}
elseif(strpos($keywords, 'int') !== false)
{
    $keywords = "INTL";
}
elseif(strpos($keywords, 'jour') !== false)
{
    $keywords = "JOUR";
}
elseif(strpos($keywords, 'lbst') !== false)
{
    $keywords = "LBST";
}
elseif(strpos($keywords, 'lstu') !== false)
{
    $keywords = "LSTU";
}
else
{
    echo"No Results";
    return;
}

$sql="SELECT course.CourseTitle, course.CourseID, course.SubjectArea, course.CourseNO FROM course WHERE course.DeptID = '$keywords'";


$result = mysqli_query($con,$sql);
echo("<p style='color:#990000;'>These are classes offered by IU South Bend, please talk to your advisor for more information.</p>");

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
?>