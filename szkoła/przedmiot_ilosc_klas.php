<?php

$polaczenie = mysqli_connect("localhost", "root", "", "szkola");


$sql = "SELECT p.nazwa, COUNT(kp.Klasa_ID) AS ilosc_klas FROM Przedmiot p 
                      LEFT JOIN Klasa_Przedmiot kp ON p.ID = kp.Przedmiot_ID
                      GROUP BY p.ID, p.nazwa;";
$wynik = mysqli_query($polaczenie, $sql);

$tabela = mysqli_fetch_all($wynik, MYSQLI_ASSOC);

mysqli_close($polaczenie);

echo "
    <header> system szkola </header>
    <nav>
    <a href='dodaj.php'>dodaj ucznia</a> <br>
    <a href='dane_uczniow.php' target='_blank'>dane uczniow</a> <br>
    <a href='5ti.php'> uczniowie klasy 5ti </a> <br>
    <a href='przedmiot_ilosc_klas.php'> przedmiot ilosc klas </a> <br>
    </nav>
    <main>
    <table>";

foreach ($tabela as $wiersz) {
    echo "<tr>";
    echo "<td>" . $wiersz["nazwa"] . "</td>";
    echo "<td>" . $wiersz["ilosc_klas"] . "</td>";
    echo "</tr>";
    }

echo "
    </table>
    </main>
    <footer> autorem strony jest tomasz wieclawski </footer>
    ";
