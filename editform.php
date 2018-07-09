<!DOCTYPE html>
<html lang="en">
<head>
	<title>Crud App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
</head>
<body>
	<?php
	$id = $_GET['id'];
	//add dbconnect.php
	include('dbconnect.php');
	//create query
	$query = "SELECT * FROM books WHERE book_id = '$id'";
	$result = mysqli_query($conn, $query);	

	?>
	<div class="container-bg-info" style="padding-top: 20px; padding-bottom: 20px;">
		<h3>Edit Book Form</h3>
		<form role="form" action="edit.php" method="get">
			<?php
			while($row = mysqli_fetch_assoc($result))
			{
			?>
			<input type="hidden" name="bookid" value="<?php  echo $row['book_id']; ?>">
			<div class="form-group">
				<label>Book Title</label>
				<input type="text" name="btitle" class="form-control" value="<?php  echo $row['book_title']; ?>">
			</div>
			<div class="form-group">
				<label>Book Price</label>
				<input type="text" name="bprice" class="form-control" value="<?php  echo $row['book_price']; ?>">
			</div>
			<button type="submit" class="btn bg-success btn-block">Edit Book</button>
			<?php
				}
				mysqli_close($conn);
			?>
		</form>
	</div>
</body>
</html>