<?php

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';

?>
<?php
$signupError = isset($_SESSION['errors_signup']) && count($_SESSION['errors_signup']) > 0;
$signupSuccess = isset($_GET["signup"]) && $_GET["signup"] === "success";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="style/style.css" />
  <title>Login Page</title>
</head>

<body>

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="includes/signup.inc.php" method="post">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registeration</span>
        <?php
        signup_inputs();
        ?>
        <button>Sign Up</button>
        <?php
        check_signup_errors();
        ?>

      </form>



    </div>
    <div class="form-container sign-in">
      <form action="includes/login.inc.php" method="post">
        <h1>Sign In</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>or use your email password</span>
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="pwd" placeholder="Password" />
        <a href="#">Forget Your Password?</a>
        <button>Sign In</button>
      </form>

    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Please enter your details to login</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello!</h1>
          <p>
            Register with your personal details to use all the features
          </p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/script.js"></script>

  <!-- Later in your HTML -->
  <script>
    window.onload = function () {
      <?php if ($signupError || $signupSuccess): ?>
        document.getElementById('container').classList.add("active");
      <?php endif; ?>
    };
  </script>
</body>

</html>