<?php

include "connection.php";
session_start();




if($conn->connect_error){
    echo "failed";
}
$flag=True;

if(isset($_GET['hello'])){
    $flag=false;
}

if(isset($_GET['hii'])){
    $flag=True;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="info.html">Info</a>
            <a href="student.php">Student Login</a>
            <a href="admin.php">Admin</a>
        </div>


            <?php //if($flag){?>
                
        <div class="login">
            <h1>ADMIN LOGIN</h1>
            <form action="" method="POST" enctype="multipart/form-data">

                <div>
                    <label for email>USERNAME*</label><br>
                    <input type="email" name="email" required /><br>
                </div>

                <div>
                    <label for password>PASSWORD*</label><br>
                    <input type="password" name="name" required /><br>
                </div>
                <div style="display: flex;">
                    <input id="no" type="checkbox" name="rem" />Remember me<br>
                </div>

                <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
                <!-- <p>Don't you have an account?</p>
                <p><a href="admin.php?hello==True">SIGNUP</a></p> -->
            </form>
            <?php// } ?>

          

                <?php // if(!$flag){?> 
                    <!-- <div class="login">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for email>Username*</label><br>
                        <input type="email" name="email" required /><br>
                    </div>

                    <div>
                        <label for password>PASSWORD*</label><br>
                        <input type="password" name="name" required /><br>
                    </div>
                    <div style="display: flex;">
                        <input id="no" type="checkbox" name="rem" />Remember me<br>
                    </div>

                    <button class="btn btn-primary" type="submits" name="submit">SIGNUP</button>
                    <p>Already have an account?</p>
                    <p><a href="admin.php?hii==True">LOGIN</a></p>


                </form> -->
                <?php //}?>
            </div>
            <?php
                    if(isset($_POST['submit'])){
                        $user=$_POST['email'];
                        $pw=$_POST['name'];
                        if($user=="badri@gmail.com" && $pw=="123"){
                            $_SESSION['login']=$user;
                            header("Location:createcollege.php");
                            exit();
                        }
                        else{
                            echo"<div class='error'>
                            <p>INVALID LOGIN CREDENTIALS</p>
                            </div>";
                        }
                    } 
                    ?>
            <div class="footer">
                <p></p>
            </div>

</body>

</html>