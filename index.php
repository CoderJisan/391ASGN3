<?php
session_start();
if (!isset($_SESSION['count'])) {
  # code...
  $_SESSION['count'] = 0;
}
elseif ($_SESSION['count'] > 4) {
  # code...
  header("location: warn.php");
  $_SESSION['c'] = 0;
  $_SESSION['lastvisit'] = time();
}
else{
  $_SESSION['count']++;
  include 'connect.php';
  if (isset($_POST['submit'])) {
    # code...

    // $_SESSION['count']++;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $reg = $_POST['regnum'];
    $launch_date = $_POST['date'];
    $mechanic = $_POST['mechanic'];
    $sql = mysqli_query($conn,"INSERT into car (uname, num, regNum, day, mechanic) VALUES('$name', '$phone', '$reg', '$launch_date', '$mechanic')");
    if(!$sql){
      echo "string";
      header('location: index.php');
    }
    else{
      mysqli_close();
      header('location: index.php');
      exit();
    }
    session_destroy();
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
  <ul class="nav nav-pills nav-justified">
    <li role="presentation" class="active"><a href="#">User Panel</a></li>
    <li role="presentation"><a href="admin.php">admin</a></li>
  </ul>
  <form class="form-horizontal" method="post" name="user" autocomplete="off" style="padding-top: 20px;padding-right: 10px;">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Your Name: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone: </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="phone" placeholder="Your Phone Number" name="phone" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Car Registration Number: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="regnum" placeholder="Car Registration Number" name="regnum" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Appointment Date: </label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="date" placeholder="Appointment Date" name="date"  required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Preffered Mechanic Name: </label>
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
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </div>
  </div>
</form>
</body>
</html>