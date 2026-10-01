<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacje o aktorze | KinoTEKA</title>
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
        $id_aktora = htmlspecialchars($_GET['id']);
        $sql_imie = "SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora=$id_aktora";
        $sql_filmy = "SELECT filmy.id_filmu, filmy.tytul, filmy.rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy.id_filmu = filmy_aktorzy.id_filmu WHERE id_aktora = $id_aktora;";
        $polaczenie = mysqli_connect("localhost", "root", "", "kino");
        $aktor = mysqli_fetch_assoc(mysqli_query($polaczenie, $sql_imie));
        $filmy = mysqli_num_rows(mysqli_query($polaczenie, $sql_filmy));
        
        echo "<article>";
        echo "
        <img 
        src='img/" . $aktor["plik_awatara"] . 
        "' alt='" . $aktor["imie"] . " " . $aktor["nazwisko"] . 
        "' title='" . $aktor["imie"] . " " . $aktor["nazwisko"] . "'/>
        ";
        
        echo "<h1>" . $aktor["imie"] . " " . $aktor["nazwisko"] . "</h1> </article>";
        if($filmy == 0) {
            echo "<p>" . $aktor['imie'] .  " nie znajduje się na listach obsady znanych nam produkcji. </p>";
        } else {
            echo "<p>" . $aktor['imie'] . " znajduje się na listach obsady " . $filmy . " znanych nam produkcji. </p>";
        }
        ?>    
        </section>
    </main>
    <footer>
        <strong>Autor: mangomangomango</strong>
    </footer>
</body>
</html>


