<?php

include "connection.php";
if(isset($_POST['submit'])){
    $id=$_REQUEST["id"];
    $clgnm=$_POST['collegename'];
    $dept=$_POST['deptname'];
    $stream=$_POST['stream'];
    $cutoff=$_POST['cutoff'];
    $caste=$_POST['caste'];
    $seats_avail=$_POST['seats'];
    $seats_book=$_POST['booked'];

    $update="UPDATE details set college_name='$clgnm',department='$dept',stream='$stream',cut_off='$cutoff',caste='$caste',seats_available='$seats_avail',seats_booked='$seats_book' where id='$id';";
    $res=mysqli_query($conn,$update);

    if ($res) header('Location: showadmin.php');
    else echo $conn->error;
  
    }
    
$edit="edit";
$delete="delete";

$sql="SELECT * from details";
$res=$conn->query($sql);

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet" href="adminshow.css" type="text/css" />
    <link rel="stylesheet" href="edit.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="createcollege.php">Insert new</a>
            <a href="showadmin.php">View Records</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="show">
            <h1>Admin page</h1>

            <form class="search" action="" method="post">
                <p>View Details here</p>

                <div>
                    <p>Department</p>
                    <select class="form-control" name="depttype">
                        <option value="" selected='selected'>select any..</option>
                        <option value="physics">Physics</option>
                        <option value="Computer Science">Computer Science</option>
                    </select>

                    <p>Caste</p>
                    <select class="form-control" name="castetype">
                        <option value="" selected='selected'>select any..</option>
                        <option value="BC">BC</option>
                        <option value="MBC">MBC</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="search">Search</button>


            </form>











            <div class="contents">
                <table class="table" id="mytable">
                    <tr>
                        <th scope="col">College</th>
                        <th scope="col">Dept</th>
                        <th scope="col">Stream</th>
                        <th scope="col">Cut-off</th>
                        <th scope="col">Caste</th>
                        <th scope="col">Seats available</th>
                        <th scope="col">Booked</th>
                    </tr>
                        <?php  if(isset($_POST['search'])){
                            $selected_depttype=$_POST['depttype'];
                            $selected_castetype=$_POST['castetype'];
                
                            $query="SELECT * from details WHERE department='$selected_depttype' OR caste='$selected_castetype';";
                
                            $result1=mysqli_query($conn,$query);
                            if($result1->num_rows>0){
                            while($r=mysqli_fetch_assoc($result1)){?>
                        <tr>
                        <th scope="col"><?php echo $r['college_name'] ; ?></th>
                        <th scope="col"><?php echo $r['department'];?></th>
                        <th scope="col"><?php echo $r['stream'];?></th>
                        <th scope="col"><?php echo $r['cut_off'];?></th>
                        <th scope="col"><?php echo $r['caste'];?></th>
                        <th scope="col"><?php echo $r['seats_available'];?></th>
                        <th scope="col"><?php echo $r['seats_booked'];?></th>
                        <th scope="col" id="edit">
                            <a href="?id=<?php echo $r['id'];?>" style="cursor: pointer;">
                                <?php echo $edit;?></a>
                        </th>
                        <th scope="col" id="edit">
                            <a href="delete.php?id=<?php echo $r['id'];?>" style="cursor: pointer;">
                                <?php echo $delete;?></a>
                        </th>


                        <?php }} else { ?>
                        <p style="text-align: center; transform: translateY(100px) ">No records found...</p>
                        <?php }} ?>

                    </tr>

                    <?php
                    if (!isset($_POST['search'])) {
                     while($row=$res->fetch_assoc()){?>

                    <tr>
                        <th scope="col"><?php echo $row['college_name'] ; ?></th>
                        <th scope="col"><?php echo $row['department'];?></th>
                        <th scope="col"><?php echo $row['stream'];?></th>
                        <th scope="col"><?php echo $row['cut_off'];?></th>
                        <th scope="col"><?php echo $row['caste'];?></th>
                        <th scope="col"><?php echo $row['seats_available'];?></th>
                        <th scope="col"><?php echo $row['seats_booked'];?></th>
                        <th scope="col" id="edit">
                            <a href="?id=<?php echo $row['id'];?>" style="cursor: pointer;">
                                <?php echo $edit;?></a>
                        </th>
                        <th scope="col" id="edit">
                            <a href="delete.php?id=<?php echo $row['id'];?>" style="cursor: pointer;">
                                <?php echo $delete;}}?></a>
                        </th>


                    </tr>

                </table>
            </div>



            <?php  
            if (isset($_GET['id'])) { 


            $id=$_REQUEST['id'];
            $view="SELECT * FROM details where id='$id';";
            $res=mysqli_query($conn,$view);
            $row=mysqli_fetch_assoc($res);
            
            ?>

            <form class="edit-contents" action="" method="post" id="hidden">
                <div>
                    <label for="collegename">College Name</label>
                    <input type="text" name="collegename" value="<?php echo $row['college_name'];?>" />
                </div>
                <div>
                    <label for="deptname">Department</label>
                    <input type=" text" name="deptname" value="<?php echo $row['department'];?>" />
                </div>
                <div>
                    <label for="stream">Stream</label>
                    <input type="text" name="stream" value="<?php echo $row['stream'];?>" />
                </div>
                <div>
                    <label for="cutoff">Cutoff</label>
                    <input type="text" name="cutoff" value="<?php echo $row['cut_off'];?>" />
                </div>
                <div>
                    <label for="caste">Caste</label>
                    <input type="text" name="caste" value="<?php echo $row['caste'];?>" />
                </div>
                <div>
                    <label for="seats">Seats available</label>
                    <input type="text" name="seats" value="<?php echo $row['seats_available'];?>" />
                </div>
                <div>
                    <label for="booked">Booked seats</label>
                    <input type="text" name="booked" value="<?php echo $row['seats_booked'];?>" />
                </div>
                <button href="?" class="btn btn-primary" name="submit">Update</button>
            </form>

        </div>

        <?php } ?>


    </div>
    <div class=" footer">
        <p></p>
    </div>
    </div>


</body>

</script>


</html>