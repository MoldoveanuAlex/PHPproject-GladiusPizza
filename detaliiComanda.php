<?php
require_once("ShoppingCart.php"); 
$a = new ShoppingCart();
$member_id = $a->getMemberIdByOrderId($_GET["order_id"])[0]["member_id"];
?>



<html>
    <body style="background-image: url('Imagini/16216.jpg'); background-size: 110%;">
        <link rel="stylesheet" href="style.css">
        
        <div id="shopping-cart">

        <div style="top: 150px; right: 10px; border-style:solid; border-radius: 15px; border-color: #BC4B34; width: 100px; position: fixed; z-index: 2; text-align: center; padding: 5px; background-color: antiquewhite;" >
            <a  href="magazin.php">Inapoi la magazin</a>
        </div>

        <div style="top:50px; right: 10px; border-style:solid; border-radius: 15px; border-color: #BC4B34; width: 100px; position: fixed; z-index: 2; text-align: center; padding: 5px; background-color: antiquewhite;" >
            <a href="comenzileMele.php?member_id=<?php echo $member_id; ?> ">
                <div>Inapoi la comenzile mele</div>
            </a>
        </div>

        <br>
        <div>
            Continut comanda 
            <?php echo("#" . $_GET["order_id"]); ?>
        </div> 
        <br>
        <?php
        $shoppingCart = new ShoppingCart();
        $veh = new ShoppingCart();
        $order_id = $_GET["order_id"];
        $cartItem = $shoppingCart->getOrderContents($order_id);
        if (!empty($cartItem)) {
        ?>
            <table cellpadding="10" cellspacing="1" style="margin-left: 29%; border: 1px solid antiquewhite;">
                <tbody style="font-family: Aleo;">
                    <tr>
                        <th style="text-align: left;"><strong>Produs</strong></th>
                        <th style="text-align: right;"><strong>Cantitate</strong></th>
                        <th style="text-align: right;"><strong>Pret</strong></th>
                        <th style="text-align: center;"><strong></strong></th>
                    </tr>
                    <?php
            foreach ($cartItem as $item) {
                    ?>
                        <tr>
                            <td style="text-align: left; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $veh->getProductNameById($item["product_id"])[0]['name'] ; ?></strong></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $item["product_quantity"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $veh->getProductPriceById($item["product_id"])[0]['price'] ?></td>
                        </tr>
                    <?php }
        }?>
                </tbody>
            </table>
        </div>


    </body>
</html>