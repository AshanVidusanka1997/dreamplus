

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials">
      <div class="container">

        <header class="section-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
          <h3>FeedBack</h3>
        </header>


        <div class="container">
  <div class="panel-group">

    <div class="well">
      <img src="img/Feedback1.png" style="height: 100px">
      <div class="panel-heading" ><a style="color: blue"><b>Give Your Feedback Here</b></a></div>
      <div class="panel-body">

          <div id="msg_box">
          </div>

          <div class="col-md-7">
          <label >Name :</label>
          <input type="text" class="form-control" id="name1" name="name1" >
          </div> 

          <div class="col-md-10">
          <label >Feedback :</label>
          <input type="text" class="form-control" id="feed" name="feed">
          </div>  


          <div class="col-md-10">
            <br>
          <button type="button" class="btn btn-primary"  onclick="savefeed()">Submit</button>
          </div>  

      </div>
  </div>
</div>
        <hr>

        <div class="row justify-content-center">
          <div class="col-lg-8"> 
            <div id="owl-demo" class="owl-carousel testimonials-carousel wow fadeInUp">
                        <?php
                  require_once ("connection_sql.php");
                  
                  $sql = "select * from feed";

                  foreach ($conn->query($sql) as $row) {    

          echo "
                    <div class=\"testimonial-item\">
                <img src=\"img/feedback.jpg\" class=\"testimonial-img\" alt=\"\">
                <h3>" . $row['name'] . "</h3>
                <h4>" . $row['date'] . "</h4>
                <meta>" . $row['feed'] . "</meta>
               </div> 
                 ";            }
            ?> 
             <!--  <div class="testimonial-item">
                <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
              </div>-->

            </div>

          </div>
        </div>


      </div>
    </section><!-- #testimonials -->
    
    <script>
                        $(document).ready(function() {
                 
                  var owl = $("#owl-demo");
                 
                  owl.owlCarousel({
                      items:1,
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:2000,
                    autoplayHoverPause:true,
                    navigation : true,
                    singleItem : true,
                    transitionStyle : "fade"
                  });
                 
                });
    </script>