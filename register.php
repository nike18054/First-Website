<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

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
	<link rel="stylesheet" type="text/css" href="css/site/register.css">

  <!-- JAVASCRIPT files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/dropdown.js"></script>
</head>
<body>

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

	<div class="container">

		<div class="row">

		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" method="post" action="" autocomplete="off">
					<h2>Please Sign Up</h2>
					<p>Already a member? <a href='login.php'>Login</a></p>
					<hr>

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
			</div>
		</div>

	</div>

<?php
//include header template
require('layout/footer.php');
?>
