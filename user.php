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
    // $set = mysqli_connect("localhost", "root", "root", "Car");
// if (($_SESSION['count']) > 5) {
//   # code...
//   echo "string2";
//   $_SESSION['count'] = 0;
// }

?>
