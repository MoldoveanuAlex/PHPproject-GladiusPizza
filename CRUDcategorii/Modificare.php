<?php
include("Conectare.php");
$error = '';
if (!empty($_POST['id'])) {
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['id'])) {
            $id = $_POST['id'];
            $name = htmlentities($_POST['name'], ENT_QUOTES);

            if ($name == '') {
                echo "<div> ERROR: Completati campurile obligatorii!</div>";
            } else {
                if ($stmt = $mysqli->prepare("UPDATE category SET name=? WHERE id='" . $id . "'")) {
                    $stmt->bind_param("s", $name);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "ERROR: nu se poate executa update.";
                }
            }
        } else {
            echo "id incorect!";
        }
    }
} ?>
<html>

<head>
    <title> <?php if ($_GET['id'] != '') {
                echo "Modificare inregistrare";
            } ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
</head>

<body>
    <h1><?php if ($_GET['id'] != '') {
            echo "Modificare Inregistrare";
        } ?></h1>
    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
    } ?>
    <form action="" method="post">
        <div>
            <?php if ($_GET['id'] != '') { ?>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <p>ID: <?php echo $_GET['id'];
                        if ($result = $mysqli->query("SELECT * FROM category where id='" . $_GET['id'] . "'")) {
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_object(); ?></p>
                <strong>Nume: </strong> <input type="text" name="name" value="<?php echo $row->name; ?>" /><br />
                <?php
                            }
                        }
                    } ?>
                <br />
                <input type="submit" name="submit" value="Submit" />
                <a href="Vizualizare.php">Vizualizare tabela</a>
        </div>
    </form>
</body>

</html>

<!-- D -->