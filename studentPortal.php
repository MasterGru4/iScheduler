<!--
File:   studentPortal.php
Author: Blake Bowdoin, Daniel Gruza
Class:  Summer 1, 2017 C490
Description:
This is the student portal of the website. A student should sign in before coming to to this website.
Again, since the database is incomplete, only a few CSCI classes have extremely detailed information.
This file allows the student to search for general education classes and be able to select them.
Once they have selected some classes, a table is created telling them which classes they selected.
There is no other functionality since the devs of this site at the time had little database experience.
There is also a button to auto schedule. This just gives a random selection of 5 classes. These classes have no
meaning because the database has no table for previous classes taken table.
Each function has a file with a php extention to ge the information they request.
-->



<?php
// Start the session
session_start();

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

            function enrollClasses()
            {
                var runningTotalCredits = 0;
                var i = 1;

                var classes = new Array();

                var maxCredits = 19;

                var blah =  document.getElementById("searchResults");

                var jimmy = document.createElement("P");

                for(runningTotalCredits; runningTotalCredits <= maxCredits;)
                {
                    if(document.getElementById("checkBox" + i) !== null)
                    {
                        if(document.getElementById("checkBox" + i).checked)
                        {
                            runningTotalCredits += parseInt(document.getElementById("credits" +i).innerHTML);
                            classes.push(document.getElementById("courseid" + i).innerHTML);

                            jimmy.innerHTML = jimmy.innerHTML + document.getElementById("courseid" + i).innerHTML;
                            jimmy.innerHTML = jimmy.innerHTML + "<br>";
                        }
                    }
                    else{
                        break;
                    }

                    i++;
                }
                if(runningTotalCredits > maxCredits)
                {
                    document.getElementById("searchResults").innerHTML = "You may only take a maximum of 19 credits. You selected " + runningTotalCredits;
                }
                else
                {
                    if(!(classes.length == 0)){
                        $.ajax({
                            type: 'POST',
                            url: 'enroll.php',
                            data : {classes : classes },
                            success: function (data) {
                                //document.body.innerHTML = "";
                                document.getElementById("searchResults").innerHTML = data;
                                document.getElementById("message").innerHTML = "These classes have been added!"
                            }
                        });
                    }
                }


            }

            function autoSchedule()
            {
                $.ajax({
                    type: 'POST',
                    url: 'autoSchedule.php',
                    data : {department : 'CSCI', college : 'LAS' },
                    success: function (data) {
                        document.getElementById("searchResults").innerHTML = data;
                    }
                });
            }

            function get_csci_classes()
            {
                $.ajax({
                    type: 'POST',
                    url: 'getSearchResults.php',
                    data : {department : 'CSCI', college : 'LAS' },
                    success: function (data) {
                        document.getElementById("searchResults").innerHTML = data;
                    }
                });
            }



            $(function () {

                $('#searchForm').on('submit', function (e) {

                    e.preventDefault();

                    var keywords = document.getElementById("searchField").value;
                    //document.getElementById("searchResults").innerHTML = keywords;



                    $.ajax({
                        type: 'POST',
                        url: 'getDegreeRequirements.php',
                        data : {keywords : keywords },
                        success: function (data) {
                            //alert('form was submitted' + data);
                            console.log(data);
                            document.getElementById("searchResults").innerHTML = data;
                            document.body.innerHTML = document.body.innerHTML + "<input type='image' style='margin-left:500px;height:50px;width:150px;' src='./images/RegisterNow_click_here.png' onclick='enrollClasses();' name='enrollButton' value='Submit'>";
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

                <h1 style='position:relative;left:380px;'>Student Search</h1>





            </div>
            <form id='searchForm' style="margin-left:300px">
                <table>
                    <tr>
                        <td>
                            <div id="searchBoxDiv" style="">
                                <input id='searchField' style='width:600px;height:40px;font-size:20px' type='text' name='searchBar' placeholder="Search your degree requirements">
                            </div>
                        </td>
                        <td><input type="image" style='float:right;height:40px;width:40px;' src='./images/search-button.jpg' name='searchBox' value="Submit"></td>
                    </tr>
                </table>
            </form>

            <br>
            <br>

            <?php
            echo("<p id='message' style='font-size:150%;text-align:center;color:red;'>Hello " . $_SESSION['username'] . "! Here is where you can select which classes you would like to take next semester.</p>");

            echo("<input type='submit' style='margin-left:500px;height:40px;width:200px;' onclick='get_csci_classes();' name='submit' value='Search CSCI Classes'>");
            echo("<input type='submit' style='height:40px;width:200px;' name='submit'  onclick='autoSchedule();' value='Auto Schedule'>");
            ?>



            <div id="searchResults" style="width:900px;">


            </div>










        </div>
        <div id='copyright' style='height:50px;width:1300px;background-color:#990000'>
            <h2 style='color:white;text-align:center'>&#169 Copyright 2017 by C490 Client Server Web Programming</h2>
        </div>


    </body>


</html>
