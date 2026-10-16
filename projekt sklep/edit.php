<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edycja</title>
</head>
<body>
    <h1>edytor manga</h1>
        <?php 
        $connection = mysqli_connect("localhost", "root", "", "projekt_sklep");
        echo "<form method='POST' action='edit.php'>
            <label for='name'>Name</label><br>
            <input name='name' type='text' id='name'><br>

            <label for='price'>Price</label><br>
            <input name='price' type='number' id='price'><br>

            <label for='quantity'>Quantity</label><br>
            <input name='quantity' type='number' id='quantity'><br>

            <label for='file'>File</label><br>
            <input name='file' type='text' id='file'><br>

            <input type='submit'>
        </form>";

        if (NULL !== htmlspecialchars($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
            $price =  htmlspecialchars($_POST['price']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $file = htmlspecialchars($_POST['file']);
            $sql = "INSERT INTO product ('name', 'price', 'quantity', 'file') VALUES ('$name', '$price', '$quantity', '$file')";
            mysqli_query($connection, $sql);
        } else {
            echo "pusta tabela";
        }

        ?>
</body>
</html>