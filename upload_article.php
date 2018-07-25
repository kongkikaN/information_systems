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
	<h1><a href="index.php"><img id = "logo" src="images/logo.png" width="500px"></a></h1>
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
      <h2>Article Info</h2>
      <form enctype="multipart/form-data" method = "post" class="form-horizontal" action="upload.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="article_category">Category:</label>
          <div class="col-sm-10">
              <select class = "form-control input-lg" id = "article_category" name = "article_category">
              <option value="" disabled selected>Select your option</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Physics">Physics</option>
              <option value="Oceanography">Oceanography</option>
              <option value="Space_Science_or_Astronomy">Space Science or Astronomy</option>
              <option value="Biology">Biology</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Theoretical computer science">Theoretical computer science</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="article_title">Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" placeholder="Enter article title" name="article_title">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="article_description">Description:</label>
          <div class="col-sm-10">          
            <textarea name="article_description" class="form-control" rows = "15" id = "article_description">Enter text here...</textarea>
          </div>
        </div>
        <div class = "form-group">
          <label class="control-label col-sm-2" for="article_description">Author/s:</label>
          <div class="col-sm-10"> 
            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
          </div> 
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>
        </div>
        <div class="form-group">  
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
  	</div>
</main>
<?php 	
	include 'login_modal.php';
	include 'register_modal.php'; 
?>
</body>
</html>