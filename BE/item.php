<?php
session_start();
?>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Item Master</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>

                    <a onclick="NewWindow('search_item.php?stname=code', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <a onclick="deleteproduct();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>

                </div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group"></div>


                <div class="col-md-5">
                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Item ID</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Item ID" name="c_code" id="Item_ID" class="form-control  input-sm">
                            <input type="text" placeholder="Item ID" name="c_code" id="uniq" class="form-control  input-sm hidden">
                        </div>
                    </div>


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Category</label>
                        <div class="col-sm-7">
                            
                            <?php
                            echo"<select id = \"Category\" onchange = \"getSub()\" class =\"form-control input-sm\">";
                            $sql = "select * from category";
                            echo '<option value="" ></option>';
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
                        <label class="col-sm-5" for="c_code">Sub Category</label>
                        <div id="sub" class="col-sm-7">
                            <select id="Category" class="form-control input-sm">
                                <option value="" ></option>
                              
                            </select>
    <!--                        <input type="text" placeholder="Sub Category" name="c_code" id="Sub_Category" class="form-control  input-sm">-->
                        </div>
                    </div>


                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Client</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Client" name="c_code" id="Model" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Location</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Location" name="c_code" id="Name" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Duration</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Duration" name="c_code" id="Size" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Description</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Description" name="c_code" id="Description" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Features & Specifications</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Features & Specifications" name="c_code" id="Features_Specifications" class="form-control  input-sm">
                        </div>
                    </div>

                    <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-5" for="c_code">Amount</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="Amount" name="c_code" id="amount" class="form-control  input-sm">
                        </div>
                    </div>
<br>
<br>
<br>

<label class="col-sm-6" for="c_code"></label>
                    <div id="kv-avatar-errors-1" class="center-block" style="width:120px;"></div>


                    <div class="form-group">
                        <input id="file-3" class="file" type="file" data-preview-file-type="any" data-upload-url="#">


                    </div>

                </div>



                <div class="col-md-5">
                    <div id="getImg">
                        <!-- <img width="300" src="img\5c8ce97f65471.jpg" alt=""> -->
                    </div>
                </div>



                <!--                 <div class="form-group"></div>
                                <div class="form-group-sm">
                                    <label class="col-sm-5" for="c_code">Upload Image</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="file" >
                                    </div>
                                </div>-->

                <div class="col-md-3" >


                </div>

                <div id="itemdetails" >

                </div>

            </div>
        </form>
    </div>

</section>
<br>
<br>

<script src="js/item.js"></script>

<script>newitem();</script>
