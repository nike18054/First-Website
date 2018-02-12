<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: gallery.php'); }

//define page title
$title = 'Gallery Page';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nick Glantz</title>
  <link rel="icon" href="Images/NGfavicon1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php if(isset($title)){ echo $title; }?></title>

  <!--Dropdown hover css link-->
  <link rel="stylesheet" type="text/css" href="css/dropdownhover.css">

  <!--bootsrap css-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

  <!-- JAVASCRIPT files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/dropdown.js"></script>

  <!-- auto log out feature-->
   <script src="js/jquery-idleTimeout.js"></script>
   <script type="text/javascript" charset="utf-8">
 		  $(document).ready(function(){
 		   $(document).idleTimeout();
 		  });
 	</script>

  <style>
    a {
      cursor: pointer;
    }

    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    .panel-success > .panel-body {
      height: 250px;
      width: auto;
    }

    /* Removes Carets on dropdown based on resize */
    #caret{
      display: inline-block;
    }

    @media (max-width: 767px) {
    #caret{
        display: none;
    }
    .dropdown:hover .dropdown-menu {
        display: none;
    }}

    /* Makes navbar opaque on hover*/
    .navbar-inverse {
      opacity: 0.90;
      filter: alpha(opacity=90); /* For IE8 and earlier */
    }
    .navbar-inverse:hover {
      opacity: 1.0;
      filter: alpha(opacity=100); /* For IE8 and earlier */
    }

    .carousel-inner > .item > img{
        width:100%;
        height: 525px;
        margin: auto auto;
        border-radius: 20px;
    }
     .carousel {
       width: 100%;
       margin: auto auto;
       padding: 0 0 0 0;
    }

    @media (max-width: 599px) {
    .carousel-inner > .item > img{
        width: 100%%;
        height: 300px;
    }}

    @media (min-width: 600px) and (max-width: 767px) {
    .carousel-inner > .item > img{
        width: 100%%;
        height: 450px;
    }}

    .carousel-control {
      border-radius: 20px;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
	  background-color: #f2f2f2;
      padding: 25px;
    }

  </style>
</head>
<body>

<!--Left side of navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!--landscaping Navbar-->
        <li><a href="flp.php"><img src="Images/NGfavicon1.png" height="19px" width="19px"> Fun Lifestyle &reg; program</a></li>

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                            <!--Gallery dropdown-->
        <li class="dropdown active"><a class="dropdown-toggle" data-hover="dropdown" href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Gallery<span id="caret" class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="chainlakes.php">Chain Lakes, CA</a></li>
            <li><a href="maupin.php">Maupin, OR</a></li>
            <li><a href="silverfalls.php">Silver Falls, OR</a></li>
            <li><a href="sprucegoose.php">Spruce Goose Air Museum, OR</a></li>
          </ul>
        </li>


      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <!--Contact Navbar-->
        <li><a href="contact.php">Contact</a></li>
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <!--Login Navbar-->
        <li><a data-toggle="modal" data-target="#logoutModal"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
      </ul>

    </div>
  </div>
</nav>

<!-- log out Modal -->
<div id="logoutModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Are you sure you want to log out?</h3>
      </div>
      <div class="modal-body" style="margin: 0 auto; width: auto; text-align: center;">
        <a href="logout.php"><button type="confirm" class="btn btn-default" style="margin: auto auto;">Yes</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin: auto auto;">No</button>
      </div>
    </div>
  </div>
</div>

  <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <!--Page Content-->
<div class="container" style="margin-top: 70px;">
  <div class="row">
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Chain Lakes, CA -->

        <div class="panel-heading"><a class="text-success" href="chainlakes.php">Chain Lakes, CA</a></div>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Chain Lakes, CA -->
        <div class="panel-body"><a class="text-success" data-toggle="modal" data-target="#myModal"><img src="Images/maderapeak.jpg" style="height: 100%; width: 100%;"  class="img-responsive" alt="Image"></a></div>

        <!--Images slideshow modal-->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Pictures from Chain Lakes, California June 2015</h3>
              </div>
              <div class="modal-body">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                    <li data-target="#myCarousel" data-slide-to="7"></li>
                    <li data-target="#myCarousel" data-slide-to="8"></li>
                    <li data-target="#myCarousel" data-slide-to="9"></li>
                    <li data-target="#myCarousel" data-slide-to="10"></li>
                    <li data-target="#myCarousel" data-slide-to="11"></li>
                    <li data-target="#myCarousel" data-slide-to="12"></li>
                    <li data-target="#myCarousel" data-slide-to="13"></li>
                    <li data-target="#myCarousel" data-slide-to="14"></li>
                    <li data-target="#myCarousel" data-slide-to="15"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="Images/places/chainlakes/cl1.jpg" alt="Mt. Hood">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl2.jpg" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl3.jpg" alt="Ziplining">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl4.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl5.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl6.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl7.jpg" class="rotateleft" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl8.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl9.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl10.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl11.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl12.jpg" class="rotateright" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl13.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl14.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl15.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/chainlakes/cl16.jpg" class="rotateleft" alt="Flower">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Maupin, OR -->

        <div class="panel-heading"><a class="text-success" href="maupin.php">Maupin, OR</a></div>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Maupin, OR -->
        <div class="panel-body"><a data-toggle="modal" data-target="#myModal1" ><img src="Images/maupin.jpg" class="img-responsive" style="height: 100%; width: 100%;" alt="Image"></a></div>

        <!--Images slideshow modal-->
        <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Pictures from Maupin, Oregon August 2015</h3>
              </div>
              <div class="modal-body">
                <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel1" data-slide-to="1"></li>
                    <li data-target="#myCarousel1" data-slide-to="2"></li>
                    <li data-target="#myCarousel1" data-slide-to="3"></li>
                    <li data-target="#myCarousel1" data-slide-to="4"></li>
                    <li data-target="#myCarousel1" data-slide-to="5"></li>
                    <li data-target="#myCarousel1" data-slide-to="6"></li>
                    <li data-target="#myCarousel1" data-slide-to="7"></li>
                    <li data-target="#myCarousel1" data-slide-to="8"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">

                    <div class="item active">
                      <img src="Images/places/maupin/mp2.jpg" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp1.jpg" class="rotateright" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp3.jpg" alt="Ziplining">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp4.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp5.jpg" class="rotateright" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp6.jpg" class="rotateright" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp7.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp8.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/maupin/mp9.jpg" alt="Flower">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
