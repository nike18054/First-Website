<?php require('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: galleryloggedin.php'); }

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

  <script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
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
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
      </ul>

    </div>
  </div>
</nav>
  <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <!--Page Content-->
<div class="container" style="margin-top: 70px;">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Chain Lakes, CA -->
        <div class="panel-heading"><a class="text-success" href="chainlakes.php">Chain Lakes, CA</a></div>
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Chain Lakes, CA -->
        <div class="panel-body"><a href="chainlakes.php" data-toggle="tooltip" data-placement="bottom" title="Log in to view slideshow"><img src="Images/maderapeak.jpg" style="height: 100%; width: 100%;"  class="img-responsive" alt="Image"></a></div>
      </div>
    </div>



    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Maupin, OR -->
        <div class="panel-heading"><a class="text-success" href="maupin.php">Maupin, OR</a></div>
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Maupin, OR -->
        <div class="panel-body"><a href="maupin.php" data-toggle="tooltip" data-placement="bottom" title="Log in to view slideshow"><img src="Images/maupin.jpg" class="img-responsive" style="height: 100%; width: 100%;" alt="Image"></a></div>

      </div>
    </div>


    <div class="col-sm-4">
      <div class="panel panel-success">
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Silver Falls, OR -->
        <div class="panel-heading"><a class="text-success" href="silverfalls.php">Silver Falls, OR</a></div>
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Silver Falls, OR -->
        <div class="panel-body"><a href="silverfalls.php" data-toggle="tooltip" data-placement="bottom" title="Log in to view slideshow"><img src="Images/places/silverfalls/waterfallportrait.jpg" style="height: 100%; width: 75%; margin: 0 auto;"  class="img-responsive" alt="Image"></a></div>
      </div>
    </div>
  </div>
  <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-success">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                      <!-- panel-heading for Spruce Goose Museum -->

        <div class="panel-heading"><a href="sprucegoose.php" class="text-success">Spruce Goose Air Museum</a></div>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!-- Image for Spruce Goose Museum -->
        <div class="panel-body"><a href="sprucegoose.php" data-toggle="tooltip" data-placement="bottom" title="Log in to view slideshow"><img src="Images/places/airmuseum/corsair.jpg" style="height: 100%; width: 100%; margin: 0 auto;"  class="img-responsive" alt="Image"></a></div>

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
