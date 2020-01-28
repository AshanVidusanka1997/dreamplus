    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Services</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
        </header>
         <div class="row">
         <?php
        require_once ("connection_sql.php");
        
        $sql = "select * from item";

        foreach ($conn->query($sql) as $row) {    

echo "
          <div class=\"col-md-6 col-lg-4 wow bounceInUp\" data-wow-duration=\"1.4s\">
            <div class=\"box\">
              <div  style=\"\"><img   style=\"width:250px; height:200px;\" src=\"BE/img/" . $row['img'] . "\" class=\"card-img\" alt=\"...\"></div>
              <h4 class=\"title\"><a href=\"\">" . $row['Name'] . "</a></h4>
              <h4 class=\"title\"><a href=\"\">" . $row['Model'] . "</a></h4>
              <p class=\"description\">" . $row['Description'] . "</p>
            </div>
          </div> 
       ";
                }
  ?>
 </div>
      </div>
    </section><!-- #services -->