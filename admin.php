<?php
session_start();
 // $conn = mysqli_connect("localhost", "root", "root", "Car");
include 'connect.php';
 if (isset($_POST['submit'])) { 
		$name = $_POST['uname'];
		$pass = $_POST['pass'];
		$result = ("select * FROM admin WHERE name = '$name' and pass = '$pass' ") or die();
		$search_result=mysqli_query($conn, $result);
		if ($search_result->num_rows > 0) {
    		# code...
			$_SESSION['use'] = $name;
			header("location: home.php");
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
</html>

  <body>
  	<ul class="nav nav-pills nav-justified">
		<li role="presentation"><a href="index.php">User Panel</a></li>
		<li role="presentation" class="active"><a href="admin.php">admin</a></li>
	</ul>
    <div class="jumbotron">
      <h1 style="text-align: center;">Customers Mechanical Services</h1>
    </div>
    <div id="container" class="container">
      <h1>Admin Login Here</h1>
      <form action="#" method="post" name="login">
        <table class="table " width="400">
          <tr>
            <th>UserName or Email:</th>
            <td>
              <input type="text" name="uname" required>
            </td>
          </tr>
          <tr>
            <th>Password:</th>
            <td>
              <input type="password" name="pass" autocomplete="off" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn btn-success" type="submit" name="submit" value="Login" onclick="return(submitlogin());">
            </td>
          </tr>
        </table>
      </form>
      <tr style="align-items: center;">
          <td>&nbsp;</td>
          <td><a href="index.php">Register new user</a></td>
      </tr>
    </div>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.emailusername.value == "") {
          alert("Enter email or username.");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password.");
          return false;
        }
      }
    </script>


  </body>