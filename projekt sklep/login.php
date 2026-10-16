<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logowanie</title>
</head>
<body>
    <form method="POST" action="login.php">
    <Label for="login">login</Label>
    <input type="text" name="login" id="login">
    <label for="password">password</label>
    <input type="text" name="password" id="password">
    <input type="submit" >
    </form>

    <?php 
        if (isset($_POST['login'])) {
            $username = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $connection = mysqli_connect("localhost", "root", "", "projekt_sklep");
            $sql = "SELECT * FROM user WHERE username='$username';";
            $query_result = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
            foreach ($query_result as $result) {
                if ($result["password"] == $password) {
                    session_start();
                    if($result["admin"] == 1) {
                        $_SESSION["admin"] = 1;
                        echo "<a href='edit.php'>przejdz do edycji</a>";
                    } else {
                        $_SESSION["admin"] = 0;
                        echo "<a href='index.php'>przejdz do zakuppow</a>";
                    }
                } else {
                    echo "niepoprawny login albo haslo";;
                };
            }
        }
    ?>
    
</body>
</html>