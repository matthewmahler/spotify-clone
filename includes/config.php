<?php
ob_start();

session_start();

$timezone = date_default_timezone_set("America/New_York");

$con = mysqli_connect("localhost", "root", "", "spotify-clone");

if (mysqli_connect_errno()) {
    echo "failed to connect: " . mysqli_connect_errno();
}
