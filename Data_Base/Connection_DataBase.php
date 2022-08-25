<?php
    $Host = '127.0.0.1';
    $Data_Base = 'attendance_database';
    $User = 'root';
    $Password = '';
    $Charset = 'utf8mb4';


    $dsn = "mysql: host=$Host; dbname=$Data_Base; charset=$Charset";

    try{
        $pdo = new PDO($dsn, $User, $Password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'CRUD.php';
    $CRUD = new CRUD($pdo);
?>