<?php
require_once "ShoppingCart.php";
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
$member_id = $_SESSION['id'];
$shoppingCart = new ShoppingCart();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                 $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);
                if (!empty($cartResult)) {
                    $newQuantity = $cartResult[0]["quantity"] +
                        $_POST["quantity"];
                    $shoppingCart->updateCartQuantity(
                        $newQuantity,
                        $cartResult[0]["id"]
                    );
                } else {
                    $shoppingCart->addToCart(
                        $productResult[0]["id"],
                        $_POST["quantity"],
                        $member_id
                    );
                }
            }
            break;
        case "remove":
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
?>
<HTML>

<HEAD>
    <TITLE>Cos</TITLE>
</HEAD>


<BODY style="background-image: url('Imagini/16216.jpg'); background-size: 110%;">
    <link rel="stylesheet" href="style.css">

    <div id="shopping-cart">
        <br>
        <div class="txt-heading">
            <div class="cos-text">Cos </div> 
            
        </div>
        <br>
        <?php
        $cartItem = $shoppingCart->getMemberCartItem($member_id);
        if (!empty($cartItem)) {
            $item_total = 0;
        ?>
            <table cellpadding="10" cellspacing="1" style="margin-left: 15%; border: 1px solid antiquewhite;">
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
                            <td style="text-align: left; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo  $item["price"] . " RON"; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><a href="cos.php?action=remove&id=<?php echo
                                            $item["cart_id"]; ?>" 21 class="btnRemoveAction"><img class="imagine" src="Imagini/redxbg.png" alt="Sterge produs" title="Remove Item" style="width:25px;"/></a></td>
                        </tr>
                    <?php
                        $item_total += ($item["price"] * $item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align=right><strong>Total:</strong></td>
                        <td align=right><?php echo $item_total . " RON"; ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        else{ ?>
            <br>
            <br>
            <div>Cosul este gol</div>
            <br>
            <br>
           <?php
        }
        ?>
        <br>
        <div><a  href="magazin.php">Alegeti alt produs</a></div>
        <br>

        <div><a href="cos.php?action=empty">
                <div>Goleste cos</div>
            </a>
        </div>
        
        <br>

        <div>
            <a href="comenzileMele.php?member_id=<?php echo $member_id; ?> ">
                <div>Comenzile mele</div>
            </a>
        </div>

        
        <?php
        if(!empty($cartItem)) { ?>
        <div>   
        <br>
        <a href="comanda.php?member_id=<?php echo $member_id; ?> ">
                <div style="border-style:dashed ; border-color:#BC4B34; width: 100px; position: relative; text-align: center; right:-39%;
                border-radius: 15px; padding:5px; ">Comanda</div>
            </a>
        </div>
        <?php } ?>

        <br>
        <div><a  href="logout.php">Stergere cos si logout</a></div>

        <br>
    </div>
    
    <?php  
    ?>
</BODY>

</HTML>