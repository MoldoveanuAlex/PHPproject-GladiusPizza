<!DOCTYPE HTML>
<html>

<head>
    <title>Vizualizare Inregistrari</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>Inregistrarile din tabela categorii</h1> 
    <p><b>Toate inregistrarile din categorii</b</p> <br>
            <?php
            include("Conectare.php");
            if ($result = $mysqli->query("SELECT * FROM category ORDER BY id "))
                if ($result->num_rows > 0) {
                    echo "<table border='1' cellpadding='10'>";
                    echo "<tr> <th>ID Categorie</th> <th>Nume Categorie</th> </tr>";
                    while ($row = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td>" . $row->name . "</td>";
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