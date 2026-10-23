<?php
$conn = mysqli_connect("localhost", "root", "", "guestbook");
session_start();

if ($_SESSION['admin'] != 1) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['accept'])) {
    $id = $_GET['accept'];
    $sql_accept = "update post set accepted = 1 where id = $id";
    mysqli_query($conn, $sql_accept);
} elseif (isset($_GET['delete'])) {
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
    <title>admin panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1><a href="index.php">powrot</a></h1>
    <main>
        <section>
            <?php
            $sql_messages = "SELECT * FROM post where accepted=0 ORDER BY id DESC";
            $result_messages = mysqli_fetch_all(mysqli_query($conn, $sql_messages), MYSQLI_ASSOC);

            if (empty($result_messages)) {
                echo "<p>brak wpisow</p>";
            } else {
                foreach ($result_messages as $message) {
                    echo "<section>";
                    echo "<h4>" . $message['name'] . "</h4>";
                    echo "<p>" . $message['created_at'] . "</p>";
                    if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
                        echo "<p>" . $message['email'] . "</p>";
                        echo "<a href='admin.php?accept=" . $message['id'] . "'>akceptuj</a> <br>";
                        echo "<a href='admin.php?delete=" . $message['id'] . "' id='delete' onclick=\"return confirm('czy na pewno chcesz usunac?')\">usun</a>";
                    }
                    echo "<p>" . $message['message'] . "</p><br>";

                    echo "</section>";
                }
            }

            ?>
        </section>
    </main>
</body>
</html>