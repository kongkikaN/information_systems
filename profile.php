<?php
	session_start();
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Science Archive</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="functions/functions.js"></script>
    <?php 
    if (isset($_SESSION["user_id"])){
      $user_id = $_SESSION["user_id"];
      if (isAdministrator($user_id)){
        echo '<div class="alert alert-danger" role="alert">
          Welcome admin,' . $_SESSION["first_name"].'. Click <a href = "users.php">HERE</a> to display users.
        </div>';
      }
    }
    ?>
</head>
<body>
	<!-- Header -->
<header class="banner">
	<span class="background"></span>
	<h1><a href="index.php"><img src="images/logo.png" width="500px"></a></h1>
</header>

<script>
	$("header").slideUp(1500);
</script>
<nav id="navigation">
  	<ul style = "background-color: #080519;">
  		<div style = "background-color: #080519;" class = "container">
  			<li><a href="index.php">Home</a></li>
  			<?php toggleLogInLogOut(); ?>
	  	  	
	    	<li><a href="about.php">About</a></li>
	  		<form method = 'get' action = "index.php">
		  		<li style="float:right"><input type="submit" value = "search" style = "margin-top : 11px; margin-right:88px;" name="search_bar" placeholder="Information Systems"></li>
		   		<li style="float:right"><input type="text" style = "margin-top : 11px; margin-right: 5px;" name="search_bar" placeholder="search"></li>
	   		</form>
		</div>
  	</ul>
</nav>
<!-- MODAL STUFF -->
<!-- Other stuff -->
<main>
	<div class = "container">
	  	<h2 style="text-align:center">Your Profile</h2>

<div class="card">
  <img src="images/avatar.png" alt="John" style="width:250px">
  <h1><?php echo getUserInfo($_SESSION["user_id"]); ?></h1>
  <p class="title">Student</p>
  <p><?php 
  	if (isset($_SESSION["user_id"])){
  		echo getCategory($_SESSION["user_id"]);
  	}
  	
   ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="anch fa fa-dribbble"></i></a> 
    <a href="#"><i class="anch fa fa-twitter"></i></a>  
    <a href="#"><i class="anch fa fa-linkedin"></i></a>  
    <a href="#"><i class="anch fa fa-facebook"></i></a> 
 </div>
 <p><button> <a  href = "upload_article.php"> Upload Article </a></button></p>
</div>
  	</div>
</main>
<?php 	
	include 'login_modal.php';
	include 'register_modal.php'; 
?>
</body>
</html>