<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DreamPlus Solutions</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">



  	<?php
  	include './tag_head.php';
	?>


</head>

<body>
 
	<?php
  	include './tag_header.php';
	?>


 
 <br><br><br><br><br>
  <main id="main">

    <!--==========================
      Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">

      <?php
                  
          
            
            require_once ("connection_sql.php");


 
                $FILTER_F = "";
                if (isset($_GET['FILTER_F'])) {
                    $FILTER_F = $_GET["FILTER_F"];
                }
                
            //Filter//Filter//Filter//Filter
            
            
                
                $mainPath = "";
                
                $sql = "select * from item";

                if ($FILTER_F == "ALL") {
                  //All
                  $sql = "select * from item";
                  $mainPath = "";
                }else{
                  //Only category
                  $sql = "select * from item where Category = '$FILTER_F'";

                  $sql_t0= "SELECT * FROM category where Category_ID = '$FILTER_F' ";
                  $result_t0 = $conn->query($sql_t0);
                  $row_t0 = $result_t0->fetch();
                  $mainPath = $row_t0['Category'];
                }
            

              echo "<div class=\"section-header\">
                      <h3>" . $mainPath . "</h3>
                      <br>
                    </div>";
              
              echo "<div class=\"row\">";

            foreach ($conn->query($sql) as $row) {                                
               echo "<div onclick=\"goToPro('" . $row['Item_ID'] . "');\" class=\"col-lg-3 col-md-6 wow fadeInUp\" data-wow-delay=\"0.3s\">
                      <div class=\"member\" style=\"width:250px;height:200px\">
                        <img src=\"BE/img/" . $row['img'] . "\" class=\"img-fluid\" alt=\"\">
                        <div class=\"member-info\">
                          <div class=\"member-info-content\">
                            <h4>" . $row['client_name'] . "</h4>
     
                            <div class=\"social\">
                              <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
                              <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
                              <a href=\"\"><i class=\"fa fa-google-plus\"></i></a>
                              <a href=\"\"><i class=\"fa fa-linkedin\"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>";



            }


            echo "</div>";

       
      ?>   
          



      

      </div>
    </section><!-- #team -->

  <?php
    // include './tag_content_1.php';
    // include './tag_content_2.php';
    // include './tag_content_3.php';
    // include './tag_content_4.php';
    // include './tag_content_5.php';
    // include './tag_content_6.php';
    // include './tag_content_7.php';
    // include './tag_content_8.php';
    // include './tag_content_9.php';
    // include './tag_content_10.php';
    // include './tag_content_11.php';
    // include './tag_content_12.php';
  ?>



  </main>

  	<?php
  	include './tag_footer.php';
	?>


<script src="js/nav.js"></script>

</body>
</html>
