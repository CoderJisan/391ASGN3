<?php 
session_start();
// $conn = mysqli_connect("localhost", "root", "root", "Car");
include 'connect.php';
if($conn){
    if ($_SESSION['use']) {
        # code...
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            // echo $id;
            $update = true;
            if (isset($_POST['submit'])) {
                // $name = $_POST['name'];
                // $phone = $_POST['phone'];
                // $reg = $_POST['regnum'];
                $up_date = $_POST['date'];
                $mechanic = $_POST['mechanic'];

                $try =  mysqli_query($conn, "UPDATE car SET  day = '$up_date', mechanic = '$mechanic' WHERE uid=$id");
    // uname = '$name', num = '$phone', regNum = 'reg',
                $_SESSION['message'] = "Address updated!"; 
                if (!$try) {
        # code...
                    header('location: home.php');
                }
            }else{
                // header("location: index.php");
            }
        }

    }
    // session_destroy();
    else{
        header("location: admin.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <form class="form-horizontal" method="post" name="user" style="padding-top: 20px;padding-right: 10px;">
  <!-- <div class="form-group">
    <label class="control-label col-sm-2" for="email">Customer's Name: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Customer's Name" name="name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Customer's Phone: </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="phone" placeholder="Your Phone Number" name="phone" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Customer's Car Registration Number: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="regnum" placeholder="Car Registration Number" name="regnum" required>
    </div>
</div> -->
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Appointment Date: </label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="date" placeholder="Appointment Date" name="date"  required>
  </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Customer's Preffered Mechanic Name: </label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control" id="mechanic" placeholder="Preffered Mechanic" name="mechanic" required>
  </div>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
    </div>
</div>
</div>
<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-6 col-md-6">
      <button type="submit" class="btn btn-default btn-success" name="submit">Save</button>
  </div>
</div>
</form>
<div>
    <div class="col-sm-offset-2 col-sm-6"  style="padding-bottom: 20px;">
      <a href="home.php"><button class="btn btn-default btn-warning">Back</button></a>
  </div>
</div>

<div class="form-group" style="padding-left: 30%;"> 
    <div class="col-sm-offset-2 col-sm-10">
      <a href="logout.php"><button type="submit" class="btn btn-default btn-danger" name="submit">Log Out</button>
      </div>
  </div>
<!--   <?php
   // include('footer.php');
?> -->
</body>
</html>