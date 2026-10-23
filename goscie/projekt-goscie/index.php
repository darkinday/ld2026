<?php
$conn = mysqli_connect("localhost", "root", "", "guestbook");
session_start();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) &isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql_add = "insert into post (name,email,message) values ('$name', '$email', '$message')";
    mysqli_query($conn, $sql_add);
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql_delete = "delete from post where id = $id";
    mysqli_query($conn, $sql_delete);
}
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ksiega gosci</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Ksiega gosci</h1></header>
    <nav>
        <?php
            if (isset($_SESSION['username'])) {
                echo "<a href='logout.php'>wyloguj sie</a> <br>";
            } else {
                echo "<a href='login.php'>zaloguj sie</a> <br>";
            }
            if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
                echo "<a href='admin.php'>panel admin</a> <br>";
            }
        ?>
    </nav>

    <main>
        <aside>
            <form action="index.php" method="post">
                <label for="name">imie</label><br>
                    <input type="text" id="name" name="name" required><br>
                    

                <label for="message">tresc wiadomosci</label><br>
                    <input type="text" id="message" name="message" required><br>

                <label for="email">email</label><br>
                    <input type="email" id="email" name="email" required><br><br>

                <button type="submit" name="submit">zapisz</button>
            </form>
        </aside>
        <section>
            <?php
                $sql_messages = "SELECT * FROM post where accepted=1 ORDER BY id DESC";
                $result_messages = mysqli_fetch_all(mysqli_query($conn, $sql_messages), MYSQLI_ASSOC);

                if (empty($result_messages)) {
                    echo "<p>brak wpisow</p>";
                    
                } else {
                    foreach ($result_messages as $message) {
                            echo "<h4>" . $message['name'] . "</h4>";
                            echo "<p>" . $message['created_at'] . "</p>";
                            if (isset($_SESSION['username']) && $_SESSION['admin']==1) {
                                echo "<p>" . $message['email'] . "</p>";
                                echo "<a href='index.php?delete=" . $message['id'] . "' id='delete' onclick=\"return confirm('czy na pewno chcesz usunac?')\">usun</a>";
                            }
                            echo "<p>" . $message['message'] . "</p><br>
                            ";
                    }
                }

            ?>
        </section>
    </main>
    <footer>autor: mangomangomango </footer>
</body>
</html>


