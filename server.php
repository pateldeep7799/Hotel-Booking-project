<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
include("db.php");

// REGISTER USER
if (isset($_POST['reg_user'])) {
 
  // receive all input values from the form
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
      
  	$result = mysqli_query($con, $query);
    $insertedrecords = mysqli_fetch_assoc($result);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";

    // $to = "chintansuthar2222@gmail.com";
    // $subject = "Sun planet Hotel ~ Registration Approval mail!!!";
    // $message = "Dear ".$username.",";
    // $message .= "\n\n Your registration insert in our system successfully!!! \n";
    // $message .= "\n\n Please click below link to approval your account.\n";
    // $message .= "\n\n Please click below link to approval your account.\n";
    // $message .= "http://localhost/Hotel/useractive.php?id=".$insertedrecords['id'];
    // $message .= " Thank you\n";
    // $message .= " Sun planet Hotel\n";
    // $from = "admin@admin.com";
    // $headers = 'From: Sun planet Hotel <chintansuthar2222@gmail.com>' . "\r\n" .
    // 'Reply-To: chintansuthar2222@gmail.com\r\n' .
    // 'X-Mailer: PHP/' . phpversion();
    // $mailstatus = mail($to, $subject, $message, $headers);

  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
   
  $username = mysqli_real_escape_string($con, $_POST['emailid']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$username' AND password='$password'";

  	$results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  /*   $rows_count = mysqli_num_rows($results);
         
  	if ($rows_count > 0) {
       $rows = mysqli_fetch_row($results);
       
        $userdata = [
            'emailaddress' => $rows[2],
            'username' => $rows[1]
        ];
  	  $_SESSION['userdata'] = $userdata;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	} */
  }
}
?>