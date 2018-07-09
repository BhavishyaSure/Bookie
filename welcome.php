<?php
    session_start();
    if(isset($_SESSION['User']))
    {
    	$uname = $_SESSION['User'];
        echo ' Well Come ' .$uname .'<br/>';
        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        echo "Welcome for further crud applications login to Enter";
        ?>
        <!DOCTYPE html>
        <html>
        <body>
        	<form action="login.php">
        		<button name="Login">Click to Login</button>
        	</form>
        </body>
        </html>
        <?php
    }
 
?>