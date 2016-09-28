<?php 

    $username = "webserver"; 
    $password = "12345678"; 
    $host = "localhost"; 
    $dbname = "data"; 
    
    try 
    { 
        $db = new PDO("postgresql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    } 
     
 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        

    header('Content-Type: text/html; charset=utf-8'); 
     
    session_start(); 
?>