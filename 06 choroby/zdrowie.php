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
                // skrypt1
                ?>
            </ol>
        </section>
        <section>
            <h2>Ojawy chorob</h2>
            <form action="zdrowie.php" method="post">
                <select name="" id="">
                    <?php 
                    // skrpt2
                    ?>
                </select>
                <input type="submit" value="sprawdz">
            </form>
            <div>
                <?php 
                // skrypt3
                ?> 
            </div>
        </section>
    </main>
    <footer>
        <p>strone opracowal: mangomangoamngo </p>
    </footer>
    <img src="zdrowia.png" alt="zyczymy zdrowia!!!">
</body>
</html>