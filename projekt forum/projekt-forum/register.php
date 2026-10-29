<?php
$polaczenie = mysqli_connect("localhost", "root", "", "forum");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql_username = "select username from users where username='$username';";
    $query = mysqli_query($polaczenie, $sql_username);

    if(mysqli_num_rows($query) > 0) {
        echo "<p>wybrana nazwa uzytkownika jest zajeta</p>";
    } else {
        $sql = "insert into users (username, password) values('$username', '$password')";
        $query = mysqli_query($polaczenie, $sql);
            echo "<p>zarejestrowano pomyslnie</p>";
    }
}
?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rejestracja</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<a href="index.php">powrot</a>

<form action="" method="post">
    <label for="username">nazwa uzytkownika:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">haslo:</label><br>
    <input type="password" id="password" name="password" required>
    <button type="submit">zarejestruj sie</button>
</form>
</body>
</html>

