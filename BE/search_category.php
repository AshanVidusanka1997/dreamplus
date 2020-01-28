<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Customer</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_category.js"></script>
            <!--<script language="JavaScript" src="js/search_payment_voucher.js"></script>-->



    </head>

    <body>


        <table width="735"   class="table table-bordered">

            <tr>
                <?php
                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }
                ?>
                <td style="width: 50%;"><input type="text"  name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td style="width: 50%;"><input type="text"  id="customername1" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
              
                <!--<td width="24" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>-->
        </table>
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th>Category Ref</th>
                    <th>Category Name</th>
                   
                </tr>
                <?php
                $sql = "SELECT * from category";


                $sql = $sql . " order by Category_ID limit 50";

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['Category_ID'];
                    echo "<tr>
                              <td style=\"width: 50%;\" onclick=\"custno('$cuscode', '$stname');\">" . $row['Category_ID'] . "</a></td>
                              <td style=\"width: 50%;\" onclick=\"custno('$cuscode', '$stname');\">" . $row['Category'] . "</a></td>
                             
                             </tr>";
                }
                ?>
            </table>
        </div>

    </body>
</html>
