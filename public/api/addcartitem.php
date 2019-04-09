<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('mysqlconnect.php');
    require_once('config.php');

    If(empty($_GET['product_id'])){
        throw new Exception('You must send a product_id (int) with your request');
    }

    $product_id = intval($_GET['product_id']);
    $product_quantity = 1;
    $users_id = 1;

    $query_price = "SELECT `price` FROM `products` WHERE `id` = $product_id";

    $result = mysqli_query($conn, $query_price);
    if(!$result){
        throw new Exception(mysqli_error($conn));
    }
    if(mysqli_num_rows($result) === 0){
        throw new Exception("no product matches product id $product_id");
    }

    $product_data = mysqli_fetch_assoc($result);
    $product_price = (int)$product_data['price'];
    $product_total = $product_price * $product_quantity;

    //$query_cart = "SELECT `users_id` FROM `cart`";
    //if we don't have a session cart_id, create a cart in the database and generate a cart_id, store it in the $_SESSION
    if(empty($_SESSION['cart_id'])){
        $cart_create_query = "INSERT INTO `carts` SET
            `item_count` = $product_quantity,
            `total_price` = $product_total,
            `created` = NOW(),
            `users_id` = $users_id,
            `changed` = NOW()
        ";
        $cart_result = mysqli_query($conn, $cart_create_query);
        if(!$cart_result){
            throw new Exception(mysqli_error($conn));
        }
        if(mysqli_affected_rows($conn) === 0){
            throw new Exception('Data was not added to cart table');
        }
        $cart_id = mysqli_insert_id($conn);
        $_SESSION['cart_id'] = $cart_id;
    } else {
        $cart_id = $_SESSION['cart_id']; //if we do have a cart_id in the $_SESSION, we pull out the cart_id to use
        $update_cart_query = "UPDATE `carts` SET
            `item_count` = `item_count` + $product_quantity,
            `total_price` = `total_price` + $product_total
            WHERE `id` = $cart_id";

        $update_result = mysqli_query($conn, $update_cart_query);
        if(!$update_result){
            throw new Exception(mysqli_error($conn));
        }
        if(mysqli_affected_rows($conn) === 0){
            throw new Exception('Cart data was not updated');
        }
    }

    $cart_item_query = "INSERT INTO `cart_items` SET
        `products_id` = $product_id,
        `carts_id` = $cart_id,
        `quantity` = $product_quantity
        ON DUPLICATE KEY UPDATE
        `quantity` = `quantity` + $product_quantity
    ";
    $cart_item_result = mysqli_query($conn, $cart_item_query);
    if(!$cart_item_result){
        throw new Exception(mysqli_error($conn));
    }
    if(mysqli_affected_rows($conn) === 0){
        throw new Exception('failed to insert into cart items');
    }

    $output = [
        'success' => true,
        'cartCount' => $product_quantity,
        'cartTotal' => $product_total
    ];

    print(json_encode($output));
?>
