<?php
include './includes/config.php';

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
} else {
    header("Location: register.php");
}
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  Hello World
</body>
</html>
