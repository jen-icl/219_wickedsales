<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('config.php');
    require_once('mysqlconnect.php');

    $output = [
        'success' => false
    ];

    if(empty($_SESSION['user_data']['token'])){
        $output['success'] = true;
        $output['message'] = "You weren't logged in";
        print(json_encode($output));
        exit();
    }

    $token = $_SESSION['user_data']['token'];

    $query = "DELETE FROM `user_connections` WHERE `token` = '$token'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        throw new Exception(mysqli_error($conn));
    }

    if(mysqli_affected_rows($conn) !== 1){
        throw new Exception('unable to remove user from current login');
    }

    unset($_SESSION['user_data']);

    $output['success'] = true;
    print(json_encode($output));
?>
