<?php
require_once "ShoppingCart.php";

$member_id = $_GET["member_id"];

$shoppingCart = new ShoppingCart();

$total = $shoppingCart->getCartTotal($member_id);

$shoppingCart->newOrder((int)$member_id, 'In procesare', $total);

$order_id = $shoppingCart->getOrderIDByMemberID($member_id)[0]['id'];

$shoppingCart->orderReg($member_id, $order_id, $shoppingCart->getProdIdAndQuantity($member_id));


$shoppingCart->emptyCart($member_id);
?>

<html>
    <body style="background-image: url('Imagini/16216.jpg'); background-size:110%">
    <link rel="stylesheet" href="style.css">

    <div id="shopping-cart" style="height: 350px;"> 
        <br>
        <div style="font-size: 30px;" >
            Comanda efectuata
        </div>

        <div style="font-size: 50px; top: 50px; position: relative;">
            Multumim !
        </div>

        <div style="top: 150px; position: relative;" >
            <a href="comenzileMele.php?member_id=<?php echo $member_id; ?> ">
                <div>Comenzile mele</div>
            </a>
        </div>
        <br>

        <div style="top: 170px; position: relative;">
            <a  href="magazin.php">Catre meniu</a>
        </div>
        <br>

    </div>
       
    </body>

</html>