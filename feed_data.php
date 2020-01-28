<?php

session_start();
 
require_once ("connection_sql.php");
 
date_default_timezone_set('Asia/Colombo');

$dt = date('Y-m-d');
 
if ($_GET["Command"] == "save_feed") {
 
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        
        $sql = "Insert into feed(name,feed,date)values
        ('" . $_GET['name'] . "','" . $_GET['feed'] . "','" . $dt . "') ";
        $result = $conn->query($sql);
      
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}



?>
