<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: flp.php'); }

//define page title
$title = 'Fun Lifestyle Program Page';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nick Glantz</title>
  <link rel="icon" href="Images/NGfavicon1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
    body {
        position: relative;}
    #section1 {padding-top:50px;height:600px;color: #fff; background-color: #1E88E5;}
    #section2 {padding-top:50px;height:600px;color: #fff; background-color: #673ab7;}
    #section3 {padding-top:50px;height:600px;color: #fff; background-color: #ff9800;}
    #section4 {padding-top:50px;height:600px;color: #fff; background-color: #00bcd4;}

    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
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
      z-index: 1;
      opacity: 0.90;
      filter: alpha(opacity=90); /* For IE8 and earlier */
    }
    .navbar-inverse:hover {
      opacity: 1.0;
      filter: alpha(opacity=100); /* For IE8 and earlier */
    }

    .carousel-inner > .item > img{
        max-width: 950px;
        width:100%;
        height: 350px;
        margin: auto auto;
       }
     .carousel {
       width: 100%;
       margin: auto auto;
       padding: 0 0 0 0;
      }

      @media (max-width: 599px) {
      .carousel-inner > .item > img{
          width: 100%%;
          height: 150px;
      }
      #section2 {
        height: 800px;
      }
      }

      @media (min-width: 600px) and (max-width: 767px) {
      .carousel-inner > .item > img{
          width:100%;
          height: 250px;
      }}

     .affix {
          top: 0;
          width: 100%;
      }

      .affix + .container-fluid {
          padding-top: 70px;
          margin-top: 50px;
      }

      #bottomjoin:hover {
        background-color: #00bcd4;
      }

      /* Add a gray background color and some padding to the footer */
      footer {
  	  background-color: #f2f2f2;
        padding: 25px;
      }

  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0">

  <div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
    <h1>Fun Lifestyle Program</h1>
    <h3 id="caret">For those looking for a good time</h3><br>
    <p id="caret">This program is for those who are looking to meet new friends and go cool places!</p>
  </div>

<!--navbar-->
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="dropdown"><a class="dropdown-toggle" data-hover="dropdown" href="home.php"><span class="glyphicon glyphicon-home"></span> Home <span id="caret" class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="contact.php">Contact</a></li>
              <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>
            </ul>
          </li>
          <li><a href="#section1">Fun Lifestyle Program &reg;</a></li>
          <li><a href="#section2">Events</a></li>
          <li><a href="#section3">Videos</a></li>
          <li><a href="#section4">Membership</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a data-toggle="modal" data-target="#logoutModal"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
        </ul>
      </div>
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

<!--!!!!!!!!!!!!!!!!!-->
<div id="section1" class="container-fluid">
  <h2>Thanks for logging in.</h2>
  <p>im planning on going camping this summer</p>
  <p>If you want more information. Contact me.</p>

</div>

<!--!!!!!!!!!!!!!!!!!-->
<div id="section2" class="container-fluid">
  <h1>We are very active and know some sweet spots around Oregon</h1>
  <div class="container-fluid" style="margin-top: 50pxpx;">
    <div class="row">
  <!-- Accordian collapse buttons-->
      <div class="col-sm-6">
        <div class="panel panel-info" style="background-color: #673ab7; margin-bottom: 0px;">
          <div class="panel-heading">
            <h2 class="well panel-title" style="text-align: center;">Our Monthly activities include</h2>
          </div>
          <div class="panel-body">
            <div class="panel-group" id="accordion">
              <div class="panel panel-success">
                <div class="panel-heading" style="text-align: center; box-shadow: 0 0 20px rgba(0,0,0,0.9); cursor: pointer;" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                  <h4 class="panel-title" style="cursor: pointer;">
                    Hiking
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                  <div class="panel-body"> We love day hikes in all places especially mountain and beach areas. If you have any ideas on where to go we would love to hear them and we most likely go.
                    Sign up to join us on our day hikes.
                  </div>
                </div>
              </div>
              <div class="panel panel-success">
                <div class="panel-heading" style="text-align: center; box-shadow: 0 0 20px rgba(0,0,0,0.9); cursor: pointer;" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  <h4 class="panel-title" style="cursor: pointer;">
                    Camping
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">We know of a few campsites that are secluded from city limits.
                    We love camping and hiking and enjoy the outdoors and adventures.
                    There are so many places to go here in Oregon and we would like you to join along with us for the adventure!
                  </div>
                </div>
              </div>
              <div class="panel panel-success">
                <div class="panel-heading" style="text-align: center; box-shadow: 0 0 20px rgba(0,0,0,0.9); cursor: pointer;" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                  <h4 class="panel-title" style="cursor: pointer;">
                    Geocaching
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body">If you have not heard of geocaching by now its basically a world-wide treasure hunt and you use a gps to find caches people hide everywhere.
                  Help us increase our find count and participate in the world-wide treasure hunt! For more info visit the <a href="https://www.geocaching.com/play" target="_blank">geocaching website</a>.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- Slideshow Div-->
      <div class="col-sm-6">
        <div class="panel panel-success">

            <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!-- panel-heading for Chain Lakes, CA -->

          <div class="panel-heading" href="gallery.php"  style="text-align: center; box-shadow: 0 0 20px rgba(0,0,0,0.9); font-size: 20pt;"><a href="gallery.php" class="bg-success text-success">Our Gallery</a></div>


            <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- Image for Chain Lakes, CA -->
          <div class="panel-body" style="padding: 0 0 0 0;">
            <a href="gallery.php">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="Images/2mohd.jpg" alt="Mt. Hood">
                  </div>

                  <div class="item">
                    <img src="Images/maderapeak.jpg" alt="Madera Peak, CA">
                  </div>

                  <div class="item">
                    <img src="Images/zipline.jpg" alt="Ziplining">
                  </div>

                  <div class="item">
                    <img src="Images/maupin.jpg" alt="Flower">
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
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--!!!!!!!!!!!!!!!!!-->
<div id="section3" class="container-fluid">
  <h1>Want to be a part of something big and learn along the way?</h1>
  <p>You may have seen our videos on youtube and wondered if you could be a part of them? Well you can! We are very enthusiastic in learning and teaching.</p>
</div>
<!--!!!!!!!!!!!!!!!!!-->
<div id="section4" class="container-fluid">
  <h1>We try to make membership affordable</h1>
  <p></p>
  <p>Still unsure about joining the fun? No Problem, ask us any questions you have and we will be more than happy to talk to you more about what we do!</p>
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
