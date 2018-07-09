<?php
$bid = $_GET['id'];
include('dbconnect.php');
//create query
$query = "DELETE FROM books WHERE book_id='$bid'";
if(mysqli_query($conn , $query)){
	//echo "record deleted";
	//redirect page to index.php
	header("Location:index.php");
}
else
{
	echo "Error in your query" . mysqli_error($conn);
}
mysqli_close($conn);
?>