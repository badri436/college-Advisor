<?php
include "connection.php";
if(isset($_POST['submit'])){
    $id=$_REQUEST["id"];
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $cutoff=$_POST['cutoff'];
    $caste=$_POST['caste'];
    $dept=$_POST['dept'];
   

    $update="UPDATE student_details set name='$name',dob='$dob',cut_off='$cutoff',caste='$caste',dept='$dept' where id='$id';";
    $res=mysqli_query($conn,$update);

    if ($res) header('Location: stu_view.php?id='.urlencode($id));
    else echo $conn->error;
  
    }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stu_update.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="info.html">Update Record</a>
            <a href="student.php">Contact us</a>
            <a href="admin.php">Logout</a>
        </div>

        <?php
        include "connection.php";
            if (isset($_GET['id'])) {


            $id=$_REQUEST['id'];
            $view="SELECT * FROM student_details where id='$id';";
            $res=mysqli_query($conn,$view);
            while($row=mysqli_fetch_assoc($res)){

            ?>

        <form class="edit-contents" action="" method="post" id="hidden">
            <div>
                <label for="name"> Name</label>
                <input class="form-control" type="text" name="name" value="<?php echo $row['name'];?>" />
            </div>
            <div>
                <label for="dob">DOB</label>
                <input class="form-control" type="date" name="dob" value="<?php echo $row['dob'];?>" />
            </div>
            <div>
                <label for="cut_off">Cut_off</label>
                <input class="form-control" type="text" name="cutoff" value="<?php echo $row['cut_off'];?>" />
            </div>
            <div>
                <label for="cutoff">Caste</label>
                <input class="form-control" type="text" name="caste" value="<?php echo $row['caste'];?>" />
            </div>
            <div>
                <label for="dept">Department</label>
                <input class="form-control" type="text" name="dept" value="<?php echo $row['dept'];}}?>" />
            </div>
            <button href="?" class="btn btn-primary" name="submit">Update</button>
        </form>
        <div class="footer">
            <p></p>
        </div>
    </div>

</body>

</html>