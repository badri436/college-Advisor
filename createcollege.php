<?php
include "connection.php";
include "session.php";


if($conn->connect_error){
    echo "unable to connect";
}

if(isset($_POST['submit'])){
    $clgnm=$_POST['collegename'];
    $dept=$_POST['deptname'];
    $stream=$_POST['stream'];
    $cutoff=$_POST['cutoff'];
    $caste=$_POST['caste'];
    $seats_avail=$_POST['seats'];
    $seats_book=$_POST['booked'];

    $sql="INSERT INTO details (`college_name`,`department`,`stream`,`cut_off`,`caste`,`seats_available`,`seats_booked`) VALUES('$clgnm','$dept','$stream','$cutoff','$caste','$seats_avail','$seats_book');";
    $result=$conn->query($sql);

    if($result){
        echo "sucess";
        header("Location:showadmin.php");
    }
    else{
        echo "failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="create.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="nav">
            <a href="predictor.html">Home</a>
            <a href="showadmin.php">View Records</a>
            <a href="student.php">Student Login</a>
            <a>Admin</a>
        </div>
        <div>
            <h1 style="text-align: center;">ADMIN PAGE</h1>
        </div>
        <form class="contain" method="POST" action="" enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="validationServer01" class="form-label">College Name</label>
                <input type="text" name="collegename" class="form-control is-valid" id="validationServer01" value="Mark"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationServer02" class="form-label">Department</label>
                <input type="text" name="deptname" class="form-control is-valid" id="validationServer02" value="Otto"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">Stream</label>
                <div class="input-group has-validation">
                    <select class="form-select is-invalid" name="stream" id="validationServer04"
                        aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Choose...</option>
                        <option>AIDED</option>
                        <option>SELF-FINANCE(morning)</option>
                        <option>SELF-FINANCE(evening)</option>
                    </select>

                </div>

            </div>

            <div class="col-md-4">
                <label for="validationServer03" class="form-label">CUT-OFF</label>
                <input type="text" name="cutoff" class="form-control is-invalid" id="validationServer03"
                    aria-describedby="validationServer03Feedback" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    Please provide a required cut-off.
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">CASTE</label>
                <div class="input-group has-validation">
                    <select class="form-select is-invalid" name="caste" id="validationServer04"
                        aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Choose...</option>
                        <option>BC</option>
                        <option>MBC</option>
                        <option>SC/ST</option>
                        <option>GENERAL</option>
                        <option>CHRISTIAN</option>

                    </select>

                </div>
            </div>
            <div class="col-md-4">
                <label for="validationServer05" class="form-label">SEATS AVILABLE</label>
                <input type="text" name="seats" class="form-control is-invalid" id="validationServer05"
                    aria-describedby="validationServer05Feedback" required>

            </div>
            <div class="col-md-4">
                <label for="validationServer05" class="form-label">SEATS BOOKED</label>
                <input type="text" class="form-control is-invalid" name="booked" id="validationServer05"
                    aria-describedby="validationServer05Feedback" required>

            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3"
                        aria-describedby="invalidCheck3Feedback" required>
                    <label class="form-check-label" for="invalidCheck3">
                        Agree to terms and conditions
                    </label>
                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
            </div>

        </form>


        <div class="footer">
            <p></p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
</script>

</html>