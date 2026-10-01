<?php


$polaczenie = mysqli_connect("localhost", "root", "", "szkola");


$sql = "SELECT Imie, Nazwisko FROM uczen JOIN klasa on uczen.Klasa_ID = klasa.ID WHERE Klasa.ID = 4;";
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
    <table>
    <tr>
    <th>Imie</th>
    <th>Nazwisko</th>
    </tr>
";



foreach ($tabela as $wiersz) {
    echo "<tr>";
    echo "<td>" . $wiersz["Imie"] . "</td>";
    echo "<td>" . $wiersz["Nazwisko"] . "</td>";
    echo "</tr>";
}

echo "
    </table>
    </main>
    <footer> autorem strony jest tomasz wieclawski </footer>
    ";
