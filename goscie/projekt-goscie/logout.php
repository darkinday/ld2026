<?php
$conn = mysqli_connect("localhost", "root", "", "guestbook");
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
}
Header("Location:index.php");