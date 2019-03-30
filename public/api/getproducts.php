<?php

    require_once('mysqlconnect.php');
    require_once('functions.php');

    set_exception_handler('handleError');

    $query = "SELECT p.`id`, p.`name`, p.`price`,
            i.`url` AS `images`
        FROM `products` AS p
        JOIN `images` AS i
            ON p.`id` = i.`products_id`
        ORDER BY p.`id`";

    /*procedural */
    $result = mysqli_query($conn, $query);
    if(!$result){
        throw new Exception('invalid query: '.mysqli_error($conn)); //utilize an object and pass in error
    }

    $data = [];
    while($row = mysqli_fetch_assoc($result)){ //mysqli_fetch_assoc() returns one row of associative array
        $currentID = $row['id'];
        $currentID = intval($currentID);
        if(isset($data[$currentID])){
            //$data[$row['id']]['images'][] = $row['images'];
            $image = $row['images'];
            $data[$currentID]['images'][] = $image;
        } else {
            $image = $row['images']; //save the image string
            unset($row['images']); //delete the string from the images
            $row['images'] = []; //define an empty array
            $row['images'][] = $image; //push string back to the array //shortcut $row['images'] = [$image]
            $row['price'] = intval($row['price']);
            $data[$currentID] = $row;
        }
    }

    $pureData = [];
    foreach($data as $value){
        $pureData[] = $value;
    }

    $output = [
        'success' => true,
        'products'=> $pureData
    ];

    $json_output = json_encode($output);

    print $json_output;
    /*
    'SELECT p.`id`, p.`name`, p.`price`,
            i.`url` AS `images`
        FROM `products` AS p
        JOIN `images` AS i
        ON p.`id` = i.`products_id`';

    */

?>
