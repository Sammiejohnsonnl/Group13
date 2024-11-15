<?php
$dbname = "inventorymanagement.db"; 


try {
    $db = new PDO("sqlite:$dbname");
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully ";
} catch(PDOException $e) {
   
    echo "Connection failed: " . $e->getMessage();

    exit();
}
?>