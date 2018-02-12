<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: home.php'); }

// if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
//     echo"<script>alert('15 M#inutes over!');</script>";
//     unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
//     $_SESSION['loggedin'] == false;
//     header("Location: " . home.php); //redirect to index.php
//     exit;
// } else {
//     $_SESSION['timestamp'] = time(900); //set new timestamp
// }

//define page title
$title = 'Contact Page';

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

  <!-- JAVASCRIPT files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/dropdown.js"></script>

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

    /* Remove the jumbotron's default bottom margin */
   .jumbotron {
    margin-bottom: 0;
    }

    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
    }

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

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
      margin: 0;
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

      .affix {
           top: 0;
           width: 100%;
       }

       .affix + .container-fluid {
           padding-top: 70px;
           margin-top: 50px;
       }

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
