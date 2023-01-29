<?php
require_once "ShoppingCart.php"; ?>

<HTML>

<head>
    <title></title>

</head>

<!--
<body>

    <?php
        $shoppingCart = new ShoppingCart();
        $product_array = $shoppingCart->getProductsByCategoryID($_GET["id"]);
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
                <div class="product-item">
                    <form method="post" action="cos.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        
                        <div class="product-page-image">
                           <td> <img src="<?php echo $product_array[$key]["image"]; ?>"> </td>
                        </div>

                        <div>
                            
                            <strong> <?php echo $product_array[$key]["name"]; ?></strong> 
                            
                        </div>

                        <div class="product-price"><?php echo "$" . $product_array[$key]["price"]; ?></div>
                        
                        <div>
                            <input type="text" name="quantity" value="1" size="2" />
                            <input type="submit" value="Add to cart" class="btnAddAction" />
                        </div>
                    </form>
                </div>
                <?php
            }
        }
        ?>


</body>
    -->
<body style="background-color: antiquewhite ; font-family: Aleo;">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <?php
        $shoppingCart = new ShoppingCart();
        $product_array = $shoppingCart->getCategoryName($_GET["id"]); 
    ?>
    <br>

    <div style="right: 10px; border-style:solid; border-radius: 15px; border-color: #BC4B34; width: 100px; position: fixed; z-index: 2; text-align: center; padding: 5px;" >
        <a  href="magazin.php">Inapoi la magazin</a>
    </div>

    <div style="right: 10px; border-style:solid; border-radius: 15px; border-color: #BC4B34; width: 100px; position: fixed; z-index: 2; text-align: center; padding: 5px; bottom:40px;" >
        <a href="Cos.php"> Catre cos </a>
    </div>

    <div style=" text-align: center; font-family: Aleo; font-size:200px;" >
        <?php echo $product_array[0]['name'];?>
    </div>


    

    <?php
    $shoppingCart = new ShoppingCart();
    $product_array = $shoppingCart->getProductsByCategoryID($_GET["id"]); 
    if (!empty($product_array)) { ?>
        <div style="top: -500px; position: relative; ">
            <?php
        foreach ($product_array as $key => $value) {
    ?>
            
                <form method="post" action="cos.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    
                    <div style="position: relative; left: 200px; top: 600px;">
                        <img  id="product-page-image" src="<?php echo $product_array[$key]["image"]; ?>"> 
                    </div>

                <div style="width: 250px; height:550px;  z-index: 1; right: 150px; margin-top: 10px; position:absolute; border-style:solid; border-color: #BC4B34;
                    padding-left: 100px; border-radius: 50px;  " >

                    <div style="font-size: 50;" >
                        <strong> <?php echo $product_array[$key]["name"]; ?></strong> 
                        <br>
                        <br>
                    </div>

                    <div>
                    <strong> <?php echo $product_array[$key]["descriere"]; ?></strong> 
                    <br>
                    <br>
                    </div>

                    <div style="position: relative;bottom: 0px;">

                    <div class="product-price"><?php echo  $product_array[$key]["price"] . " RON"; ?></div>
                    
                    <div>
                        <input type="text" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to cart" class="btnAddAction" />
                    </div>
                    </div>
                    
                </div>


                </form>
            
            <?php
        }
    }
    ?>
    </div>
</body>
