<?php
    require_once('functions.php');
    set_exception_handler('handleError');
    require_once('config.php');
    require_once('mysqlconnect.php');

    $output = [
        'success' => false
    ];

    $json_input = file_get_contents("php://input"); //returns raw string from the body
    $input = json_decode($json_input, true); //true means convert objects into associative arrays as opposed to std objects (classes)

    if(empty($input['email'])){
        throw new Exception('email is a required value');
    }

    if(empty($input['password'])){
        throw new Exception('password is a required value');
    }

    $email = $input['email'];
    $password = $input['password'];
    //$email = addslashes($email); //will escape out of the quote characters in the string
    $hashedPassword = sha1($password);
    unset($_POST['password']); //after conversion of passoword, get rid of the hot potato

    // $query = "SELECT `id`, `name` FROM `users`
    //     WHERE `email` = '$email' AND `password` = '$hashedPassword'
    // ";

    $query = "SELECT `id`, `name` FROM `users`
        WHERE `email` = ? AND `password` = ?
    ";

    //send the safe query to the db
    $statement = mysqli_prepare($conn, $query);

    //send the dangerous data to the db
    mysqli_stmt_bind_param($statement, 'ss', $email, $hashedPassword); //'s' is for string, 'd' is for numbers, 'ss' is for two strings

    //tell the db to mix the query with the dangerous data
    mysqli_stmt_execute($statement);

    //get the result pointer for the prepared query statements data
    $result = mysqli_stmt_get_result($statement); //returns mysqli data object that contains (barcode) references the data asked in the query

    //$result = mysqli_query($conn, $query);
    if(!$result){
        throw new Exception(mysqli_error($conn));
    }

    if(mysqli_num_rows($result) !== 1){
        throw new Exception('invalid username or password');
    }

    $data = mysqli_fetch_assoc($result);

    $token = $email . $data['id'] . microtime(); //utilising microtime() to make each token unique
    $token = sha1($token);

    $connect_query = "INSERT INTO `user_connections` SET
        `token` = '$token',
        `users_id` = {$data['id']},
        `created` = NOW(),
        `ip_address` = '{$_SERVER['REMOTE_ADDR']}'
    ";

    $connect_result = mysqli_query($conn, $connect_query);

    if(!$connect_result){
        throw new Exception(mysqli_error($conn));
    }

    if(mysqli_affected_rows($conn) !== 1){
        throw new Exception('Could not log you in: connection not saved');
    }

    $_SESSION['user_data'] = [
        'id' => $data['id'],
        'username' => $data['name'],
        'token' => $token
    ];

    $output['success'] = true;
    $output['username'] = $data['name'];
    $output['token'] = $token;

    $json_output = json_encode($output);
    print($json_output);
?>
