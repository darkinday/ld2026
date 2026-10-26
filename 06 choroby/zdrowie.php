<?php 
    $polaczenie = mysqli_connect("localhost", "root", "", "choroby");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wykaz chorob</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Informacja o chorobach w polsce</h1>
    </header>
    <nav>
        <a target="_blank" href="https://szpitale.pl/">szpitale</a>
        <a target="_blank" href="https://www.przychodnie.pl/">przychodnie</a>
        <a target="_blank" href="https://www.nfz.gov.pl/ ">NFZ</a>

    </nav>
    <main>
        <section>
            <h2>choroby zakazne</h2>
            <ol>
                <?php 
                    $sql = "SELECT nazwa FROM choroby WHERE zakazna='T' ORDER BY nazwa ASC;";
                    $wynik = mysqli_fetch_all(mysqli_query($polaczenie, $sql), MYSQLI_ASSOC);
                    foreach ($wynik as $row) {
                        echo "<li>" . $row["nazwa"] . "</li>";
                    }
                ?>
            </ol>
        </section>
        <section>
            <h2>Ojawy chorob</h2>
            <form action="zdrowie.php" method="post">
                <select name="choroby">
                    <?php 
                    $sql2 = "SELECT id, nazwa FROM choroby;";
                    $wynik = mysqli_fetch_all(mysqli_query($polaczenie, $sql2), MYSQLI_ASSOC);

                    foreach ($wynik as $row){
                        echo "<option value='" . $row["id"] . "'>" . $row["nazwa"] . "</option>";

                    }

                    ?>
                </select>
                <input type="submit" value="sprawdz">
            </form>
            <article>
                <?php 
                    if (isset($_POST["choroby"])) {
                        $id = $_POST["choroby"];
                        $sql = "SELECT nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE choroby_objawy.id_choroby = $id;";
                        $wynik = mysqli_fetch_all(mysqli_query($polaczenie, $sql), MYSQLI_ASSOC);
                        foreach ($wynik as $row) {
                            echo "<span> " . $row["nazwa"] . " </span>";
                        }
                    }
                            
                mysqli_close($polaczenie);
                ?> 
            </article>
        </section>
    </main>
    <footer>
        <p>strone opracowal: mangomangoamngo </p>
    </footer>
    <img src="zdrowia.png" alt="zyczymy zdrowia!!!">
</body>
</html>