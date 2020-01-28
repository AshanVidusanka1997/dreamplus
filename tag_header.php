 <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <!-- <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> -->
          <a href="https://www.facebook.com/Vidu-215781402303797/" class="facebook"><i class="fa fa-facebook"></i></a>
          <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h3 class="text-light"><a href="#intro" class="scrollto"><span>Kithsiri Furnishing House</span></a></h3> -->
         <h3 style="color: white"><b>DreamPlus Solutions</b></h3>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php"style="color: darkblue" >Home</a></li>

          <li><a href="aboutus.php">About Us</a></li>
         <!--  <li><a href="#services">Services</a></li> -->
          <!-- <li><a href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a href="#team">Team</a></li> -->
          <li class="drop-down"><a href="">Categories</a>
            <ul>
              <li><a href='' onclick="goToCat('ALL');">ALL</a></li>
                <?php
                      require_once ("connection_sql.php");
                      
                      $sql = "select * from category";

                      foreach ($conn->query($sql) as $row) {
                        echo "<li><a onclick=\"goToCat('" . $row['Category_ID'] . "');\">" . $row['Category'] . "</a></li>";
                      }

                     


                ?>

              
              <!-- <li class="drop-down"><a href="#"> 2</a>
                <ul>
                  <li><a href="#"> 1</a></li>
                  <li><a href="#"> 2</a></li>
                  <li><a href="#"> 3</a></li>
                  <li><a href="#"> 4</a></li>
                  <li><a href="#"> 5</a></li>
                </ul>
              </li> -->
            
            </ul>
          </li>
     <!--      <li ><a href="FeedBack.php">foreign Agents</a></li> -->
          <li ><a href="FeedBack.php">FeedBack</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
