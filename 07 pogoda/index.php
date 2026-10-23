<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pogoda</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="slonce.png"alt="slonecznie">
    </header>
    <nav>
        <h1>POGODA W EUROPIE</h1>
    </nav>
    <main>
        <article>
            <h2>tempertury w lipcu</h2>
            <table>
                <tr>
                    <th>miasto</th>
                    <th>kraj</th>
                    <th>temprature</th>
                    <th>pogoda</th>
                </tr>
                <?php
                    $polaczenie = mysqli_connect("localhost", "root", "", "pogoda");
                    $sql = "SELECT nazwa, kraj, temperatura FROM miejscowosc JOIN pomiary ON miejscowosc.id = pomiary.id_miejscowosc WHERE id_miesiac=7;";
                    $wynik = mysqli_fetch_aLL(mysqli_query($polaczenie,$sql), MYSQLI_ASSOC);

                    foreach ($wynik as $item) {
                        echo "<tr><td>" . $item["nazwa"] . "</td>";
                        echo "<td>" . $item["kraj"] . "</td>";
                        echo "<td>" . $item["temperatura"] . "</td>";
                        if ($item["temperatura"] > 30) {
                            echo "<td><img src='slonce.png'></td></tr>" ;
                        } elseif ($item["temperatura"] < 26) {
                            echo "<td><img src='deszcz.png'></td></tr>";
                        } else {
                            echo "<td><img src='chmury.png'></td></tr>";
                        }
                    }

                ?>
            </table>
        </article>
        <section>
            <h2>srednie temperartur w roku</h2>
            <a href="index.php?id=1">styczen</a>
            <a href="index.php?id=2">luty</a>
            <a href="index.php?id=3">marzec</a>
            <a href="index.php?id=4">kwiecen</a>
            <a href="index.php?id=5">maj</a>
            <a href="index.php?id=6">czerwuec</a>
            <a href="index.php?id=7">lipeic</a>
            <a href="index.php?id=8">sierpien</a>
            <a href="index.php?id=9">wrzesien</a>
            <a href="index.php?id=10">pazdzienrik</a>
            <a href="index.php?id=11">listopad</a>
            <a href="index.php?id=11">grudzien</a>
            <p>Średnia temperatura dla wybranego miesiąca wynosi</p>
            <?php 
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT ROUND(AVG(temperatura),2) FROM pomiary WHERE id_miesiac=$id;";
                    $wynik = mysqli_fetch_row(mysqli_query($polaczenie, $sql));   
                    echo "<h3>" . $wynik[0] . "</h3>";
                }
                mysqli_close($polaczenie);
            ?>
        </section>

        <footer>
            <p>numerzdajacego:mangomangomango</p>
        </footer>
    </main>
</body>
</html>


