<?php
require('dbconn.php');

$rollno=$_GET['id'];

$sql="DELETE FROM lms.user WHERE `user`.`RollNo` = '$rollno'";
if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=student.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=student.php", true, 303);

}



try {
    if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=student.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=student.php", true, 303);

}

    // checkNum(2);
    // //If the exception is thrown, this text will not be shown
    // echo 'If you see this, the number is 1 or below';
  }
  
  //catch exception
  catch(Exception $e) {


    // echo 'Message: ' .$e->getMessage();
  }

?>