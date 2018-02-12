<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: flploggedin.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}

	}

	if(strlen($_POST['password']) < 6){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 6){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//send email
			$to = $_POST['email'];
			$subject = "Registration Confirmation";
			$body = "<p>Thank you for registering!.</p>
			<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			<p>Thanks for registering! Enjoy more content like pictures and videos for free!</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: login.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Demo';
?><!DOCTYPE html>
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
  <link rel="stylesheet" type="text/css" href="css/site/flp.css">
  <!-- JAVASCRIPT files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/dropdown.js"></script>
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
          <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!--!!!!!!!!!!!!!!!!!-->
<div id="section1" class="container-fluid">
  <h2>We meet every month and go places!</h2>
  <p>This program is for those who are looking to meet new friends and go cool places!</p>
  <p>Join now for access to fun equipment and great people for only $19.99/Month</p>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-lg" style="margin-left:15%" data-toggle="modal" data-target="#myModal">Join Now!</button>
  <!-- Join Now Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!--Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Almost Here!</h3>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="" autocomplete="off">
            <?php
            //check for any errors
            if(isset($error)){
              foreach($error as $error){
                echo '<p class="bg-danger">'.$error.'</p>';
              }
            }

            //if action is joined show sucess
            if(isset($_GET['action']) && $_GET['action'] == 'joined'){
              echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account. May take a few minutes.</h2>";
            }
            ?>

            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
            </div>
          </form>
          <div class="modal-footer">
						<p style="color:black">Already a member? <a href='login.php'><button type="button" class="btn btn-sm btn-info">Login</button></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <p>Join now for unlimited access to events and headquaters.</p>
  <p>Still unsure about joining the fun? No Problem, ask us any questions you have and we will be more than happy to talk to you more about what we do!</p>

  <a href="register.php"><button type="button" class="btn btn-success btn-lg" id="bottomjoin" style="margin-left:15%" href="register.php">Join Now!</button></a>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-lg" id="bottomjoin" style="margin-left:15%" data-toggle="modal" data-target="#myModal1">Join Now!</button>
  <!-- Join Now Modal -->
  <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Almost Here!</h3>
        </div>
        <div class="modal-body">
					<form role="form" method="post" action="" autocomplete="off">
						<?php
						//check for any errors
						if(isset($error)){
							foreach($error as $error){
								echo '<p class="bg-danger">'.$error.'</p>';
							}
						}

						//if action is joined show sucess
						if(isset($_GET['action']) && $_GET['action'] == 'joined'){
							echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account. May take a few minutes.</h2>";
						}
						?>

						<div class="form-group">
							<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
						</div>
					</form>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
