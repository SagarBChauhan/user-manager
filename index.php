<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                margin: 0;
                font-size: large;
                font-family:monospace;
            }
            header{
                background-color: black;
                padding: 20px;
                color: white;
            }
            footer{
                background-color: grey;
                padding: 40px;
                color: white;
            }
            a{
                text-decoration: none; 
                color: greenyellow;
                padding: 3px;
            }
            a:hover{
                text-decoration: none; 
                color: greenyellow;
                border-bottom:solid 5px greenyellow;
                padding: 3px;
                transition:1.0s;
            }
            input{
                padding: 12px 20px;
                border-radius: 10px;
                background-color: white;
                //margin: 8px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
            }
            input[type=submit]{
                padding: 12px 20px;
                border-radius: 10px;
                color: white;
                background-color: royalblue;
                //margin: 8px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
            }
            input[type=submit]:hover{
                padding: 12px 20px;
                border-radius: 10px;
                color: white;
                background-color: blue;
                //margin: 8px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>User Management System <span style="text-decoration: none;float: right; co"><a href="">Login</a></span></h1>
            
        </header>
            <?php include './Connection.php';?>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $usName= $_POST["uname"];
                $pass =$_POST["pass"];

                $sql="SELECT * FROM `tbl_admin` WHERE `Username`=".$usName." AND `Password`=".$pass.";";
                //$sql="select count(*) as match from tbluser where userName='".$usName."' and password='".$pass."';";
                //$result= mysqli_query($con, $sql);
                $result=$con->query($sql);
               // $get_row = $result->fetch_row();
                if ($con->affected_rows >0)
                {
                    echo "<br><marquee style='background-color:green; color:white;'>Login Successfully &check; </marquee>";
                    header("location:Home.php");
                }
                 else {
                    echo "<br><marquee style='background-color:red; color:white;'>Loging Failed</marquee>";
                    //header("location:Home.php");
                }
            }
         ?>
        <center>
        <div style="padding:5%; background-color: whitesmoke; width:30%; margin:5%; border-radius:10px; box-shadow: 2px 2px 10px gray;">
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table cellpadding="2">
            <tbody >
                <tr>
                    <td>User name:</td>
                    <td> <input type="text" name="uname" value="" placeholder="User name"/> </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" value="" placeholder="******"/></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" value="Login" name="btnLogin" /> </td>
                </tr>
            </tbody>
        </table>
        </form>
        </div>
        </center>
        <footer>
            <p>All Right Reserved &copy;<?php echo date("Y");?></p>
        </footer>
    </body>
</html>
