<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Library Management System</title>
  </head>
  <body>
  <?php
require('dbconn.php');
?>
    <!-- Login & Registration Form -->
    <div class="form-box">
      <h1>Login / Registration</h1>
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="moveLogin()">
          Log In
        </button>
        <button type="button" class="toggle-btn" onclick="moveRegister()">
          Register
        </button>
      </div>

      <!-- Login Form -->
      <form action="index.php" method="post" id="login" class="input-group">
      
      <input type="text" class="input-field" Name="RollNo" placeholder="RollNo" required="">
			<input type="password" class="input-field" Name="Password" placeholder="Password" required="">
			
      <!-- <input type="text" class="input-field" placeholder="User Id" required />
        <input
          type="password"
          class="input-field"
          placeholder="Password"
          required
        /> -->
        <div id="check-box-group">
          <input type="checkbox" class="checkbox" />
          <span> Remember Password</span>
        </div>
      
        <button type="submit" name="signin"; value="Sign In" class="submit-btn">Log In</button>
      </form>

      <!-- Registration Form -->
      <form action="index.php" method="post" id="register" class="input-group">
        <input type="text" class="input-field" Name="Name" placeholder="Name" required>
				<input type="text" class="input-field" Name="Email" placeholder="Email" required>
				<input type="password" class="input-field" Name="Password" placeholder="Password" required>
				<input type="text" class="input-field" Name="PhoneNumber" placeholder="Phone Number" required>
				<input type="text" class="input-field" Name="RollNo" placeholder="Roll Number" required="">
				
        <br>
				<select name="Category" ">
					<option value="School">School</option>
					<option value="Diploma">Diploma</option>
					<option value="UG">UG</option>
					<option value="PG">PG</option>
				</select>
				<br>
       
       
       
       
       
        <!-- <input type="text" class="input-field" placeholder="User Id" required />
        <input type="email" class="input-field" placeholder="Email" required />
        <input
          type="password"
          class="input-field"
          placeholder="Password"
          required
        /> -->
        <div id="check-box-group">
          <input type="checkbox" class="checkbox" />
          <span> I agree to the Terms and Conditions</span>
        </div>
        <?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

        <button type="submit" name="signup" value="Sign Up" class="submit-btn">Register</button>
      </form>
    </div>

    <!-- Script -->
    <script src="script.js"></script>

  </body>
</html>
