<?php
include "connection.php";
session_start();

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $yop=$_POST['yop'];
    $cutoff=$_POST['cutoff'];
    $caste=$_POST['caste'];
    $dept=$_POST['dept'];

    $sql="INSERT into student_details(name,dob,yop,cut_off,caste,dept) VALUES ('$name','$dob','$yop','$cutoff','$caste','$dept');";

    $res=mysqli_query($conn,$sql);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student area</title>
    <link rel="stylesheet" href="stu_area.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
        crossorigin="anonymous">

</head>

<body>

    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="info.html">Update Record</a>
            <a href="stu_view.php?id=<?php echo $_SESSION['id']?>">View records</a>
            <a href="admin.php">Logout</a>
        </div>

        <form class="main-div" action="" method="post">
            <h1 style="text-align: center;">Student Interface</h1>
            <div>
                <label for="Name">Name</label>
                <input class="form-control" type="text" name="name" />
            </div>
            <div>
                <label for="Dob">DOB</label>
                <input class="form-control" type="date" name="dob" />
            </div>
            <div>
                <label for="YOP">Year of Passed out</label>
                <input class="form-control" type="text" name="yop" />
            </div>
            <div>
                <label for="cutoff">Cutoff</label>
                <input class="form-control" type="text" name="cutoff" />
            </div>
            <div>
                <label for="caste">Caste</label>
                <select class="form-control" name="caste">
                    <option>Select any one...</option>
                    <option value="BC">BC</option>
                    <option value="MBC">MBC</option>

                </select>
            </div>
            <div>
                <label for="Dept">Desire dept</label>
                <select class="form-control" name="dept">
                    <option>Select any one...</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Physics">Physics</option>

                </select>
            </div>
            <?php
            if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $sql1="SELECT * from student_details where name='$name';";
            $res1=mysqli_query($conn,$sql1);
            while($row=mysqli_fetch_assoc($res1)){
                header('Location: stu_view.php?id='.urlencode($row['id']));
                exit;
            }}?>


            <div>
                <button class="btn btn-primary" name="submit">Search
                    for college</button>
            </div>


        </form>
        <div class="footer">
            <p></p>
        </div>


    </div>

</body>

</html>