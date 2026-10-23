<?php
$polaczenie = mysqli_connect("localhost", "root", "", "guestbook");

?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>zaloguj sie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php">Powrot</a>
<form method="POST">
    <label for="username">Username</label> <br>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password</label> <br>
    <input type="password" name="password" id="password" required>
    <button type="submit">zaloguj</button>
</form>
</body>
</html>

<?php

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = hash("sha256", $_POST['password']);
    session_start();

    $sql = "select * from users where username = '$username';";
    $query = mysqli_query($polaczenie, $sql);
    $result= mysqli_fetch_assoc($query);

    if ($result && $password == $result['password']) {
        $_SESSION['username'] = $result['username'];
        $_SESSION['admin'] = $result['admin'];
        Header("Location: index.php");
    } else {
        echo "<p>ZLE DANE PODANE</p>";
    }

}

?>
