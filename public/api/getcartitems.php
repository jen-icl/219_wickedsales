<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('config.php');
    require_once('mysqlconnect.php');

    if(empty($_SESSION['cart_id'])){
        throw new Exception('Missing cart id');
    }

    $ouput = [
        'success' => false,
    ];

    $cart_id = $_SESSION['cart_id'];
    $user_id = 1;

    $cart_query =
    "SELECT c.`created`, c.`total_price`,
    ci.`quantity`, p.`id`, p.`name`, p.`price`,
        (SELECT `url`
        FROM `images`
        WHERE `products_id` = p.`id`
        LIMIT 1)
        AS 'image'
    FROM `carts` AS c
    JOIN `cart_items` AS ci
        ON c.`id` = ci.`carts_id`
    JOIN `products` AS p
        ON ci.`products_id` = p.`id`
    WHERE c.`id` = $cart_id
    AND c.`users_id` = $user_id
    ";

    $cart_data = mysqli_query($conn, $cart_query);
    if(!$cart_data){
        throw new Exception(mysqli_error($conn));
    }
    if(mysqli_num_rows($cart_data) === 0){
        throw new Exception('Unable to retrieve cart data');
    }

    $ouput['cartItems'] = [];
    $output['cartMetaData'] = [];

    while($row = mysqli_fetch_assoc($cart_data)){
        $output['cartItems'][] = [
            'name' => $row['name'],
            'price' => (int)$row['price'],
            'image' => $row['image'],
            'quantity' => (int)$row['quantity'],
            'id' => (int)$row['id']
        ];
        $output['cartMetaData']['created'] = $row['created'];
        $output['cartMetaData']['total'] = (int)$row['total_price'];
    }
    $output['success'] = true;

    print(json_encode($output));
?>
