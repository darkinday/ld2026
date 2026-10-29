<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zgloszenia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>zgloszenia wydarzen</h1>
    </header>
    <main>
        <section>
            <h2>personel</h2>
            <form action="index.php" method="post">
                <input type="radio" name="policjant" checked>
                <input type="radio" name="ratownik">
                <input type="submit" value="pokaz"> MANGO MANGO
            </form>
            <table>
                <tr>
                    <th>id</th>
                    <th>imie</th>
                    <th>nazwisko</th>
                </tr>
                <tr>
                    <?php
                        //skrypt1
                    ?>

                </tr>
            </table>
        </section>
        <section>
            <h2>nowe zgloszenie</h2>
            <ol>
                <?php
                    //skrypt2 
                ?>
            </ol>
            <form action="index.php" method="post">
                <label for="id"> wybierz id osoby z listy</label>
                <input type="number" name="id" id="id">
                <input type="submit" value="dodaj zgloszenie">   MANGO MANGO
            </form>
                <?php
                    // skrpyt3
                ?>
        </section>
    </main>
    <footer>
        <p>strone wykonal: mangomangomango</p>
    </footer>
</body>
</html>