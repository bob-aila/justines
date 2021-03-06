<?php
//require_once("../includes/initialize.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="cssa/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cssa/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php
if (isset($_POST['btnlogin'])) {
    //form has been submitted1
    
    $uname = trim($_POST['email']);
    $upass = trim($_POST['pass']);
    
    $h_upass = sha1($upass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($uname == '' OR $upass == '') {
      echo '<script>
      alert("Invalid Username and Password Empty!");
      </script>';  
    } else {
          // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
          require_once '../includes/config.php';
     if ($stmt = $conn->prepare('SELECT ACCOUNT_ID, ACCOUNT_PASSWORD FROM useraccounts WHERE ACCOUNT_USERNAME = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $uname);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    if ($h_upass == $password) {
      // Verification success! User has logged-in!
      // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
      if(!isset($_SESSION)) 
        { 
	      session_start(); 
       }
      session_regenerate_id();
      $_SESSION['admin_loggedin'] = TRUE;
      $_SESSION['name'] = $uname;
      $_SESSION['id'] = $id;
      header('location: index.php');
    } else {
               echo '<script type="text/javascript">
                alert("Incorrect password");
                window.location = "login.php";
                </script>';
                // Incorrect password
           }
  } else {
    // Incorrect username
                 echo '<script type="text/javascript">
                alert("Username Not Registered! Contact +2547 -- for them.");
                window.location = "login.php";
                </script>';
        }

        	$stmt->close();
     }
    }
  }

?>
    <div class="container">
    <center><img src="img/login.png" height="100px" width="250px"></center>
      <form class="form-signin" method="POST" action="login.php">
        <center><h2 class="form-signin-heading">SIGN IN</h2></center>
         <input type="text" class="form-control" placeholder="Email address" name="email" autofocus><p></p>
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnlogin">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
