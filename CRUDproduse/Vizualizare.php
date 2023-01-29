<!DOCTYPE HTML>
<html>

<head>
    <title>Vizualizare Inregistrari</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>Inregistrarile din tabela produse</h1> 
    <p><b>Toate inregistrarile din produse</b</p> <br>
            <?php
            include("Conectare.php");
            include_once("C:\\xampp\htdocs\proiect2\ShoppingCart.php");
            

            if ($result = $mysqli->query("SELECT * FROM tbl_product ORDER BY id "))
                if ($result->num_rows > 0) {
                    echo "<table border='1' cellpadding='10'>";
                    echo "<tr><th>ID</th><th>Nume Produs</th><th>Cod Produs</th><th>Imagine</th><th>Descriere</th><th>ID Categorie</th><th>Nume Categorie</th><th></th><th></th></tr>";
                    while ($row = $result->fetch_object()) {
                        $shoppingCart = new ShoppingCart;
                        $cat = $shoppingCart->getCategoryName($row->cat_id);
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td>" . $row->name . "</td>";
                        echo "<td>" . $row->code . "</td>";
                        echo "<td>" . $row->image . "</td>";
                        echo "<td>" . $row->descriere . "</td>";
                        echo "<td>" . $row->cat_id . "</td>";
                        echo "<td>" . $cat[0]['name'] . "</td>";
                        echo "<td><a href='Modificare.php?id=" . $row->id . "'>Modificare</a></td>";
                        echo "<td><a href='Stergere.php?id=" . $row->id . "'>Stergere</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } 
                else {
                    echo "Nu sunt inregistrari in tabela!";
                }

            else {
                echo "Error: " . $mysqli->$error;
            }
            $mysqli->close();
            ?>
            <a href="Inserare.php">Adaugarea unei noi inregistrari</a>
</body>

</html>

<!-- D -->