<!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Silver Falls, OR -->

        <div class="panel-heading"><a class="text-success" href="silverfalls.php">Silver Falls, OR</a></div>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Silver Falls, OR -->
        <div class="panel-body"><a data-toggle="modal" data-target="#myModal2"><img src="Images/places/silverfalls/waterfallportrait.jpg" style="height: 100%; width: 75%; margin: 0 auto;"  class="img-responsive" alt="Image"></a></div>

        <!--Images slideshow modal-->
        <div id="myModal2" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Pictures from Silver Falls, Oregon</h3>
              </div>
              <div class="modal-body">
                <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel2" data-slide-to="1"></li>
                    <li data-target="#myCarousel2" data-slide-to="2"></li>
                    <li data-target="#myCarousel2" data-slide-to="3"></li>
                    <li data-target="#myCarousel2" data-slide-to="4"></li>
                    <li data-target="#myCarousel2" data-slide-to="5"></li>
                    <li data-target="#myCarousel2" data-slide-to="6"></li>
                    <li data-target="#myCarousel2" data-slide-to="7"></li>
                    <li data-target="#myCarousel2" data-slide-to="8"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="Images/places/silverfalls/sf1.jpg" class="rotateleft" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf2.jpg" class="rotateleft" alt="Ziplining">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf3.jpg" class="rotateright" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf4.jpg" class="rotateright" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf5.jpg" class="rotateright" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf6.jpg" class="rotateleft" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf7.jpg" class="rotateleft" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf8.jpg" class="rotateleft" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/silverfalls/sf9.jpg" class="rotateright" alt="Flower">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Spruce Goose Museum -->

        <div class="panel-heading"><a href="sprucegoose.php" class="text-success">Spruce Goose Air Museum</a></div>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Spruce Goose Museum -->
        <div class="panel-body"><a data-toggle="modal" data-target="#myModal3"><img src="Images/places/airmuseum/corsair.jpg" style="height: 100%; width: 100%; margin: 0 auto;"  class="img-responsive" alt="Image"></a></div>

        <!--Images slideshow modal-->
        <div id="myModal3" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Pictures from Spruce Goose Air Museum, Oregon</h3>
              </div>
              <div class="modal-body">
                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel3" data-slide-to="1"></li>
                    <li data-target="#myCarousel3" data-slide-to="2"></li>
                    <li data-target="#myCarousel3" data-slide-to="3"></li>
                    <li data-target="#myCarousel3" data-slide-to="4"></li>
                    <li data-target="#myCarousel3" data-slide-to="5"></li>
                    <li data-target="#myCarousel3" data-slide-to="6"></li>
                    <li data-target="#myCarousel3" data-slide-to="7"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="Images/places/airmuseum/am1.jpg" alt="Madera Peak, CA">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am2.jpg" alt="Ziplining">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am3.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am4.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am5.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am6.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am7.jpg" alt="Flower">
                    </div>

                    <div class="item">
                      <img src="Images/places/airmuseum/am8.jpg" alt="Flower">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel3" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel3" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!--Footer content-->
<footer class="container-fluid text-center" >
    <p>Have Any Questions or Comments?</p>
  <form class="form-inline">Ask Away! <span id="caret" class="glyphicon glyphicon-chevron-right"></span>
    <input type="email" class="form-control" size="50" placeholder="Questions or Comments">
    <button type="button" class="btn btn-danger">Sumbit</button>
  </form>
  <p>Copyright &copy; 2016 by nickglantz.com</p>
</footer>

</body>
</html>
