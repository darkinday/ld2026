<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>korona gor polskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="logo">
    </header>
    <nav>
        <h1>korona gor polskich</h1>
    </nav>
    <main>
        <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "korona");
            $id = $_GET['id'];
            $sql = "select szczyty.plik as plik, szczyty.nazwa as nazwa, szczyty.wysokosc as wysokosc, szczyty.pasmo, opis.opis as opis from szczyty join opis on szczyty.id = opis.szczyty_id where szczyty.id = $id;";
            $wynik = mysqli_fetch_all(mysqli_query($polaczenie, $sql), MYSQLI_ASSOC);
            foreach($wynik as $row) {
                $plik = $row['plik'];
                $nazwa = $row['nazwa'];
                $opis = $row['opis'];
                echo "<img src=$plik alt='szczyt'>";
                echo "<h2>$nazwa</h2>";
                echo "<h3> wysyokosc:" . $row['wysokosc'] . " metrow n.p.m</h3>";
                echo "<p>$opis</p>";
            }


        ?>
    </main> <br>
    <section>
        <?php
            $sql = "SELECT plik, nazwa FROM szczyty LIMIT 10;";
            $wynik = mysqli_fetch_all(mysqli_query($polaczenie, $sql), MYSQLI_ASSOC);
            foreach($wynik as $row) {
                $plik = $row['plik'];
                $nazwa = $row["nazwa"];
                echo "<img src='$plik' alt='$nazwa' class='miniatury'>" ;
            }   
            mysqli_close($polaczenie)
        ?>
    </section>
    <aside>
    <h3>kontakt</h3>
    <ul>
        <li>zadzwon do nas: 111 222 333</li>
        <li><a href="mailto:korona@gory.pl">napisz do nas <a></li>
    </ul>
    </aside>
    <footer>
        <h3>© Wykonane przez:mangomangomango</h3>
    </footer>
</body>
</html>