<?php

session_start();


?>


<html>
    <head>

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>
            $(function () {

                $('#loginForm').on('submit', function (e) {

                    e.preventDefault();

                    var username = document.getElementById("username").value;
                    var password = document.getElementById("password").value;



                    $.ajax({
                        type: 'POST',
                        url: 'authenticate.php',
                        data : {username : username, password : password },
                        success: function (data) {
                            if(data == "true")
                            {
                                window.location.assign("./studentPortal.php");
                            }
                            else{
                                document.getElementById("container").innerHTML = data;
                            }
                            
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

                <h1 style='position:relative;left:380px;'>Student Login</h1>





            </div>
            <form id='loginForm' style="margin-left:300px;margin-top:200px;">
                <table>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td><input id='username' style='width:600px;height:40px;font-size:20px' type='text' name='username' placeholder="Username">
                            </td>
                        </tr>
                        <tr style="height:50px"></tr>
                        <tr>
                            <td>Password</td>
                            <td><input id='password' style='width:600px;height:40px;font-size:20px' type='password' name='password' placeholder="Password">
                            </td>
                        </tr>
                    </tbody>

                </table>
                <input type="submit" style='height:40px;width:60px;' src='./images/search-button.jpg' name='submit' value="Login">
            </form>

            <br>
            <br>









        </div>


    </body>


</html>