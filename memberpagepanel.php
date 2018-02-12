<?php require('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//define page title
$title = 'Members Page';
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
  <title><?php if(isset($title)){ echo $title; }?></title>

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

    body { position: relative;}
    #pagebg{ padding-top:58px;height:800px; background-color: #1E88E5;}

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
      margin: 0px;
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

  </style>
</head>
<body>

	<!--Left side of navbar-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
	        <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
	      </ul>

	    </div>
	  </div>
	</nav>

	<!-- log out Modal -->
	<div id="myModal" class="modal fade" role="dialog">
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

	<div class="container-fluid" id="pagebg">
		<div class="row">
      <div class="col-sm-4">
        <a href="chowder136/index.php"><button type="button" class="btn btn-danger btn-lg">Database</button></a>
		</div>
	</div>

</body>
</html>
