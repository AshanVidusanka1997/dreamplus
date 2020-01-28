<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');

function generateId($id, $ref, $switch) {

    if ($switch == "pre") {
        $temp = substr($id, strlen($ref));
        $id = (int) $temp;

        return $id;
    } else if ($switch == "post") {

        $temp = substr("0000000" . $id, -7);
        $id = $ref . $temp;

        return $id;
    }
}


if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT item_id FROM inv_para";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['item_id'];
    $post = generateId($no, "IT/", "post");
    $name = uniqid();

    $ResponseXML .= "<id><![CDATA[$post]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$name]]></uniq>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_message") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

       
        $sql = "Insert into message(name,email,subject,message)values
        ('" . $_GET['name'] . "','" . $_GET['email'] . "','" . $_GET['subject'] . "','" . $_GET['message'] . "') ";
        $result = $conn->query($sql);
      
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}



?>
