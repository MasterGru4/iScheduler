<!--

File:   publicPortal.php
Author: Blake Bowdoin, Daniel Gruza
Class:  Summer 1, 2017 C490
Description:
This is the public portal of the website. This file allows the user to search for classes that are offered by IU.
The file looks to get results .php files to query the database and file classes that are offered by the campus that select.
Since the database is incomplete, only CSCI classes have an extremely detailed query. This is due to the database
being from a previous course of designing a database. Since this is the public portal, no one needs to log in and
no one should be selecting classes to take in this file.
-->

<?php
// Start the session
session_start();
$_SESSION['username'] = "dgruza";
?> 

<!DOCTYPE html>
<html>

    <head>
        <style>
            #searchBoxDiv{
                margin:0 auto;
                width:600px;
            }

            td {
                width:100px;
            }
        </style>

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <script>
            window.onload = function getSelectData() {
                var selectStuff = document.getElementById("semester");
                //selectStuff.innerHTML = "<option>Hello</option>";
                //selectStuff.innerHTML =  selectStuff.innerHTML + "<option>Bitches</option>";

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("semester").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "getSemesterData.php", true);
                xmlhttp.send();


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("campus").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "getCampusData.php", true);
                xmlhttp.send();


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("college").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "getCollegeData.php", true);
                xmlhttp.send();


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("department").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "getDepartmentData.php", true);
                xmlhttp.send();

            }


            $(function () {

                $('#theForm').on('submit', function (e) {

                    e.preventDefault();
                    var dataStuff = $("#partialEmail").val();
                    document.getElementById("searchResults").innerHTML = dataStuff;

                    var e = document.getElementById("semester");
                    var box1 = e.options[e.selectedIndex].value;

                    var e = document.getElementById("campus");
                    var box2 = e.options[e.selectedIndex].value;

                    var e = document.getElementById("college");
                    var box3 = e.options[e.selectedIndex].value;

                    var e = document.getElementById("department");
                    var box4 = e.options[e.selectedIndex].value;

                    $.ajax({
                        type: 'POST',
                        url: 'getSearchResults.php',
                        data : {semester : box1, campus : box2, college : box3, department : box4 },
                        success: function (data) {
                            //alert('form was submitted' + data);
                            console.log(data);
                            document.getElementById("searchResults").innerHTML = data;
                        }
                    });
                });


            });

            $(function () {

                $('#searchForm').on('submit', function (e) {

                    e.preventDefault();

                    var keywords = document.getElementById("searchField").value;
                    //document.getElementById("searchResults").innerHTML = keywords;



                    $.ajax({
                        type: 'POST',
                        url: 'getKeywordResults.php',
                        data : {keywords : keywords },
                        success: function (data) {
                            document.getElementById("searchResults").innerHTML = data;
                        }
                    });
                });


            });


        </script>

    </head>

    <body>

        <div id='container' style='overflow-y:auto;height:1000px;width:1300px;background-color:#EDEBEB'>
            <div style='height:50px;width:1300px;background-color:#990000;color:#EDEBEB'>

                <img style='float:left;height:100px;width:75px;margin-left:100px;' src='./images/trident-large.png' name='iuTrident' alt='IU'>

                <h1 style='position:relative;left:380px;'>Public Search</h1>





            </div>
            <form id='searchForm' style="margin-left:300px">
                <table>
                    <td>
                        <div id="searchBoxDiv" style="">
                            <input id='searchField' style='width:600px;height:40px;font-size:20px' type='text' name='searchBar' placeholder="Search by Department or Course Subject">
                        </div>
                    </td>
                    <td><input type="image" style='float:right;height:40px;width:40px;' src='./images/search-button.jpg' name='searchBox' value="Submit"></td>
                </table>
            </form>

            <br>
            <br>


            <form id="theForm" style='position:relative' style="width=900px">

                <table style="height:40px;width:900px;margin:0 auto;">
                    <tr>
                        <td style="width:200px">Semester: <br>
                            <select id="semester" name="semester">
                                <option value="semester" name="semester">Fall 2017</option>
                            </select>
                        </td>
                        <td  style="width:200px">Campus: <br>
                            <select id="campus">
                                <option value="campus" name="campus">Campus</option>
                            </select>
                        </td>
                        <td  style="width:200px">College:<br>
                            <select id="college">
                                <option value="college" name="college">College</option>
                            </select>
                        </td>
                        <td  style="width:200px">Department:<br>
                            <select id="department">
                                <option value="department" name="department">Department</option>
                            </select>
                        </td>
                        <td  style="width:200px"><input type="image" style='float:right;height:40px;width:40px;' src='./images/search-button.jpg' name='submit' value="Submit">
                        </td>

                    </tr>


                </table>


            </form>

            <div id="searchResults" style="width:900px;">


            </div>







        </div>

        <div id='copyright' style='height:50px;width:1300px;background-color:#990000'>
            <h2 style='color:white;text-align:center'>&#169 Copyright 2017 by C490 Client Server Web Programming</h2>
        </div>


    </body>


</html>
