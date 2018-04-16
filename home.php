<?php
session_start();
if(!isset($_SESSION['use'])){
  header("location: admin.php");
}else{
  // $conn = mysqli_connect("localhost", "root", "root", "Car");
  include 'connect.php';
  $search_query="SELECT * FROM car";
  $search_result=mysqli_query($conn, $search_query);
}
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Customer's Name</th>
        <th scope="col">Customer's Phone Number</th>
        <th scope="col">Customer's Car Registration Number</th>
        <th scope="col">Preffered Date</th>
        <th scope="col">Preffered Mechanic</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_array($search_result)) {
          # code...
          echo "<tr>";
            echo "<td>".$row['uid']."</td>";
            echo "<td>".$row['uname']."</td>";
            echo "<td>".$row['num']."</td>";
            echo "<td>".$row['regNum']."</td>";
            echo "<td>".$row['day']."</td>";
            echo "<td>".$row['mechanic']."</td>";
            echo "<td><a href=update.php?edit=".$row['uid']."><button type='button' class='btn btn-success'>Update</button></a></td>";
            echo "<td><a href=delete.php?delete=".$row['uid']."><button type='button' class=
            'btn btn-danger'>Delete</button></a></td>";
          echo "</tr>";
        }
       // }
      ?>
    </tbody>
  </table>
  <div class="form-group" style="padding-left: 25%;">
      <div class="col-sm-offset-2 col-sm-10">
        <a href="logout.php"><button type="submit" class="btn btn-default" name="submit">Sign out</button></a>
      </div>
    </div>
</body>
</html>
