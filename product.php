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
                
           
                
                $mainPath = "";
                
                $sql = "select * from item where Item_ID = '$FILTER_F'";
                $result = $conn->query($sql);
                $row = $result->fetch();

                           
               // echo "<div  class=\"col-lg-3 col-md-6 wow fadeInUp\" data-wow-delay=\"0.3s\">
               //        <div class=\"member\">
               //          <img src=\"BE/img/" . $row['img'] . "\" class=\"img-fluid\" alt=\"\">
               //          <div class=\"member-info\">
               //            <div class=\"member-info-content\">
               //              <h4>" . $row['Name'] . "</h4>
               //              <span>" . $row['Model'] . "</span>
               //              <div class=\"social\">
               //                <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
               //                <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
               //                <a href=\"\"><i class=\"fa fa-google-plus\"></i></a>
               //                <a href=\"\"><i class=\"fa fa-linkedin\"></i></a>
               //              </div>
               //            </div>
               //          </div>
               //        </div>
               //      </div>";

                     echo "<div class=\"row feature-item\">
                            <div class=\"col-lg-6 wow fadeInUp\">
                              <img  style=\"width: 100%;\" src=\"BE/img/" . $row['img'] . "\" class=\"img-fluid\" alt=\"\">
                            </div>
                            <div class=\"col-lg-6 wow fadeInUp pt-5 pt-lg-0\">
                            <h3>" . $row['Description'] . "</h3>
                             <h3>" . $row['Model'] . "</h3>
                              <h5>" . $row['Name'] . "</h5>
                             
                              <p>" . $row['Size'] . "</p>
                              <p>". $row['amount'] ."</p>
                            </div>
                          </div>";  
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
