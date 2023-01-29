<?php
include("Conectare.php");
$error = '';
if (isset($_POST['submit'])) {
    $nume = htmlentities($_POST['nume'], ENT_QUOTES);
    $code = htmlentities($_POST['code'], ENT_QUOTES);
    $imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
    $price = htmlentities($_POST['price'], ENT_QUOTES);
    $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
    $cat_id = htmlentities($_POST['cat_id'], ENT_QUOTES);
    if ($nume == '' || $code == '' || $imagine == '' || $price == '' || $descriere == '' || $cat_id == '') {
        $error = 'ERROR: Campuri goale!';
    } else {
        if ($stmt = $mysqli->prepare("INSERT into tbl_product (name, code, image, price, descriere, cat_id) VALUES (?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssdss", $nume, $code, $imagine, $price, $descriere, $cat_id);
            $stmt->execute();
            $stmt->close();
        }
        else {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}
$mysqli->close();
?>
<!DOCTYPE >
<html>

<head>
    <title><?php echo "Inserare inregistrare"; ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1><?php echo "Inserare inregistrare"; ?></h1>
    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
    } ?>
    <form action="" method="post">
        <div>
            <strong>Nume: </strong> <input type="text" name="nume" value="" /><br />
            <strong>Code: </strong> <input type="text" name="code" value="" /><br />
            <strong>Imagine: </strong> <input type="text" name="imagine" value="" /><br />
            <strong>Pret: </strong> <input type="text" name="price" value="" /><br />
            <strong>Descriere: </strong> <input type="text" name="descriere" value="" /><br />
            <strong>ID Categorie: </strong> <input type="text" name="cat_id" value="" /><br />
            <br />
            <input type="submit" name="submit" value="Submit" />
            <a href="Vizualizare.php">Index</a>
        </div>
    </form>
</body>

</html>