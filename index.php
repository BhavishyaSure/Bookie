<!DOCTYPE html>
<html lang="en">
<head>
	<title>Crud App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<body style="background:#CCC;">
	<?php
	session_start();
	 if(isset($_SESSION['User']))
    {
	//add dbconnect
	include('dbconnect.php');
	//create query 
	$uname = $_SESSION['User'];
	$query = "SELECT * FROM books WHERE uname='$uname'";
	$result = mysqli_query($conn ,$query);
	?>
	<div class="container bg-primary" style="padding-top: 20px; padding-bottom: 20px">
		<h3>bootstrap and php crud app</h3>
			<div class="row">
				<div class="col-sm-4">
					<h3>Insert Books Form</h3>
					<form role="form" action="insert.php" method="post">
						<div class="form-group">
							<label>Book Title</label>
							<input type="text" name="btitle" class="form-control">
						</div>
						<div class="form-group">
							<label>Book Price</label>
							<input type="text" name="bprice" class="form-control">
						</div>
						<button type="submit" class="btn btn-info btn-block">Add Books</button>
					</form>
				</div>
				<div class="col-sm-8">
					<h3>Display All Record Table</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Book Title</th>
								<th>Book Price</th>
								<th>Crud Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							 while ($row = mysqli_fetch_assoc($result)) {
							 	# code..

							?>
							<tr>
							<td><?php echo $row['book_title'];?></td>
							<td><?php echo $row['book_price'];?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['book_id']; ?>" class="btn btn-success" role="button">Edit Book</a>
								<a href="delete.php?id=<?php echo $row['book_id']; ?>" class="btn btn-danger" role="button">Delete Book</a>
							</td>
						</tr>
						<?php
						}
						mysqli_close($conn);
						?>
						</tbody>
					</table>
					</div>
			</div>
	</div>
	<?php
	 echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:login.php");
    }
 
?>
</body>
</html>