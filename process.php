<?php
session_start();
$uname = "";
$email    = "";
$errors = array(); 
include('dbconnect.php');
if(isset($_POST['Register']))
{
//    header("location:register.php");
    $uname = $_POST['uname'];
  $phno = $_POST['phno'];
  $email = $_POST['email'];
  $upass = $_POST['upass'];
  $upass1 = $_POST['upass1'];
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($uname)) { array_push($errors, "Username is required"); }
  if (empty($phno)) { array_push($errors, "Phonenumber is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($upass)) { array_push($errors, "Password is required"); }
  if ($upass != $upass1) 
  {
  array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE uname='$uname' OR email='$email' LIMIT 1";
  $result = mysqli_query($dbname, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['uname'] === $uname) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $upass = md5($upass);//encrypt the password before saving in the database

//create query
$query = "INSERT INTO users( 
 uname , phno , email , upass) VALUES('$uname' , '$phno' , '$email' , '$upass') ";
 if (mysqli_query($conn ,$query)) {
  $_SESSION['User']=$_POST['uname'];
  $_SESSION['success'] = "You are now logged in";
  header("Location:index.php");
}
 }
}
else
{
    if(isset($_POST['Login']))
    {
       if(empty($_POST['uname']) || empty($_POST['upass']))
       {
            header("location:login.php?Empty= Please Fill in the Blanks");
       }
       if (count($errors) == 0) 
       {
           $upass = $_POST['upass'];
           $upass = md5($upass);
            $query="select * from users where uname='".$_POST['uname']."' and upass='$upass'";
            $result=mysqli_query($conn,$query);
            if (mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['uname'];
                $_SESSION['success'] = "You are now logged in";
                header("location:index.php");
            }
            else
            {
                array_push($errors, "Wrong username/password combination");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }
  }
?>