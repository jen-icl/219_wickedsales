<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('mysqlconnect.php');
    require_once('config.php');

    if(empty($_GET['productId'])){
        throw new Exception('productId is a required value');
    }

    //url: getproductdetails.php?productId=4
    //$_GET is a variable
    //cast (int) converts into an integer
    $id = (int)$_GET['productId'];

    $query = "SELECT p.`id`, p.`name`, p.`price`, p.`description`, p.`misc_details` AS 'miscDetails',
        GROUP_CONCAT(i.`url`) AS `images`
    FROM `products` AS p
    JOIN `images` AS i
        ON p.`id` = i.`products_id`
    WHERE p.`id` = $id
    GROUP BY p.`id`";

    $result = mysqli_query($conn, $query);
    //returns pointer to the data

    //check if query was sent successfully
    if(!$result){
        throw new Exception(mysqli_error($conn)); //utilize an object and pass in error
    }

    //check if there is no data from the returned query
    // $result->num_rows === 0
    if(mysqli_num_rows($result) === 0){
        throw new Exception( "no data available for product id $id");
    }

    $data = mysqli_fetch_assoc($result);
    $data['price'] = intval($data['price']);
    $data['miscDetails'] = json_decode($data['miscDetails']);
    $data['images'] = explode(',', $data['images']);

    $output = [
        'success' => true,
        'productInfo' => $data
    ];

    $json_output = json_encode($output);
    print($json_output);
?>
