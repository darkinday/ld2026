<?php

$polaczenie = mysqli_connect("localhost", "root", "", "szkola");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = mysqli_prepare($polaczenie, "DELETE FROM uczen WHERE ID=?");

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: zadanie_php_wyswietl_tabele.php");
    exit();
}

mysqli_close($polaczenie);