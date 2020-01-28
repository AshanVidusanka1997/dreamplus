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

    $sql = "SELECT sub_category_id FROM inv_para";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['sub_category_id'];
    $post = generateId($no, "SC/", "post");
    $name = uniqid();

    $ResponseXML .= "<id><![CDATA[$post]]></id>";
//    $ResponseXML .= "<uniq><![CDATA[$name]]></uniq>";
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}





if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "delete from sub_category where Sub_Category_ID = '" . $_GET['Sub_Category_ID'] . "'";
        $conn->exec($sql);

        $sql = "Insert into sub_category(Sub_Category_ID,Sub_Category,Category_ID)values 
        ('" . $_GET['Sub_Category_ID'] . "','" . $_GET['Sub_Category'] . "','" . $_GET['Category'] . "') ";
        $result = $conn->query($sql);



        $sql = "SELECT sub_category_id FROM inv_para";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no1 = $row['sub_category_id'];
        $no2 = $no1 + 1;
        $sql = "update inv_para set sub_category_id = $no2 where sub_category_id = $no1";
        $result = $conn->query($sql);


        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "edit") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql2 = "update food_menu_master set description = '" . $_GET['itemdesc'] . "',amount = '" . $_GET['amount'] . "' where itemCode = '" . $_GET['itemcode'] . "'";

        $result = $conn->query($sql2);

        $conn->commit();
        echo "EDIT";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {

    $sql = "delete from food_menu_master where itemCode = '" . $_GET['itemcode'] . "'";
    $result = $conn->query($sql);

//    $conn->commit();
    echo "Delete";
}
?>