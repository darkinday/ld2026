<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>korona gor polskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="logo">
    </header>
    <nav>
        <h1>korona gor polskich</h1>
    </nav>
    <main>
        <?php
            $polaczenie = mysqli_connect("localhost", "root", "korona");
            $sql = "SELECT id, nazwa FROM szczyty ORDER BY wysokosc ASC";
            $wynik = mysqli_fetch_array(mysqli_query($polaczenie, $sql));
            foreach ($wynik as $row) {
                $id = $row['id'];
                echo "<span href='szczyty.php?id=$id'>$row['nazwa']<span>"
            }
            

        ?>
    </main>
    <section>
        <?php
        // skrypt 2
        ?>
    </section>
    <aside>

    </aside>
    <footer>

    </footer>

</body>
</html>