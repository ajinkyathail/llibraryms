

<?php
include('dbconn.php');
$BookId=$_GET['id'];
mysqli_query($conn,"delete from LMS.book where BookId='$BookId'") or die(mysqli_error());
header('location:member.php');
?>