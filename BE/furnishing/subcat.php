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
                        <a  style="color: white;" class="nav-link dropdown-toggle" href="store.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<br>
<br>
<br>

        <div class="container">
            <div class="row">
                <?php
                $subcatid = $_GET['subcatid'];
                $sql = "select * from item where Sub_Category = '$subcatid'";

                foreach ($conn->query($sql) as $row) {
                    echo "<div class='col-md-4' >";

                    echo "<div class=\"thumbnail\">

                        <img src=\"../img/" . $row['img'] . "\" alt=\"Lights\"  style=\"width:100%\">
                        <div class=\"caption\">
                            <h3>" . $row['Name'] . "</h3>
                            <small>" . $row['Model'] . "</small>
                            <p>" . $row['Size'] . "</p>
                            <p>" . $row['Description'] . "</p>

                        <input type=\"button\" class=\"button\" onclick=\"gotoItem(" . $row['Item_ID'] . ");\" value=\"More\">
                        </div>

                    </div>";

                    echo "</div>";
                }

                ?>

            </div>
        </div>



        <br>
        <br>
        <br>


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
