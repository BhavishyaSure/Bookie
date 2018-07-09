<?php
include('dbconnect.php');
$id = $_GET['bookid'];
$title = $_GET['btitle'];
$price = $_GET['bprice'];
// create query
$query = "UPDATE books SET book_title='$title' , book_price='$price' WHERE book_id='$id'";
if(mysqli_query($conn , $query)){
	//echo "Record updated successfully";
	//Redirect your page form edit.php to index.php
	header("Location:index.php");
}
else
{
	echo "Error in Your query " . mysqli_error($conn);
}
mysqli_close($conn);
?>