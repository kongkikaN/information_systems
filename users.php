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
        <form method = 'get'>
          <li style="float:right"><input type="submit" value = "search" style = "margin-top : 11px; margin-right:88px;" name="search_bar" placeholder="Information Systems"></li>
          <li style="float:right"><input type="text" style = "margin-top : 11px; margin-right: 5px;" name="search_bar" placeholder="search"></li>
        </form>
    </div>
    </ul> 
</nav>
<main>
  <div class = "col-md-2"></div>
  <div class = "col-md-8">
    <br>
    <br>
    <table = class = "table table-striped">
      <thead class = "warning">
        <tr>
          <th scope = "col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">E-mail</th>
          <th scope="col">Status</th>
          <th scope="col">Delete</th>
          <th scope="col">Change Privileges</th>
        </tr>
        

      </thead>
      <tbody>
        <?php getAllUserData() ?>
      </tbody>
    </table>
  </div>
  <div class = "col-md-2"></div>
</main>
<?php   
  include 'login_modal.php';
  include 'register_modal.php'; 
?>
</body>
</html>