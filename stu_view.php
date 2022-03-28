<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student View</title>
    <link rel="stylesheet" href="stu_view.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="student_area.php">Add Another</a>
            <a href="student.php">Contact us</a>
            <a href="admin.php">Logout</a>
        </div>
        <form class="main-div" action="" method="post">
            <table class="table" id="mytable">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Dob</th>
                    <th scope="col">YOP</th>
                    <th scope="col">Cut-off</th>
                    <th scope="col">Caste</th>
                    <th scope="col">Dept</th>
                </tr>
                <?php
                include "connection.php";
                $edit='edit';
                $id=$_REQUEST['id'];
  
                $sql="SELECT * from student_details where id='$id';";
                $res=mysqli_query($conn,$sql);

                while($row=mysqli_fetch_assoc($res)){
               
            
                ?>
                <tr>
                    <th scope="col"><?php echo $row['name']; ?></th>
                    <th scope="col"><?php echo $row['dob']; ?></th>
                    <th scope="col"><?php echo $row['yop']; ?></th>
                    <th scope="col"><?php echo $row['cut_off']; ?></th>
                    <th scope="col"><?php echo $row['caste']; ?></th>
                    <th scope="col"><?php echo $row['dept']; ?></th>
                    <th scope="col"><a href="stu_update.php?id=<?php echo $id;?>"><?php echo $edit;}?></a></th>
                </tr>
            </table>
            <p id="center">Here the Colleges/Department eligibility for your marks</p>
            <table class="table" id="mytable">

                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Dept</th>
                    <th scope="col">Caste</th>
                    <th scope="col">Cut-off</th>

                    <th scope="col">Seats avail</th>
                    <th scope="col">Seats booked</th>
                    <?php
                    
                    $id1=$_REQUEST['id'];
                    
                    $query="SELECT * from student_details where id=$id1;";
                    $resp=mysqli_query($conn,$query);
                    while($row1=mysqli_fetch_assoc($resp)){
                     $cast=$row1['caste'];
                    $cut=$row1['cut_off'];
                    $de=$row1['dept'];
                    
                    $q="SELECT * from details  where  caste='$cast' AND cut_off<=$cut AND department='$de';";
                     $r=mysqli_query($conn,$q);
                    if($r->num_rows>0){
                     while($e=mysqli_fetch_assoc($r)){
                     
                ?>

                  
                </tr>

            <tr>
                <th scope="col"><?php echo $e['college_name'];?></th>
                <th scope="col"><?php echo $e['department'];?></th>
                <th scope="col"><?php echo $e['caste'];?></th>
                <th scope="col"><?php echo $e['cut_off'];?></th>
                <th scope="col"><?php echo $e['seats_available'];?></th>
                <th scope="col"><?php echo $e['seats_booked'];}?></th>


                </tr>

            </table>

            <?php  }else {?>
                <p style="text-align: center; transform: translateY(100px);font-weight:bolder;font-size:13px ">OOPS! There is no colleges available for your mark...</p>
            <?php }} ?>
        </div>
       

    </div>
    
    </div>
</body>

</html>