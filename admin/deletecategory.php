<?php
require('dbconn.php');

$Id=$_GET['id'];

$sql="DELETE FROM lms.tblcategory WHERE `tblcategory`.`Id` = '$Id'";
if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=category.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=category.php", true, 303);

}

?>