<?php
//add dbconnect
include('dbconnect.php');
session_start();
if(isset($_SESSION['User']))
{
$title = $_POST['btitle'];
$price = $_POST['bprice'];
$uname = $_SESSION['User'];

//create query
$query = "INSERT INTO books( 
 book_title , book_price , uname) VALUES('$title' , '$price' , '$uname') ";
 if (mysqli_query($conn ,$query)) {
 	# code...
 	header("Location:index.php");
 }
 else{
 	echo "Error In Query" . mysqli_error($conn);
 }
echo '<a href="logout.php?logout">Logout</a>';
}
else
{
        header("location:login.php");
}
mysqli_close($conn);
?>