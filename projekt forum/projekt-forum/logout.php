<?php
$conn = mysqli_connect("localhost", "root", "", "forum");

session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
}
Header("Location:index.php");