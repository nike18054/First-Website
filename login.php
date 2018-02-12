<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }



//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($user->login($username,$password)){
		$_SESSION['username'] = $username;
		header('Location: memberpage.php');
		exit;
	}
 	else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}

}//end if submit

//define page title
$title = 'Login';

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

  <style>

    body { position: relative;}
    #loginpage{ padding-top:58px;height:800px; background-color: #1E88E5;}

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
    .loginback {
      background-color: #5cb85c;
      padding-top: 17px;
      border-radius: 10px;
      border: 2px solid #fff;
    }

    .user-img-back {
      background-color: rgba(242, 242, 242, 0.5);
      padding: 10px 10px 10px 10px;
      height: 225px;
      width: 235px;
      border-radius: 10px;
      margin: 0 auto;
      border: 2px solid #fff;
    }

    .user-img {
      border: 2px solid #fff;
      border-radius: 10px;
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
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
      </ul>

    </div>
  </div>
</nav>


<!--Page Content-->
<div id="loginpage"class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4 loginback">
      <div class="user-img-back">
        <img src="Images/loginuser.png" class="user-img" height="200px" width="210px" alt="user">
      </div>
      <form role="form" method="post" action="" autocomplete="off">

        <?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h3>Your account is now active you may now log in.</h3>";
							break;
						case 'reset':
							echo "<h3>Please check your inbox for a reset link.</h3>";
							break;
						case 'resetAccount':
							echo "<h3>Password changed, you may now login.</h3>";
							break;
						case 'contentreq':
							echo "<h3>Log in or create an account to view more content</h3>";
							break;
					}

				}

				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h3>Registration successful, please check your email to activate your account. May take a few minutes.</h3>";
				}

				?>

        <div class="form-group" style="padding-top: 25px;">
          <label for="username" style="color: white;">Username:</label>
          <input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
        </div>
        <div class="form-group">
          <label for="pwd" style="color: white;">Password:</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="3">
        </div>
        <!--Login Button-->
				<div class="row">
        	<input type="submit" name="submit" value="Login" class="btn btn-info btn-lg" tabindex="5">
				</div>
				<div class="row">
					<div style="margin-top: 5px; text-align: center; margin-bottom: 5px;">
						 <a href="reset.php" style="color: white;"><button type="button" class="btn btn-info btn-sm">Forgot your Password?</button></a>
					</div>
				</div>
      </form>
    </div>
    <div class="col-sm-4">
			<div class="panel panel-success">
				<div class="panel-heading">
					<p>Not a Member?</p>
				</div>
				<div class="panel-body" style="padding: 5px;">
					<a href="register.php"><button type="button" class="btn btn-info btn-lg" style="height: 95%; width: 95%; margin: 5px auto;">Join Here!</button></a>
				</div>
			</div>
    </div>
  </div>
</div>


<!--Footer content-->
<footer class="container-fluid text-center">
    <p>Subscribe to my email service to receive daily knowledge</p>
  <form class="form-inline">Subscribe Here <span id="caret" class="glyphicon glyphicon-chevron-right"></span>
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Subscribe</button>
    <p>Copyright &copy; 2016 by nickglantz.com</p>
  </form>
</footer>




</body>
</html>
