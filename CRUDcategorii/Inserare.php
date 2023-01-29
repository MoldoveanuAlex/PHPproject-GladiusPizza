<?php
include("Conectare.php");
$error = '';
if (isset($_POST['submit'])) {
    $name = htmlentities($_POST['name'], ENT_QUOTES);

    if ($name == '') {
        $error = 'ERROR: Campuri goale!';
    } else {
        if ($stmt = $mysqli->prepare("INSERT into category (name) VALUES (?)")) {
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $stmt->close();
        } else {
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
            <strong>Nume: </strong> <input type="text" name="name" value="" /><br />
            <br />
            <input type="submit" name="submit" value="Submit" />
            <a href="Vizualizare.php">Index</a>
        </div>
    </form>
</body>

</html>