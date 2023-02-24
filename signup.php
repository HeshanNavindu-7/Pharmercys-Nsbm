
<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "parmercy-nsbm";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' );
        }

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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>QuickMed</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validateForm.js"></script>
    <script src="js/index.js"></script>
    <script> isSetupDone(); </script>
  </head>
  <body style="background-image: url('images/23.jpeg');">
    <div class="container">
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="login.php" method="post" onsubmit="return validateAndSetup();">
            <div class="logo">
              <h1 class="logo-caption font-weight-bolder">Sign Up</h1>
        			
              <p class="h5 text-center text-light">Enter necessary pharmacy details<p>
        		</div> <!-- logo class -->

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-plus-square text-white"></i></span>
              </div>
              <input id="pharmacy_name" type="text" class="form-control" placeholder="pharmacy name" onkeyup="validateName(this.value, 'pharmacy_name_error');" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="pharmacy_name_error" style="display: none;"></code>

           

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope text-white"></i></span>
              </div>
              <input id="email" type="email" class="form-control" placeholder="email" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="email_error" style="display: none;"></code>
 <div class="input-group form-group">
              
  <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-address-card text-white"></i></span>
              </div>
              <textarea id="address" class="form-control" placeholder="address" onkeyup="validateAddress(this.value, 'address_error');" style="max-height: 100px;" ></textarea>
            </div> <!-- input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="address_error" style="display: none;"></code>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-mobile-alt text-white"></i></span>
              </div>
              <input id="phone_number" type="number" class="form-control" placeholder="phone number" onkeyup="validateContactNumber(this.value, 'contact_number_error');" >
            </div> <!-- input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="contact_number_error" style="display: none;"></code>
            <!--
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-circle text-white"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="select profile image" onclick="document.getElementById('profile_image').click();" id="profile_name">
              &emsp;<p class="m-auto text-light">Optional</p>
              <input id="profile_image" type="file" accept="image/*" class="form-control" style="display: none;" onchange="document.getElementById('profile_name').value = this.value.split('\\').pop()">
            </div> <!-- input-group class
            -->

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input id="username" type="text" class="form-control" placeholder="Pharamacy license number" onblur="notNull(this.value, 'username_error');" >
            </div> <!--input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="username_error" style="display: none;"></code>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock text-white"></i></span>
              </div>
              <input id="password" type="text" class="form-control" placeholder="Password">
            </div> <!-- input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="password_error" style="display: none;"></code>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input id="confirm_password" type="password" class="form-control" placeholder="confirm password">
            </div> <!-- input-group class -->
            <code class="text-light small font-weight-bold float-right mb-2" id="confirm_password_error" style="display: none;"></code> <br><br>
            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> <span class="text">I Agree Terms & Coditions</span>
            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom">START</button>
              <br>
<span class="text">Already have an account?<a href="sign in.html" >   Sign In</a></span>
            </div>
          </form><!-- form close -->
        </div> <!-- cord-body class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>