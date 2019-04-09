<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('config.php');
    require_once('mysqlconnect.php');

    $cart_id = $_SESSION['cart_id'];
    //query database to get getcartitems.json
    $cart_items_query =
    "SELECT p.`name`, p.`price`, GROUP_CONCAT(i.`url`) AS 'images', c.`quantity`, p.`id` AS 'id'
    FROM `cart_items` AS c
    JOIN `products` AS p
        ON c.`products_id` = p.`id`
    JOIN `images` AS i
        ON i.`products_id` = p.`id`
    WHERE c.`carts_id` = $cart_id
    GROUP BY p.`id`
    ";

    $result = mysqli_query($conn, $cart_items_query);
    if(!$result){
        throw new Exception(mysqli_error($conn));
    }
    if(mysqli_num_rows($result) === 0){
        throw new Exception('Did not retrieve cart item data');
    }

    $get_result = [];
    while($row = mysqli_fetch_assoc($result)){
        $get_result[] = $row;
    };

    $cart_meta_data_query =
    "SELECT `created`, `total_price`
    FROM `carts`
    WHERE `id` = $cart_id
    ";
    $meta_data = mysqli_query($conn, $cart_meta_data_query);
    if(!$meta_data){
        throw new Exception(mysqli_error($conn));
    }
    if(mysqli_num_rows($meta_data) === 0){
        throw new Exception('Did not retrieve meta data');
    }

    $get_meta_data = [];
    while($row = mysqli_fetch_assoc($meta_data)){
        $get_meta_data[] = $row;
    }

    $output = [
        'success' => true,
        'cartData' => $get_result,
        'cartMetaData' => $get_meta_data
    ];
    print(json_encode($output));

?>
