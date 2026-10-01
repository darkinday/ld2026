<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog kulinarny</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <a href='przepisy.php?id=1'> Sernik </a><br>
        <a href='przepisy.php?id=2'> Sałatka</a><br>
        <a href='przepisy.php?id=3'> Pankejki</a><br>
        <a href='przepisy.php?id=4'> Nugetsy</a><br>
        <a href='przepisy.php?id=5'> Łosoś</a><br>
        <a href='przepisy.php?id=6'> Kociołek</a><br>
        <a href='przepisy.php?id=7'> Jagnięcina</a><br>
        <a href='przepisy.php?id=8'> Hamburgery</a><br>
        <a href='przepisy.php?id=9'> Eklerki</a><br>
        <a href='przepisy.php?id=10'> Churros</a><br>
        <p>autor:mangomango</p>
    </nav>
    <main>
        <h1>
            <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");

            if(isset($_GET['id'])) {
                $id_potrawy = htmlspecialchars($_GET['id']);
            } else {
                $id_potrawy = 7;
            }
            $sql_rodzaje = "SELECT potrawy.nazwa, rodzaje.rodzaj FROM rodzaje JOIN potrawy on rodzaje.idRodzaje = potrawy.idRodzaje WHERE potrawy.idPotrawy=$id_potrawy;";
            $wynik = mysqli_fetch_assoc(mysqli_query($polaczenie, $sql_rodzaje));
            echo $wynik["rodzaj"]
            ?>

            <?php
            $sql_nazwa = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy=$id_potrawy;";
            $wynik = mysqli_fetch_assoc(mysqli_query($polaczenie, $sql_nazwa));
            echo "<h2>" . $wynik["nazwa"] . "</h2>";
            if($wynik["trudnosc"] == 1){
                echo "<p>Trudnosc: łatwe </p>";
            } elseif($wynik["trudnosc"] == 2){
                echo "<p>Trudnosc: średnie </p>";
            } else {
                echo "<p>Trudnosc: trudne </p>";
            }
            echo "<p>kalorie: " . $wynik["kalorie"] . "</p>";
            ?>
            <img src="separator.png" alt="przepis">
            <p>Alergeny:
                <?php
                $sql_alergeny = "SELECT alergeny.alergen from potrawy 
                                join lista_alergenow on potrawy.idPotrawy = lista_alergenow.idPotrawy 
                                join alergeny on alergeny.idAlergeny = lista_alergenow.idAlergeny 
                                where potrawy.idPotrawy = $id_potrawy;";

                $wynik = mysqli_query($polaczenie, $sql_alergeny);
                $tabela = mysqli_fetch_all($wynik, MYSQLI_ASSOC);
                foreach($tabela as $alergen) {
                    echo $alergen['alergen'] . " ";
                }
                ?>
            </p>
            <h2>Składniki</h2>
            <ul>
                <li>Lorem 1 kg</li>
                <li>Ipsum 2 szt.</li>
                <li>Dolor 200 g</li>
                <li>Sit amet (szczypta)</li>
            </ul>
            <p>
                <?php
                $sql_przepis = "SELECT przepis, plik FROM potrawy WHERE idPotrawy=$id_potrawy;";
                $wynik = mysqli_fetch_assoc(mysqli_query($polaczenie, $sql_przepis));
                mysqli_close($polaczenie);

                echo $wynik["przepis"];
                
                ?>
            </p>
        </h1>
    </main>
    <section style='background-image: url(<?php echo $wynik["plik"]?>);'>
        <h1>Blog Kulinarny</h1>
    </section>

</body>
</html>




