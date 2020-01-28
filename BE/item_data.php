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


if ($_GET["Command"] == "getsub") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";



//    foreach ($conn->query($sql2) as $row2) {
//
//        $ResponseXML .= "<uniq><![CDATA[$name]]></uniq>";
//        $result = $conn->query($sql2);
//    }
    $subcat .= "<select id = \"Sub_Category\"  class =\"form-control input-sm\">";
    $sql = "SELECT * FROM sub_category where Category_ID= '" . $_GET['Category'] . "'";
    foreach ($conn->query($sql) as $row) {
        $subcat .= "<b><option  value='" . $row["Sub_Category_ID"] . "'>" . $row["Sub_Category"] . "</option></b>";
    }
    $subcat .= "</select>";


//    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<subcat><![CDATA[$subcat]]></subcat>";


    echo $ResponseXML;
}


if ($_GET["Command"] == "update_list") {
    $ResponseXML = "";
    $ResponseXML .= "<table class=\"table\">
	            <tr>
                        <th width=\"121\">Item No</th>
                        <th width=\"424\"> Item Description </th>

                        <th width=\"121\">Amount</th>
                    </tr>";


    $sql = "SELECT * from ass_vender where itcode <> ''";
    if ($_GET['refno'] != "") {
        $sql .= " and itcode like '%" . $_GET['refno'] . "%'";
    }
    if ($_GET['cusname'] != "") {
        $sql .= " and itname like '%" . $_GET['cusname'] . "%'";
    }
    $stname = $_GET['stname'];

    $sql .= " ORDER BY itcode limit 50";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row["itcode"];


        $ResponseXML .= "<tr>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itcode'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itname'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['price'] . "</a></td>
                            </tr>";
    }
    $ResponseXML .= "</table>";
    echo $ResponseXML;
}




if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "delete from item where Item_ID = '" . $_GET['Item_ID'] . "'";
        $result = $conn->query($sql);


        $sql = "Insert into item(Item_ID,Category,Sub_Category,Model,Name,Size,Description,Features_Specifications,img,amount)values
        ('" . $_GET['Item_ID'] . "','" . $_GET['Category'] . "', '" . $_GET['Sub_Category'] . "','" . $_GET['Model'] . "'" . ",'" . $_GET['Name'] . "','" . $_GET['Size'] . "','" . $_GET['Description'] . "','" . $_GET['Features_Specifications'] . "','" . $_GET['id'] . ".jpg','" . $_GET['amount'] . "') ";
        $result = $conn->query($sql);



        $sql = "SELECT item_id FROM inv_para";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no1 = $row['item_id'];
        $no2 = $no1 + 1;
        $sql = "update inv_para set item_id = $no2 where item_id = $no1";
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


if ($_POST['Command'] == "imgsave") {

    if (!isset($_POST['img'])) {
        $target_dir = "img/";
        $imageFileType = $_FILES["file"]["tmp_name"];
        $path = $_FILES['file']["name"];
        $imageFileType = pathinfo($path, PATHINFO_EXTENSION);

        $target_file = $target_dir . $_POST['id'] . "." . $imageFileType;

echo print_r($_FILES);
        (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file));
    } else {
        $target_file = $_POST['img'];
    }
//
//    $sql = "select * from driver where did = '" . $_POST['did'] . "'";
//    $result = $conn->query($sql);
//    if ($row = $result->fetch()) {
//        $sql = "update driver set dMobileNo= '" . $_POST['dMobileNo'] . "',dfName='" . $_POST['fname'] . "',dlName='" . $_POST['lname'] . "',dContact='" . $_POST['contdet'] . "',image='" . $target_file . "' where did = '" . $_POST['did'] . "'";
//    } else {
//        $sql = "insert into driver (dMobileNo,dfName,dlName,dContact,image) values ('" . $_POST['dMobileNo'] . "','" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['contdet'] . "','" . $target_file . "')";
//    }
//    $result = $conn->query($sql);
//    echo "The Driver Master File Has been Updated";
}
?>
