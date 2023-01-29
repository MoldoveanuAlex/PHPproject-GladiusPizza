<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{
    function getAllProduct()
    {
        $query = "SELECT * FROM tbl_product";
        $productResult = $this->getDBResult($query);
        return $productResult;
    }
    function getMemberCartItem($member_id)
    {
        $query = "SELECT tbl_product.*, tbl_cart.id as
cart_id,tbl_cart.quantity FROM tbl_product, tbl_cart WHERE
tbl_product.id = tbl_cart.product_id AND tbl_cart.member_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM tbl_product WHERE code=?";
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }
    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND
member_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    function addToCart($product_id, $quantity, $member_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,member_id)
VALUES (?, ?, ?)";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $this->updateDB($query, $params);
    }
    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET quantity = ? WHERE id= ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }
    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        $this->updateDB($query, $params);
    }
    function emptyCart($member_id)
    {
        $query = "DELETE FROM tbl_cart WHERE member_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $this->updateDB($query, $params);
    }

    function getAllCategories()
    {
        $query = "SELECT * FROM category";
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getProductsByCategoryID($id)
    {
        $query = "SELECT * FROM tbl_product WHERE cat_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $id
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getProductByID($id)
    {
        $query = "SELECT * FROM tbl_product WHERE id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $id
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCategoryName($cat_id){
        $query = "SELECT * FROM category WHERE id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cat_id
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getOrders($member_id){
        $querry = "SELECT * FROM comanda WHERE member_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $productResult = $this->getDBResult($querry, $params);
        return $productResult;
    }

    function getCartTotal($member_id){
        $querry = "SELECT tbl_product.price * tbl_cart.quantity FROM tbl_cart, tbl_product WHERE member_id = ? and tbl_cart.product_id = tbl_product.id";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $productResult = $this->getDBResult($querry, $params);
        $sum= array_sum(array_column($productResult, 'tbl_product.price * tbl_cart.quantity'));
        return $sum;
    }

    function newOrder($member_id, $status, $total){
        $query = "INSERT INTO comanda (member_id, status, total) VALUES (?, ?, ?)";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            ),
            array(
                "param_type" => "s",
                "param_value" => $status
            ),
            array(
                "param_type" => "i",
                "param_value" => $total
            )
        );
        $this->updateDB($query, $params);

    }

    function getOrderIDByMemberID($member_id){
        $query = "SELECT id FROM comanda WHERE member_id = ? ORDER BY ID DESC LIMIT 1";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        return $this->getDBResult($query, $params);
    }

    function getProdIdAndQuantity($member_id){
        $query = "SELECT product_id, quantity FROM tbl_cart WHERE member_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        return $this->getDBResult($query, $params);
    }

    function orderReg($member_id, $order_id, $prodAndQuantity){

        foreach ($prodAndQuantity as $element) {
            $query = "INSERT INTO prod_comanda (order_id, product_id, product_quantity, member_id) VALUES (?, ?, ?, ?)";

                $params = array(
                    array(
                        "param_type" => "i",
                        "param_value" => $order_id
                    ),
                    array(
                        "param_type" => "i",
                        "param_value" => $element['product_id']
                    ),
                    array(
                        "param_type" => "i",
                        "param_value" => $element['quantity']
                    ),
                    array(
                        "param_type" => "i",
                        "param_value" => $member_id
                    )
                );
            $this->updateDB($query, $params);
        }
    }

    function getOrderContents($order_id){
        $query = "SELECT product_id, product_quantity FROM prod_comanda WHERE order_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order_id
            )
        );

        return $this->getDBResult($query, $params);
    }

    function getProductNameById($product_id){
        $query = "SELECT name FROM tbl_product WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            )
        );

        return $this->getDBResult($query, $params);
    }

    function getProductPriceById($product_id){
        $query = "SELECT price FROM tbl_product WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            )
        );

        return $this->getDBResult($query, $params);
    }

    function getMemberIdByOrderId($order_id){
        $query = "SELECT member_id FROM comanda WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $order_id
            )
        );

        return $this->getDBResult($query, $params);
    }


}
