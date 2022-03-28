<?php
include "connection.php";
session_start();
$flag=True;

if(isset($_GET['hello'])){
    $flag=false;
}

if(isset($_GET['hii'])){
    $flag=True;

  
}

 


if(isset($_POST['signup'])){
  $name=$_POST['name'];
  $mail=$_POST['email'];
  $pwd=$_POST['psw'];

  $sql="INSERT into stu_signup(student_name,email,password) values('$name','$mail','$pwd');";
  $res=mysqli_query($conn,$sql);
  if($res){
    $_SESSION['stu_login']=$mail;
    header("Location: student_area.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <link rel="stylesheet" href="student.css" type="text/css" />
</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="info.html">Info</a>
            <a href="student.php">Student Login</a>
            <a href="admin.php">Admin</a>
        </div>

        <?php
        if(isset($_POST['signin'])){
  
          $mail=$_POST['email'];
          $pwd=$_POST['pwd'];
        
          $sql="SELECT * from stu_signup;";
          $res1=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($res1)){
            if($row['email']==$mail && $row['password']==$pwd){
                $_SESSION['id']=$row['id'];
              header("Location: student_area.php");
            }
            else{
              echo "<div class='error'>";
              echo"<p>Invalid Login Credentials...!</p>";
              echo "</div>";


            }}}
    ?>
 <?php if($flag){?>
                <div class="login">
            <h1>Student Login</h1>
            <form action="" method="post" enctype="multipart/form-data" class="form">

                <div>
                    <label for email>User-mail*</label><br>
                    <input type="email" name="email" required /><br>
                </div>

                <div>
                    <label for password>PASSWORD*</label><br>
                    <input type="password" name="pwd" required /><br>
                </div>
                <div style="display: flex;">
                    <input id="no" type="checkbox" name="rem" />Remember me<br>
                </div>

                <button class="btn btn-primary" name="signin">LOGIN</button>
                <p>Don't you have an account?</p>
                <p><a href="student.php?hello==True">SIGNUP</a></p>
            </form>

            <?php } ?>
        </div>

       

            <?php if(!$flag){?>
                <div class="login">
                <h1>Student Signup</h1>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <div>
                    <label for name>Name*</label><br>
                    <input type="text" name="name" required /><br>
                </div>

                <div>
                    <label for email>E-mail*</label><br>
                    <input type="email" name="email" required /><br>
                </div>

                <div>
                    <label for password>Password*</label><br>
                    <input type="password" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        name="psw" required /><br>
                </div>
                <div style="display: flex;">
                    <input id="no" type="checkbox" name="rem" />Remember me<br>
                </div>

                <button class="btn btn-primary" type="submit" name="signup">SIGNUP</button>
                <p>Already have an account?</p>
                <p><a href="student.php?hii==True">LOGIN</a></p>



            </form>




            <?php } ?>
        </div>

        <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>


        <div class="footer">
            <p></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>

    <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
    </script>
</body>

</html>