<?php

$polaczenie = mysqli_connect("localhost", "root", "", "szkola");

$sql = "SELECT * FROM Uczen";
$wynik = mysqli_query($polaczenie, $sql);

$tabela = mysqli_fetch_all($wynik, MYSQLI_ASSOC);
mysqli_close($polaczenie);


echo "
    <link rel='stylesheet' href='style.css'>
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
    <th>ID</th>
    <th>Imie</th>
    <th>Nazwisko</th>
    <th>Rocznik</th>
    <th>Wychowawca</th>
    <th>Kierunek</th>
    </tr>
    ";

foreach ($tabela as $wiersz) {
    echo "<tr>";
    echo "<td>" . $wiersz["ID"] . "</td>";
    echo "<td>" . $wiersz["Imie"] . "</td>";
    echo "<td>" . $wiersz["Nazwisko"] . "</td>";
    echo "<td>" . $wiersz["Rocznik"] . "</td>";
    echo "<td>" . $wiersz["Wychowawca"] . "</td>";
    echo "<td>" . $wiersz["Kierunek"] . "</td>";
    echo "<td><a href='edytuj.php?id=" . $wiersz["ID"] . "'>Edytuj</a></td>";
    echo "<td><a href='usun.php?id=" . $wiersz["ID"] . "' onclick=\"return confirm('czy na pewno chcesz usunac');\">Usun</a></td>";
    echo "</tr>";
}


echo "
    </table>
    </main>
    <footer> autorem strony jest tomasz wieclawski </footer>
    ";
