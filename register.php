<?php
include "./includes/config.php";
include "./includes/classes/Account.php";
include "./includes/classes/Constants.php";
$account = new Account($con);

include "./includes/handlers/register-handler.php";
include "./includes/handlers/login-handler.php";

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to TuneServer</title>
  <link rel="stylesheet" href="./assets/css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./assets/js/register.js"></script>
</head>
<body>
<?php
if (isset($_POST['registerButton'])) {
    echo '<script>
    $(document).ready(function () {

    $("#loginForm").hide();
    $("#registerForm").show();
})
  </script>';
} else {
    echo '<script>
    $(document).ready(function () {

    $("#loginForm").show();
    $("#registerForm").hide();
})
  </script>';
}
?>
<div id="background">
  <div id="loginContainer">
    <div id="inputContainer">
      <form action="register.php" id="loginForm" method="POST">
        <h2>
          Login to Your Account
        </h2>
        <p>
        <?php echo $account->getError(Constants::$loginFailed); ?>
          <label for="loginUsername">User Name</label>
          <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
        </p>

        <p>
          <label for="loginPassword">Password</label>
          <input id="loginPassword" name="loginPassword" type="password" placeholder="" required>
        </p>

        <button type="submit" name="loginButton">
          LOG IN
        </button>

        <div class="hasAccountText">
          <span id="hideLogin">Dont have an account yet? Sign Up Here!</span>
        </div>

      </form>


      <form action="register.php" id="registerForm" method="POST">
        <h2>
          Create your free account
        </h2>
        <p>
        <?php echo $account->getError(Constants::$usernameLength); ?>
        <?php echo $account->getError(Constants::$usernameTaken); ?>
          <label for="registerUsername">User Name</label>
          <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. bsimpson" value="<?php getInputValue('registerUsername')?>" required>
        </p>

        <p>
        <?php echo $account->getError(Constants::$firstNameLength); ?>
          <label for="registerFirstName">First Name</label>
          <input id="registerFirstName" name="registerFirstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('registerFirstName')?>" required>
        </p>


        <p>
        <?php echo $account->getError(Constants::$lastNameLength); ?>
          <label for="registerLastName">Last Name</label>
          <input id="registerLastName" name="registerLastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('registerLastName')?>" required>
        </p>


        <p>
        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$invaildEmails); ?>
        <?php echo $account->getError(Constants::$emailTaken); ?>

          <label for="registerEmail">Email</label>
          <input id="registerEmail" name="registerEmail" type="email" placeholder="name@email.com" value="<?php getInputValue('registerEmail')?>" required>
        </p>

        <p>
          <label for="registerEmail2">Confirm Email</label>
          <input id="registerEmail2" name="registerEmail2" type="email" placeholder="name@email.com" value="<?php getInputValue('registerEmail2')?>" required>
        </p>

        <p>
        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
        <?php echo $account->getError(Constants::$passwordLength); ?>
          <label for="registerPassword">Password</label>
          <input id="registerPassword" name="registerPassword" type="password" placeholder="" required>
        </p>

        <p>
          <label for="registerPassword2">Confirm Password</label>
          <input id="registerPassword2" name="registerPassword2" type="password" placeholder="" required>
        </p>

        <button type="submit" name="registerButton">
        SIGN UP
        </button>


        <div class="hasAccountText">
          <span id="hideRegister">Already have an account? Log In Here</span>
        </div>
      </form>

    </div>
    <div id="loginText">
      <h1>Get great music, right now</h1>
      <h2>Listen to 1000s of songs for free</h2>
      <ul>
      <li>Discover new artists</li>
      <li>Create playlists</li>
      <li>Follow artists</li>
      </ul>
    </div>
  </div>
  </div>
</body>

</html>
