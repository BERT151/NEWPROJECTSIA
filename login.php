<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOG IN | SIGN UP</title>
  <link rel="stylesheet" href="assets/css/loginstyle.css" />
</head>

<body>
  <div class="boxs">
    <div class="forms form__login">
      <h2>Login</h2>
      <form class="form1" id="loginForm" action="authentication.php" method="POST">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
  				<div class='error text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
          unset($_SESSION['error']);
        }
        ?>
        <div class="log__email log__box">
          <input type="email" class="login__email input-style" placeholder="email@gmail.com" name="user" required />
          <ion-icon class="i" name="mail-outline"></ion-icon>

        </div>
        <div class="log__pass log__box">
          <input type="password" class="login__pass input-style" placeholder="Password" required name="password"
            value="" />
          <ion-icon class="i" name="lock-closed-outline"></ion-icon>
          <ion-icon class="eye showHide" name="eye-off-outline"></ion-icon>

        </div>
        <div class="log__remember log__box">
          <input type="checkbox" class="log__remember--input" id="loginRemember" />
          <label for="log--remember">Remember me</label>

        </div>

        <button class="login-btn" type="submit" id="login" name="login">
          Login Now
        </button>

        <div class="form__text">
          <p>not a member ?</p>
          <a class="form__sign--up" href="">Sign up</a>
        </div>
      </form>
    </div>
    <!------- regestration form ------ -->
    <div class="forms form__signUp">
      <h2>regestration</h2>

      <form class="form2" id="signupForm">
        <div class="log__name log__box">
          <input type="text" class="signup__name input-style" placeholder="Name" required id="Username" />
          <ion-icon class="i" name="person-outline"></ion-icon>
        </div>
        <div class="log__email log__box">
          <input type="email" class="signup__email log__email--reg input-style" placeholder="Email Address" required
            id="signupEmail" />
          <ion-icon class="i" name="mail-outline"></ion-icon>
        </div>
        <div class="log__pass log__box">
          <input type="password" class="signup__pass input-style" placeholder="Password" required id="signupPassword" />
          <ion-icon class="i" name="lock-closed-outline"></ion-icon>
        </div>
        <div class="log__pass log__box">
          <input type="password" class="signup__confirm log__confirm--reg input-style" placeholder="confirm Password"
            required id="signupConfirmPassword" />
          <ion-icon class="i" name="lock-closed-outline"></ion-icon>
          <ion-icon class="eye showHide" name="eye-off-outline"></ion-icon>
        </div>
        <div class="log__remember log__box">
          <input type="checkbox" class="log__accept--input" id="terms" />
          <label for="log--accept">I Accept the terms & conditions</label>
        </div>

        <button class="reg-btn" type="submit" id="signupBtn">
          Register Now
        </button>

        <div class="form__text">
          <p>already have an Account ?</p>
          <a class="form__login--link" href="">Login Now</a>
        </div>
      </form>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="assets/js/loginss.js"></script>
</body>

</html>