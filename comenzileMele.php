<?php
require_once "ShoppingCart.php";
?>

<html>

<head>
    <title>Comenzile mele</title>
</head>

<body style="background-image: url('Imagini/16216.jpg'); background-size:110%">
<link rel="stylesheet" href="style.css">
    <div id="shopping-cart" style="width:600px;">
    <div style="right: 10px; border-style:solid; border-radius: 15px; border-color: #BC4B34; width: 100px; position: fixed; z-index: 2; text-align: center; padding: 5px; background-color: antiquewhite;" >
        <a  href="magazin.php">Inapoi la magazin</a>
    </div>
        <?php
        $ords = new ShoppingCart();
        $product_array = $ords->getOrders($_GET["member_id"]);
        if (!empty($product_array)) {
        ?>
            <table cellpadding="10" cellspacing="1" style="margin-left: 15%; border: 1px solid antiquewhite; padding: 20px;">
                <tbody style="font-family: Aleo;">
                    <tr>
                        <th style="text-align: left;"><strong>Numar comanda</strong></th>
                        <th style="text-align: center;"><strong>Data comezii</strong></th>
                        <th style="text-align: center;"><strong>Valoare comanda</strong></th>
                        <th style="text-align: center;"><strong>Status comada</strong></th>
                        <th style="text-align: center;"><strong></strong></th>
                    </tr>
                    <?php
                    foreach ($product_array as $key => $value) {
                        ?>
                        <tr>
                            <td style="text-align: left; border-bottom: #F0F0F0 1px solid;">
                                <a href="detaliiComanda.php?order_id=<?php echo $product_array[$key]["id"]; ?>">
                                <strong><?php echo "#" . $product_array[$key]["id"]; ?></strong>
                                </a>
                            </td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $product_array[$key]["data"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo  $product_array[$key]["total"] . " RON"; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $product_array[$key]["status"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>


    </div>

</body>
</html>
