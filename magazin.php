<style>
.txt-headinglabel{
    text-align: center;
    font-size: 40px;
}
</style>


<?php
require_once "ShoppingCart.php";
?>

<HTML>

<HEAD>
    <TITLE> Meniu </TITLE>
</HEAD>

<BODY style="background-image: url('Imagini/16237.jpg'); background-size:97%; font-family: Aleo; overflow:hidden">
    <link href="style.css" type="text/css" rel="stylesheet" />
    
    <div class="menuDiv">
        <br>
        <div style="text-align: center; border-color:#BC4B34; border-style: solid; border-radius: 10px; padding:5px;  width: 70px; position:absolute; left: 20px;"  >
            <a href="Cos.php" > Catre cos </a>
        </div>
        <br>
        <br>
        <br>

        <div class="categoryGrid" >
        <?php
        $cats = new ShoppingCart();
        $product_array = $cats->getAllCategories();
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
            <a href="categoryPage.php?id=<?php echo $product_array[$key]["id"]; ?>"> 
            <?php echo $product_array[$key]["name"]; ?> </a>
            <br>
            <?php
            }
        }
        ?>
        </div>

        <?php if(!isset($_SESSION['loggedin'])){ ?>
        
        <div style="text-align: center;  bottom:10; right:12px; position: absolute; border-style:solid; border-color:#BC4B34; padding: 10px;" >
            <a href="logout.php" onclick="delogare()"> Logout </a>
            <br>
        </div>
        
        <?php
        }
        ?>

        <br>

        
    </div>
    
    
    
    <div class="prodDiv">
        
        <div class="txt-heading">
            <br>
            <div class="txt-headinglabel" style="font-family: Kastellar;" > Produse </div>
            <br>
        </div>

        <div class="grid">
        <?php
        $shoppingCart = new ShoppingCart();
        $product_array = $shoppingCart->getAllProduct();
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
                <div class="product-item">
                    <form method="post" action="cos.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <br>
                        <div class="product-image">
                            <img class="product-image" src="<?php echo $product_array[$key]["image"]; ?>">
                        </div>

                        <div>
                            <a href="productPage.php?id=<?php echo $product_array[$key]["id"]; ?>"> 
                            <strong> <?php echo $product_array[$key]["name"]; ?></strong> </a>
                            
                        </div>

                        <div class="product-price"><?php echo $product_array[$key]["price"] . " RON"; ?></div>
                        <br>
                        <div>
                            <input type="text" name="quantity" value="1" size="2" />
                            <input type="submit" value="Adauga in cos" class="addCos" />
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>
        </div>
    </div>
</BODY>

</HTML>

<script>
function delogare() {
  alert("Ai fost delogat.");
}
</script>

