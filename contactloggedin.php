<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: contact.php'); }

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

  <!--dropdown hover css link-->
  <link rel="stylesheet" type="text/css" href="css/dropdownhover.css">

  <!--bootsrap css-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


  <link rel="stylesheet" type="text/css" href="css/site/cont_loginp.css">

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

<script src='https://www.google.com/recaptcha/api.js'></script>
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
                  <!--Rightside of navbar Navbar-->
      <ul class="nav navbar-nav navbar-right">
          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!--Contact Navbar-->
        <li class="active"><a href="contact.php">Contact</a></li>

          <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                    <!--login-->
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
<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                <!--Page Content-->
<div class="container-fluid">
  <div class="row content" style="margin-top: 70px;">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">

      <iframe class="embed-responsive-item" src="contactform/contactform.php" width="auto" height="800" frameBorder="0" > <img src="Images/NGfavicon1.png" height="150px" width="210px"></iframe>
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
