<?php
session_start();

?>

<!--

File:   Project_home_page.php
Author: Blake Bowdoin, Daniel Gruza
Class:  Summer 1, 2017 C490
Description:
    This is the main page of the iSchedule project. This files gives a button for a student to log in
    a button for a gerneral person to search, a contact button and an about us button. This file
    gives a slight desciption of the website.
-->


<!DOCTYPE html>
<html>
    <head>
        <title>iScheduler Homepage</title>
        <meta charset="UTF-8">
        <meta name="keywords" content="JavaScript, Web Programming, HTML, CSS, Class, Schedule, Intelligent">
        <meta name="author" content="Daniel Gruza">
        <meta name="author" content="Blake Bowdoin">
        <meta name="class" content="CSCI-C490 Client Server Web Programming">
        <meta name="Final Project" content="iScheduler">
        <meta name="semester" content="Summer 1, 2017">




        <style type="text/css">

            body
            {
                font-family:"Arial";
                color: Black;
                background-color:#EEEDEB;
            }


            img
            {
                display: block
                    margin: auto;
                width: 1100px;
                height: 450px;
            }



            #body_stuff
            {
                width:700px;
                float:left;
            }	

            .button
            {
                border-radius: 25px;
                color: white;
                background-color: #990000;
                padding: 20px;

            }


            a.about
            {
                font-size: small;
                float: center;
            }

            a.about:hover
            {
                color: #6823b2
                    text-decoration: underline;
            }

            a.contact:hover
            {
                color: #6823b2
                    text-decoration: underline;
            }
            a.contact
            {
                font-size: small;
                float: center;
            }

        </style>

        <script type="text/javascript">

            function new_page() {
                window.location.assign("./login.php")
            }

            function new_page2 () {
                window.location.assign("./publicPortal.php")
            }
        </script>
    </head>
    <body>

        <div id="header" style='height:50px;width:1300px;background-color:#990000;color:#EDEBEB'>
            <img style='float:left;height:100px;width:75px;margin-left:100px;' src='https://brand.iu.edu/images/trident-tab.jpg' 
                 name='iuTrident' alt='IU'>
            <h1 style='position:relative;left:325px;'>iScheduler Home</h1>
        </div>	
        <br><br><br>

        <div id="links" style='text-align:center'>
            <a class="about" href="./Project_about-us.html">About us</a>
            <a class="contact" href="./Project_contact.html">Contact</a>
        </div>
        <br>

        <div id="pub_search">
            <input type="button" class="button" value="Public Search" onclick="new_page2()">
        </div>


        <div id="body_stuff">
            <p>What is iScheduler?<br> iScheduler is a comprehensive and intelligent Scheduling system for academic institutions.  
                The system provides an inuitive and friendly interface for the following categories of users.
            <ol>
                <li>Public</li>
                <li>Students</li>
                <li>Department Administrators</li>
                <li>Campus Administrators</li>
                <li>Super-user</li>
            </ol>
            </p><br>


        <div id="form_stuff">
            <form>
                <input type="button" class="button" value="Login" onclick="new_page()">
            </form>
        </div>
        <div id='copyright' style='height:50px;width:1300px;background-color:#990000'>
            <h2 style='color:white;text-align:center'>&#169 Copyright 2017 by C490 Client Server Web Programming</h2>
        </div>
        </div>
    </body>
</html>