<?php
    $dsn = 'mysql:host=localhost;dbname=ca2_sergejs';
    $username = 'root';
    $password = '';


    // $dsn = 'mysql:host=localhost;dbname=ca2_sergejs';
    // $username = 'root';
    // $password = 'lJA67xen';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>