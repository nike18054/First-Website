<?php require('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: homeloggedin.php'); }

//define page title
$title = 'Home Page';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nick Glantz</title>
  <link rel="icon" href="Images/NGfavicon1.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="wot-verification" content="cfe440343792fc257999"/>
  <meta name="keywords" content="keyword, keyword, cfe440343792fc257999"/>

  <!--Dropdown hover css link-->
  <link rel="stylesheet" type="text/css" href="css/dropdownhover.css">

  <!--jumbotronslideshow-->
  <link rel="stylesheet" type="text/css" href="css/half-slider.css" >

  <!--bootsrap css-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="css/site/home.css">
  <!-- JAVASCRIPT files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/dropdown.js"></script>

  <style>


  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="container-fluid" style="background-color:#F44336;color:#fff;height:250px;">
  <div class="container text-center">
    <h2 align="left">House of Knowledge</h1>
    <p align="right"><img src="Images/NGfavicon1.png" height="150px" width="210px" align="left">Contact Us (559)718-3652</p>
  </div>
</div>

<!--Left side of navbar-->
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="250" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!--Home Navbar-->
        <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!--landscaping Navbar-->
        <li><a href="flp.php"><img src="Images/NGfavicon1.png" height="19px" width="19px"> Fun Lifestyle Program &reg;</a></li>


          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                        <!--Gallery dropdown-->
        <li class="dropdown"><a class="dropdown-toggle" data-hover="dropdown" href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Gallery<span id="caret" class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="chainlakes.php">Chain Lakes, CA</a></li>
            <li><a href="maupin.php">Maupin, OR</a></li>
            <li><a href="silverfalls.php">Silver Falls, OR</a></li>
            <li><a href="sprucegoose.php">Spruce Goose Air Museum, OR</a></li>
          </ul>
        </li>
      </ul>

        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                  <!--Login Navbar-->
        <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
      </ul>

    </div>
  </div>
</nav>


<!--Page Content-->
<div id="section1" class="container-fluid text-center">
  <div class="row content">
   <div class="col-sm-2 sidenav">

   </div>

    <div class="col-sm-8 text-left">
      <h1 align="center">Are you ready to change your life?</h1>
      <p align="center">Register for our programs and we can help you get what you want.</p>
    </div>
  </div>
</div>
<div id="section2" class="container-fluid">

</div>
<div id="section3" class="container-fluid">

</div>
<div id="section4" class="container-fluid">

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
