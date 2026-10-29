<?php
$conn = mysqli_connect("localhost", "root", "", "forum");
session_start();

if (isset($_POST['message']) && isset($_POST['submit'])) {
    $name = $_SESSION['username'];
    $message = $_POST['message'];

    $sql_add = "insert into post (name,message) values ('$name', '$message')";
    mysqli_query($conn, $sql_add);
}


?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>forum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>forum</h1></header>
<nav>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<a href='logout.php'>wyloguj sie</a>";
    } else {
        echo "<a href='login.php'>zaloguj sie</a>";
        echo "<a href='register.php'>zarejestruj sie</a>";
    }
    ?>
</nav>

<main>
    <aside>
        <h3>zamiesc wpis</h3>
        <?php
        if (isset($_SESSION['username'])) {
            echo "
                <form action='index.php' method='post'>

            <label for='message'>tresc wiadomosci</label><br>
            <input type='text' id='message' name='message' required><br><br>


            <button type='submit' name='submit'>wyslij</button>
        </form>
            ";
        } else {
            echo "<p>zaloguj sie aby dodac wpis</p>";
        }
        ?>

    </aside>
    <section>
        <?php
        $sql_messages = "SELECT * FROM post ORDER BY id DESC";
        $result_messages = mysqli_fetch_all(mysqli_query($conn, $sql_messages), MYSQLI_ASSOC);

        if (empty($result_messages)) {
            echo "<p>brak wpisow</p>";
        } else {
            foreach ($result_messages as $message) {
                echo "<h4>" . $message['name'] . "</h4>";
                echo "<p>" . $message['created_at'] . "</p>";
                echo "<p>" . $message['message'] . "</p><br>";
            }
        }

        ?>
    </section>
</main>
<footer>autor: mangomango </footer>
</body>
</html>


