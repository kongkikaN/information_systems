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
	  	<?php 
	  		echoCurrentArticle($_GET["id"]);
	  	?>

	  	<span id = "credits" style="float: right;">
	  		<h3>Author(s)</h3>
	  		<p><?php echo getAuthorsOfArticle($_GET['id']); ?></p>
	  		<p><?php echo getArticleCategoryById($_GET['id']); ?></p>
	  		<p>Click <a <?php echo 'href = "'. getArticlePath($_GET["id"]) .'"' ?>>here</a> to download.</p>
	  	</span>
  	</div>
</main>
<?php 	
	include 'login_modal.php';
	include 'register_modal.php'; 
?>
</body>
</html>