<?php

include "./includes/classes/Account.php";
include "./includes/classes/Constants.php";
$account = new Account();

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
</head>
<body>
  <div id="inputContainer">
    <form action="register.php" id="loginForm" method="POST">
      <h2>
        Login to Your Account
      </h2>
      <p>
        <label for="loginUsername">User Name</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
      </p>

      <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="password" placeholder="" required>
      </p>

      <button type="submit" name="loginButton">
        Log In
      </button>

    </form>


    <form action="register.php" id="registerForm" method="POST">
      <h2>
        Create your free account
      </h2>
      <p>
      <?php echo $account->getError(Constants::$usernameLength); ?>
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
        Sign Up
      </button>

    </form>

  </div>
</body>

</html>
