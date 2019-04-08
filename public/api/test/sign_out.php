<?php
    session_start();
    unset($_SESION['user']);
    session_destroy();
    print(json_encode(['success' => true]));
?>
