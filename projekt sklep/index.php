<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sklep</title>
</head>
<body>
    <header>
        <img src="" alt="">
    </header>
    <nav>
        <a href="login.php">zaloguj</a>
    </nav>
    <main>
        <?php 
        $connection = mysqli_connect("localhost", "root", "", "projekt_sklep");
        $sql = "SELECT * FROM product;";
        $result = mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_ASSOC);
        foreach ($result as $item) {
            echo "<section>";
            echo "<img src='img/" . $item["file"] . "'>";
            echo "<h3>" . $item['name'] . "</h3>";
            echo "<p> cena: " . $item['price'] .  " </p>";
            echo "<p> dostepna ilosc: " . $item['quantity'] .  " </p>";            

        }
        ?>
    </main>
    <footer>
        <p>autor strony:mangomangomango</p>
        <p>email: mango@musztarda.mango.pl.com.web</p>
        <p>telefon: 666666666</p>
    </footer>
</body>
</html>