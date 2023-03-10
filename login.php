


<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "parmercy-nsbm";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $email = $_POST["email"];
          $password = $_POST["password"];

    // Query the database for the user's credentials
    $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Authenticate the user
    if (mysqli_num_rows($result) == 1) {
        // Redirect to dashboard or home page
        header("Location: dashboard.php");
        exit;
    } else {
        // Display error message or redirect to login/signup page
        header("Location: login.php?error=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Login Form in PHP with Validation | Tutsmake.com</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body style="background-image: url('images/pills2.jpg');">
    <div class="container">

        <div id="login-form" class="card m-auto p-2">
          <div class="card-body">
            <form name="login-form" class="login-form" action="home.php" method="post" onsubmit="return validateCredentials();">
              <div class="logo">
                      <img src="images/prof.jpg" class="profile"/>
                      <h1 class="logo-caption">Sign In</h1>
                  </div> <!-- logo class -->
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                </div>
                <input name="username" type="text" class="form-control" placeholder="Email" onkeyup="validate();" required>
              </div> <!--input-group class -->
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                </div>
                <input name="password" type="password" class="form-control" placeholder="password" onkeyup="validate();" required>
              </div> <!-- input-group class -->
              <div class="form-group">
                <button class="btn btn-default btn-block btn-custom">Sign In</button>
              </div>
            </form><!-- form close -->
  
          </div> <!-- cord-body class -->
          <div class="card-footer">
            <div class="text-center">
              
              <span class="text">Already have an account?<a href="sign in.html" >   Sign In</a></span>
            </div>
          </div> <!-- cord-footer class -->
        </div> <!-- card class -->
       
        <div id="forgot-password-form" class="card m-auto p-2" style="display: none;">
          <div class="card-body">
            <div name="login-form" class="login-form">
              <div class="logo">
                <img src="images/prof.jpg" class="profile"/>
                <h1 class="logo-caption"><span class="tweak">F</span>orget <span class="tweak">P</span>assword</h1>
              </div> <!-- logo class -->
  
              <div id="email-number-fields">
                <p class="h6 text-center text-light">Enter email and contact number below to reset username and password<p>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
                  </div>
                  <input id="email" type="email" class="form-control" placeholder="enter email" required>
                </div> <!--input-group class -->
  
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                  </div>
                  <input id="contact_number" type="number" class="form-control" placeholder="enter contact number" onkeyup="validate();" required>
                </div> <!-- input-group class -->
  
                <div class="form-group">
                  <button class="btn btn-default btn-block btn-custom" onclick="verifyEmailNumber();">Verify</button>
                </div>
              </div>
  
  
              <div id="username-password-fields" style="display: none;">
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
                  </div>
                  <input id="username" type="text" class="form-control" placeholder="enter username" onblur="notNull(this.value, 'username_error');" >
                </div> <!--input-group class -->
                <code class="text-light small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>
  
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
                  </div>
                  <input id="password" type="text" class="form-control" placeholder="enter password" onkeyup="validatePassword();" >
                </div> <!-- input-group class -->
                <code class="text-light small font-weight-bold float-right mb-2" id="password_error" style="display: none;"></code>
  
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
                  </div>
                  <input id="confirm_password" type="password" class="form-control" placeholder="confirm password" onkeyup="validatePassword();" >
                </div> <!-- input-group class -->
                <code class="text-light small font-weight-bold float-right mb-2" id="confirm_password_error" style="display: none;"></code>
                <div class="form-group">
                  <button class="btn btn-default btn-block btn-custom" onclick="updateUsernamePassword();">Reset Password</button>
                </div>
              </div>
            </div><!-- form close -->
  
          </div> <!-- cord-body class -->
          <div class="card-footer">
            <div class="text-center">
              <a class="text-light" onclick="displayLoginForm();" style="cursor: pointer;">Login here</a>
            </div>
          </div> <!-- cord-footer class -->
        </div> <!-- card class -->
  
      </div> <!-- container class -->
</body>
</html>