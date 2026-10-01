<?php


$polaczenie = mysqli_connect("localhost", "root", "", "szkola");

if(isset($_POST['imie'])) {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $rocznik = $_POST['rocznik'];
    $wychowawca = $_POST['wychowawca'];
    $kierunek = $_POST['kierunek'];

    $stmt = mysqli_prepare($polaczenie, "insert into Uczen (Imie, Nazwisko, Rocznik, Wychowawca, Kierunek) VALUES (?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssiss", $imie, $nazwisko, $rocznik, $wychowawca, $kierunek);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: zadanie_php_wyswietl_tabele.php");
    exit();

}
mysqli_close($polaczenie);
?>


<body>
<header> system szkola </header>
<nav>
    <a href='dodaj.php'>dodaj ucznia</a> <br>
    <a href='dane_uczniow.php' target='_blank'>dane uczniow</a> <br>
    <a href='5ti.php'> uczniowie klasy 5ti </a> <br>
    <a href='przedmiot_ilosc_klas.php'> przedmiot ilosc klas </a> <br>
</nav>

<main>
<form method="POST">
    imie:
    <input type="text" name="imie" required><br>
    nazwisko:
    <input type="text" name="nazwisko" required><br>
    rocznik:
    <input type="number" name="rocznik" required><br>
    wychowawca:
    <input type="text" name="wychowawca" required><br>
    kierunek:
    <input type="text" name="kierunek" required><br>

    <button type="submit">dodaj</button>
</form>
</main>
<footer> autorem strony  jest tomasz wieclawski </footer>