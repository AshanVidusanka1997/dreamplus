<?php
session_start();
require_once ('../connection_sql.php');
?>

<!DOCTYPE html>

<html>
    <head>
        <title>lesson</title>
        <link rel="stylesheet" type="text/css" href="_css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="_js/script.js" type="text/javascript" ></script>
        <link rel="stylesheet" type="text/css" href="_css/style.css">
    </head>
    <body>


        <nav id="navbarMain" class="navbar navbar-expand-lg navbar-light  navbar-fixed-top">
            <a class="navbar-brand" style="color: white;" href="#"><h1 id="logotext"><b>KITHSIRI FURNISHING HOUSE</b></h1></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a style="color: white;" class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a  style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $sql = "select * from category";
                            foreach ($conn->query($sql) as $row) {
                                echo "<a class='dropdown-item' onclick=\"gotoCategory('" . $row['Category_ID'] . "');\" href=''>" . $row['Category'] . "</a>";
                            }
                            echo"</select>";
                            ?>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a  style="color: white;" class="nav-link" href="#">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a  style="color: white;" class="nav-link" href="#">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a  style="color: white;" class="nav-link" href="#">Services</a>
                    </li>

                    <li class="nav-item">
                        <a  style="color: white;" class="nav-link" href="#">Contact Us</a>
                    </li>

                    <li  style="color: white;" class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>


                </ul>


            </div>

        </nav>



      
        <div class="row" >
           
            <img  style="background-image: url('_img/house.jpg');width: 100%;height: 500px;background-repeat: no-repeat;" alt="Responsive image">
                <!--<img class="img-responsive" src="_img/house.jpg" >-->

           
        </div>
      

        <br>
        <br>
        <br>

        <div class="container">
            <div id="contenttext1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
            </div>
        </div>



        <!--        <div id="category-inner"> 
                    <h2>Some Text</h2>
                    <p>Some Text</p>
                    <div id="text-7" class="main-widget widget_text"><h3 class="title"> </h3>			<div class="textwidget"><div style="width: 265px; margin: 0 auto;">
                                <input type="button" class="button" value="Some Button">
                                <div class="clear"></div></div></div>
                    </div>  end .main-widget 		    
                </div>-->



        <br>
        <br>
        <br>

        <div class="container">

            <div class="row">
                <?php
                $sql = "select * from item order by RAND() limit 3";
                foreach ($conn->query($sql) as $row) {
                    echo "<div class=\"col-md-4\">
                    <div class=\"thumbnail\">

                        <img src=\"../img/" . $row['img'] . "\" alt=\"Lights\"  style=\"width:100%\">
                        <div class=\"caption\">
                            <br>
                            <h3>" . $row['Name'] . "</h3>
                            <h5>Rs. " . number_format($row['amount'],2) . "</h5>
                            <p id=\"detail\">" . $row['Description'] . "</p>
                        </div>

                    </div>
                </div>";
                }
                ?>


            </div>
        </div>


        <br>
        <br>

<!--        <div class="container">
            <div id="subtopic2">
                <h2>Spend Couple of Hundred Dollars Gain the Value in Thousands</h2>
            </div>
            <br>

            <br>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="_img/33.png" alt="Fjords" style="width:100%">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>Painting the Property&apos;s Exterior</h4>
                    <p id="contenttext2">The importance of a good first impression on buyers cannot be emphasized enough. And the first impression that potential buyers have of your home is its exterior. It&apos;s vital to make sure that the front of your home is as well-presented as possible. Badly maintained homes or those with a distasteful paint colours will be off-putting to buyers and may well cause them to offer a lower bid or simply look elsewhere. By painting the outer walls of your property, you can increase &quot;curb appeal&quot; and make your home stand out from the neighbours&apos; houses. Neutral colours are generally recommended because they will appeal to a wider range of potential buyers. Although bold colours can be exciting, they may fall out of fashion or make your home stand out for all the wrong reasons. You can play around with colour by painting </p>
                </div>


            </div>
            <br><br>
            <div class="row">
                <div class="col-md-8">
                    <h4>Benefits of Painting the Interior</h4>
                    <p id="contenttext2">Making a good first impression with a tidy exterior is important, but the interior of your home should be given just as much attention. Peeling paint inside your home will signify to buyers that you haven&apos;t taken good care of the property and that there may be other problems lurking below the surface. Wallpaper usually turns potential buyers off as well, because it often features busy patterns and makes the house seem outdated. We recommend choosing light, neutral colours for both the interior and the exterior of the home. This is because light colours can open up even a small space, making it appear brighter and larger. Neutral colours can also allow the buyer to visualize themselves living in your home. This helps to de-personalise the property and create a clean slate. We advise against painting entire rooms in bold colours, for the same reasons as above: they go out of fashion or tend to stand out for the wrong reasons.
                    </p>
                </div>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="_img/44.png" alt="Fjords" style="width:100%">
                    </div>
                </div>
            </div>
        </div>-->


        <br><br>
        <div class="footer">

            <div class="container">
                <br>
                <br>
                <br>


                <div id="fot" class="row">
                    <div  class="col-md-2">

                    </div>

                    <div  class="col-md-5">
                        <div id="text-3" class="footer-widget widget_text"><h4 class="widgettitle">All Areas</h4>
                            <div class="textwidget">
                                <ul>
                                    <li><a>Lorem ipsum dolor sit amet</a></li>
                                    <li><a>Dolore magna aliqua</a></li>
                                    <li><a>Laboris nisi ut aliquip</a></li>


                            </div>
                        </div>
                    </div>



                    <div class="col-md-5">
                        <div id="text-3" class="footer-widget widget_text"><h4 class="widgettitle">Contact Us</h4>
                            <div class="textwidget">
                                <ul>
                                    <p id="bot"><b>Email :</b></p>
                                    <p id="bot">Lorem ipsum dolor sit amet</p>

                                    <p id="bot"><b>Tele :</b></p>
                                    <p id="bot">048 1851 1521</p>


                                </ul>
                                <!--(360) 931-7170</p>-->

                            </div>

                        </div>
                    </div>


                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>



        </div>
        <script src="_js/store.js"></script>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>


