<?php
session_start();
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Sub Category Master</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newsubcat();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>

                    <a onclick="NewWindow('search_sub_category.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>  
                    <a onclick="deleteproduct();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>

                </div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group"></div>

                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2" for="c_code">Sub Category ID</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Sub Category ID" name="c_code" id="Sub_Category_ID" class="form-control  input-sm">
                        <input type="text" placeholder="Sub Category ID" name="c_code" id="uniq" class="form-control  input-sm hidden">

                    </div>
                </div>

                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2" for="c_code">Category</label>
                    <div class="col-sm-3">
                        <?php
                        echo"<select id = \"Category\" onchange = \"getSub()\" class =\"form-control input-sm\">";
                        $sql = "select * from category";
                        foreach ($conn->query($sql) as $row) {
                            echo "<b><option  value='" . $row["Category_ID"] . "'>" . $row["Category"] . "</option></b>";
                        }
                        echo"</select>";
                        ?>
                        <!--<input type="text" placeholder="Category" name="c_code" id="Category" class="form-control  input-sm">-->
                    </div>
                </div>

                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2" for="c_code">Sub Category</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Sub Category" name="c_code" id="Sub_Category" class="form-control  input-sm">
                    </div>
                </div>


                <div id="itemdetails" >

                </div>

            </div>
        </form>
    </div>

</section>
<br>
<br>

<script src="js/sub_category.js"></script>

<script>newent();</script>

