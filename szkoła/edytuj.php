<?php

$polaczenie = mysqli_connect("localhost", "root", "", "szkola");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $rocznik = $_POST['rocznik'];
    $wychowawca = $_POST['wychowawca'];
    $kierunek = $_POST['kierunek'];

    mysqli_query($polaczenie, "UPDATE Uczen SET Imie='$imie', Nazwisko='$nazwisko', Rocznik='$rocznik', Wychowawca='$wychowawca', Kierunek='$kierunek' WHERE ID=$id");

    header("Location: zadanie_php_wyswietl_tabele.php");
    exit();
}

$id = $_GET['id'];
$wynik = mysqli_query($polaczenie, "SELECT * FROM Uczen WHERE ID = $id");
$uczen = mysqli_fetch_assoc($wynik);
?>

<header> system szkola </header>

<nav>
    <a href='dodaj.php'>dodaj ucznia</a> <br>
    <a href='dane_uczniow.php' target='_blank'>dane uczniow</a> <br>
    <a href='5ti.php'> uczniowie klasy 5ti </a> <br>
    <a href='przedmiot_ilosc_klas.php'> przedmiot ilosc klas </a> <br>
</nav>

<main>
        
    <h2>Edycja ucznia</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $uczen['ID']; ?>">

        Imię: <br>
        <input type="text" name="imie" value="<?php echo $uczen['Imie']; ?>"><br><br>

        Nazwisko: <br>
        <input type="text" name="nazwisko" value="<?php echo $uczen['Nazwisko']; ?>"><br><br>

        Rocznik: <br>
        <input type="text" name="rocznik" value="<?php echo $uczen['Rocznik']; ?>"><br><br>

        Wychowawca: <br>
        <input type="text" name="wychowawca" value="<?php echo $uczen['Wychowawca']; ?>"><br><br>

        Kierunek: <br>
        <input type="text" name="kierunek" value="<?php echo $uczen['Kierunek']; ?>"><br><br>

        <button type="submit">Zapisz</button>
    </form>
</main>
<footer> autorem strony jest tomasz wieclawski </footer>



<?php
mysqli_close($polaczenie);
?>