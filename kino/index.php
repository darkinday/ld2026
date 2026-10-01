<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista aktorów | KinoTEKA</title>
    <link href="styl.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h2><a href="index.php">kinoTEKA</a><h2>
    </header>
    <nav>
        <em>W naszej bazie znajdują się najlepsi aktorzy</em>
    </nav> <br>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
        <section>
        <?php
        $polaczenie = mysqli_connect("localhost", "root", "", "kino");
        $sql = "SELECT * FROM aktorzy ORDER BY nazwisko, imie;";
        $wynik = mysqli_query($polaczenie, $sql);
        $tabela = mysqli_fetch_all($wynik, MYSQLI_ASSOC);
        mysqli_close($polaczenie);
        foreach($tabela as $aktor) {
            echo "<a href='aktor.php?id=" . $aktor["id_aktora"] . "'>";
            echo "<figure>";
            echo "
            <img 
            src='img/" . $aktor["plik_awatara"] . 
            "' alt='" . $aktor["imie"] . " " . $aktor["nazwisko"] . 
            "' title='" . $aktor["imie"] . " " . $aktor["nazwisko"] . "'/>
            ";
            
            echo "<p>" . $aktor["imie"] . " " . $aktor["nazwisko"] . "</p> </figure>  </a>";


        }
        ?>
        </section>
    </main>
    <footer>
        <strong>Autor: mangomangomango</strong>
    </footer>
</body>
</html>