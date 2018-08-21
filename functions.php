<?php

	/*
		user management
	 */
	function registerUser($first_name, $last_name, $email, $password, $category, $academic_degree, $unipi_id){


		if ($unipi_id == "123456"){
			$conn = createConnectionToDatabase();

			$query = "INSERT INTO `users` (`inf_user_id`, `inf_first_name`, `inf_last_name`, `inf_email`, `inf_password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password');";
			insertDataToDBQuery($conn, $query);

			mysqli_close($conn);

			$conn = createConnectionToDatabase();
			$query1 = "INSERT INTO `categories` (`inf_user_id`, `inf_category_type`) VALUES (".getUserIdByEmail($email) .", '$category');";
			insertDataToDBQuery($conn, $query1);

			mysqli_close($conn);

			$conn = createConnectionToDatabase();
			$query2 = "INSERT INTO `academic_degree` (`inf_user_id`, `inf_academic_degree`) VALUES (".getUserIdByEmail($email) .", '$academic_degree');";
			insertDataToDBQuery($conn, $query2);


			echo '<script>alert("You registered your user Successfully to Database");</script>';
		}
		else {
			echo '<script>alert("Id You Entered is Wrong.");</script>';
		}
		
		
	}

	function logInUser($email, $password){
		$conn = createConnectionToDatabase();
		$query = "SELECT * FROM users WHERE inf_email = '$email'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_password = $row["inf_password"];
			if ($inf_password == $password){
				if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
				$_SESSION["user_id"] = $row["inf_user_id"];
				$_SESSION["first_name"] = $row["inf_first_name"];
				$_SESSION["last_name"] = $row["inf_last_name"];
				$_SESSION["email"] = $row["inf_email"];
				echo '<script>alert("Connected Successfully User!! '.$_SESSION["email"].'");</script>';
				//header('Location: '. "index.php");
			}
		}
		if (!isset($_SESSION["email"])){
			echo '<script>alert("Something Went Wrong, Please Try Again Or Register");</script>';
		}
	}

	function logoutUser(){
		//end session and clear all data
		session_start();
		session_unset();
		session_destroy();
		//redirect to index.php
		header('Location: '. "index.php");
	}

	/*
		database management
	 */
	function insertDataToDBQuery($conn, $query){
		if ($conn->multi_query($query) === TRUE) {

		}
		else {
		    echo "Error: " . $query . "<br>" . $conn->error;
		}
	}

	function selectDataFromDBQuery($conn, $query){
		$result = $conn->query($query);
		return $result;
	}

	function createConnectionToDatabase(){
		$servername = "localhost";
		$db_username = "root";
		$db_password = "";
		$dbname = "inf_sys";

		$conn =new mysqli($servername, $db_username, $db_password, $dbname);
			// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		//return connection
		return $conn;
	}

	/*
		display functions
	 */
	function toggleLogInLogOut(){
		if (isset($_SESSION["email"])){
			echo '<li id = "profile"><a href="profile.php" >Profile</a></li>';
			echo '<li id = "logout_li"><a href="logout.php" >LogOut</a></li>';
		}
		else {
			echo '<li id = "login_li"><a href="#" data-toggle = "modal" data-target = "#login_modal">Log In</a></li>';
			echo '<li id = "register_li"><a href="#" data-toggle = "modal" data-target = "#register_modal">Register</a></li>';
		}
	}

	function echoAllArticles(){
		$conn = createConnectionToDatabase();
		$query = "select * from articles";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_title = $row["inf_article_title"];
			$inf_article_description = $row["inf_article_description"];
			$inf_article_id = $row["inf_article_id"];
			echo '<article>
	    	<h1><a class = "article_title" href="article.php?id='.$inf_article_id.'">'.$inf_article_title.'</a></h1>
	    	<p>'.substr($inf_article_description, 0, 340).'</p>
	    	<p style = "float:right"> ' .
	    		getArticleCategoryById($inf_article_id).' </p>
	    	<br> 
	  		</article>';
		  	if (!$row["inf_approved"]){
		  		echo '<form action = "index.php" method = "post">
		  			<button type="submit" value="'.$inf_article_id.'" name = "approve_form">Approve</button>
		  		</form>';
		  	}
		}
	}

	function echoApprovedArticles(){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_approved = 1";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_title = $row["inf_article_title"];
			$inf_article_description = $row["inf_article_description"];
			$inf_article_id = $row["inf_article_id"];
			echo '<article>
	    	<h1><a class = "article_title" href="article.php?id='.$inf_article_id.'">'.$inf_article_title.'</a></h1>
	    	<p>'.substr($inf_article_description, 0, 340).'</p>

	    	<p style = "float:right"> ' .
	    		getArticleCategoryById($inf_article_id).' </p>
	    	<br> 
	  		</article>';
		  	
		}
	}

	

	function getArticleCategoryById($id){
		$conn = createConnectionToDatabase();
		$query = "select * from article_category where inf_article_id = '$id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_category = $row["inf_article_category"];
	  	}
	  	if (isset($inf_article_category)){
	  		return $inf_article_category;
	  	}
	  	else{
	  		return "No category Specified";
	  	}
	}

	function echoUsersArticles($user_id){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_user_id = '$user_id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_title = $row["inf_article_title"];
			$inf_article_description = $row["inf_article_description"];
			$inf_article_id = $row["inf_article_id"];
			echo '<article>
	    	<h1><a class = "article_title" href="article.php?id='.$inf_article_id.'">'.$inf_article_title.'</a></h1>
	    	<p>'.$inf_article_description.'</p>
	  	</article>';
		}
	}

	function echoCurrentArticle($article_id){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_article_id = '$article_id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_title = $row["inf_article_title"];
			$inf_article_description = $row["inf_article_description"];
			$inf_article_id = $row["inf_article_id"];
			echo '<article>
	    	<h1><a class = "article_title" href="article.php?id='.$inf_article_id.'">'.$inf_article_title.'</a></h1>
	    	<p>'.$inf_article_description.'</p>
	  	</article>';
	  	}
	}

	function getAuthorsOfArticle($article_id){
		$conn = createConnectionToDatabase();
		$query = "select * from authors where inf_article_id = '$article_id'";
		$result = selectDataFromDBQuery($conn, $query);

		$authors = "";
		while($row = $result->fetch_assoc()){
			$inf_author_first_name = $row["inf_Author_first_name"];
			$inf_author_last_name = $row["inf_Author_last_name"];
			$inf_author_id = $row["inf_Author_id"];
			$authors = $authors . ' '. '<a href = "author.php?id='.$inf_author_id.'">'.$inf_author_last_name . ' '. $inf_author_first_name.'</a>,';

		}
		return $authors;
	}

	function searchFor($search_input){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_article_title like '%$search_input%' or inf_article_description like '%$search_input%' and inf_approved=1";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_article_title = $row["inf_article_title"];
			$inf_article_description = $row["inf_article_description"];
			$inf_article_id = $row["inf_article_id"];
			echo '<article>
	    	<h1><a class = "article_title" href="article.php?id='.$inf_article_id.'">'.$inf_article_title.'</a></h1>
	    	<p>'.substr($inf_article_description, 0, 340).'</p>
	  	</article>';
	  	}
	}

	function getCategory($user_id){
		$conn = createConnectionToDatabase();
		$query = "select * from categories where inf_user_id = '$user_id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_category_type = $row["inf_category_type"];
		}

		return $inf_category_type;
	}

	function getUserInfo($user_id){
		$conn = createConnectionToDatabase();
		$query = "select * from users where inf_user_id = '$user_id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$inf_first_name = $row["inf_first_name"];
			$inf_last_name = $row["inf_last_name"];
		}

		return $inf_first_name. " " . $inf_last_name;
	}

	function getUserIdByEmail($user_email){
		$conn = createConnectionToDatabase();
		$query = "select * from users where inf_email = '$user_email'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			if ($row["inf_email"] == $user_email){
				$inf_user_id = $row["inf_user_id"];
			}
		}
		return $inf_user_id;
	}

	function createArticle($inf_article_title, $inf_article_description, $inf_article_url, $inf_user_id){
		$conn = createConnectionToDatabase();

		$query = "INSERT INTO `articles` (`inf_article_id`, `inf_article_title`, `inf_article_description`, `inf_article_url`, `inf_user_id`) VALUES (NULL, '$inf_article_title', '$inf_article_description', '$inf_article_url', '$inf_user_id');";
		insertDataToDBQuery($conn, $query);

		mysqli_close($conn);
	}

	function getArticleIdByUrl($article_url){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_article_url = '$article_url'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			if ($row["inf_article_url"] == $article_url){
				$inf_article_id = $row["inf_article_id"];
			}
		}
		return $inf_article_id;
	}

	function createAuthor($inf_article_author_first_name, $inf_article_author_last_name, $inf_article_id){
		$conn = createConnectionToDatabase();

		$query = "INSERT INTO `authors` (`inf_article_id`, `inf_Author_id`, `inf_Author_first_name`, `inf_Author_last_name`) VALUES ('$inf_article_id', NULL , '$inf_article_author_first_name', '$inf_article_author_last_name');";
		insertDataToDBQuery($conn, $query);

		mysqli_close($conn);
	}


	function getArticlePath($article_id){
		$conn = createConnectionToDatabase();
		$query = "select * from articles where inf_article_id = '$article_id'";
		$result = selectDataFromDBQuery($conn, $query);

		while($row = $result->fetch_assoc()){
			$article_path = $row["inf_article_url"];
		}
		return $article_path;
	}

	function redirectTo($url){
		header('Location: '. $url);
	}

	function addArticleCategory($inf_article_id, $inf_category_type){
		$conn = createConnectionToDatabase();

		$query = "INSERT INTO `article_category` (`inf_article_id`, `inf_article_category`) VALUES ('$inf_article_id', '$inf_category_type');";
		insertDataToDBQuery($conn, $query);

		mysqli_close($conn);
	}

	function isAdministrator($inf_user_id){
		$conn = createConnectionToDatabase();
		$query = "select * from administrators where inf_user_id = '$inf_user_id'";
		$result = selectDataFromDBQuery($conn, $query);
		$isAdmin = false;

		while($row = $result->fetch_assoc()){
			$isAdmin = true;
		}
		return $isAdmin;
	}

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['approve_form'])){
		$inf_article_id = $_POST["approve_form"];
        approveArticle($inf_article_id);
    }

    function approveArticle($article_id){
    	$conn = createConnectionToDatabase();
		$query = "UPDATE `articles` SET `inf_approved` = '1' WHERE `articles`.`inf_article_id` = '$article_id';";

		if ($conn->query($query) === TRUE) {
		} else {
		    echo "Error updating record: " . $conn->error;
		}
    }

    

    function thumbsUp($article_id){
    	if (isset($_SESSION["user_id"])){
    		$user_id = $_SESSION["user_id"];
	    	$conn = createConnectionToDatabase();
	    	$query1 = "select * from `article_rating` where `inf_user_id` = '$user_id' AND `inf_article_id` = '$article_id'";
	    	$result = selectDataFromDBQuery($conn, $query1);
	    	if (mysqli_num_rows($result)==0){
	    		$query = "INSERT INTO `article_rating` (`inf_article_id`, `inf_rating_id`, `inf_article_thumbs_up`, `inf_article_thumbs_down`, `inf_user_id`) VALUES ('$article_id', NULL, '1', '0', '$user_id');";

	    		insertDataToDBQuery($conn, $query);
	    	}
	    	else {
	    		echo '<script>alert("You have already rated this article");</script>';
	    	}

			mysqli_close($conn);
	    	//echo '<script>alert("You rated this article Successfully");</script>';
    	}
    	else {
    		echo '<script>alert("Please Log in First");</script>';
    	}
    }

    function thumbsDown($article_id){
    	if (isset($_SESSION["user_id"])){
    		$user_id = $_SESSION["user_id"];
	    	$conn = createConnectionToDatabase();
	    	$query1 = "select * from `article_rating` where `inf_user_id` = '$user_id' AND `inf_article_id` = '$article_id'";
	    	$result = selectDataFromDBQuery($conn, $query1);
	    	if (mysqli_num_rows($result)==0){
	    		$query = "INSERT INTO `article_rating` (`inf_article_id`, `inf_rating_id`, `inf_article_thumbs_up`, `inf_article_thumbs_down`, `inf_user_id`) VALUES ('$article_id', NULL, '0', '1', '$user_id');";

	    		insertDataToDBQuery($conn, $query);
	    	}
	    	else {
	    		echo '<script>alert("You have already rated this article");</script>';
	    	}

			mysqli_close($conn);
	    	//echo '<script>alert("You rated this article Successfully");</script>';
    	}
    	else {
    		echo '<script>alert("Please Log in First");</script>';
    	}
    }

    function getRating($article_id){
    	$conn = createConnectionToDatabase();
    	$query = "select * from article_rating where inf_article_id = '$article_id';";
    	$result = selectDataFromDBQuery($conn, $query);

    	$thumbs_up = 0;
    	$thumbs_down = 0;

    	while ($row = $result->fetch_assoc()){
    		$thumbs_up = $thumbs_up + $row["inf_article_thumbs_up"];
    		$thumbs_down = $thumbs_down + $row["inf_article_thumbs_down"];

    	}
    	if ($thumbs_up + $thumbs_down == 0){
    		$rating = 50;
    	}
    	else {
    		$rating = ceil(($thumbs_up / ($thumbs_down + $thumbs_up)) * 100);
    		
    	}
    	return $rating .'%';
    }

    function getAllUserData(){
    	$conn = createConnectionToDatabase();
    	$query = "select * from users";
    	$result = selectDataFromDBQuery($conn, $query);
    	$counter = 1;
    	while ($row = $result->fetch_assoc()){

    		echo printUser($row["inf_first_name"], $row["inf_last_name"], $row["inf_email"], $counter,
    			isAdministrator($row["inf_user_id"]), $row["inf_user_id"]);
    		$counter = $counter +1;
    	}
    }

    function printUser($f_name, $l_name, $e_mail, $counter, $status, $user_id){
    	$user_status = "simple user";
    	if ($status){
    		$user_status = "administrator";
    	}
    	if ($status){
    		return '<tr>
			        <td>'.$counter.'</td>
			        <td>'.$f_name.'</td>
			        <td>'.$l_name.'</td>
			        <td>'.$e_mail.'</td>
			        <td>'.$user_status.'</td>
			        <td>
			        <form method = "post">
			        	<button type = "submit" name = "delete_btn" value = "'.$user_id.'">Delete</button>
			        </form>
			        </td>
			        <td>
			        <form method = "post">
			        	<button type = "submit" name = "deleteAdmin_btn" value = "'.$user_id.'">Remove Admin</button>
			        </form>
			        </td>
		        </tr>';
    	}
    	else {
    	return '<tr>
			        <td>'.$counter.'</td>
			        <td>'.$f_name.'</td>
			        <td>'.$l_name.'</td>
			        <td>'.$e_mail.'</td>
			        <td>'.$user_status.'</td>
			        <td>
			        <form method = "post">
			        	<button type = "submit" name = "delete_btn" value = "'.$user_id.'">Delete</button>
			        </form>
			        </td>
			        <td>
			        <form method = "post">
			        	<button type = "submit" name = "makeadmin_btn" value = "'.$user_id.'">Make Admin</button>
			        </form>
			        </td>
		        </tr>';
		    }
    }

    function makeAdmin($user_id){
    	$conn = createConnectionToDatabase();
    	$query = "INSERT INTO `administrators` (`inf_user_id`, `inf_admin_id`) VALUES ('$user_id', NULL) ";
    	insertDataToDBQuery($conn, $query);
    }

    function deleteAdmin($user_id){
    	$conn = createConnectionToDatabase();
    	$query = "DELETE FROM administrators WHERE inf_user_id='$user_id'";
    	if ($conn->query($query) === TRUE) {
		    echo '<script>alert("Record deleted successfully");</script>';
		} else {
		}
    }


    function deleteUser($user_id){
    	$conn = createConnectionToDatabase();
    	$query = "DELETE FROM users WHERE inf_user_id='$user_id'";
    	if ($conn->query($query) === TRUE) {
		    echo '<script>alert("Record deleted successfully");</script>';
		} else {
		}
    }

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete_btn'])){
        deleteUser($_POST['delete_btn']);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['makeadmin_btn'])){
        makeAdmin($_POST['makeadmin_btn']);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deleteAdmin_btn'])){
        deleteAdmin($_POST['deleteAdmin_btn']);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['yes'])){
        thumbsUp($_GET['id']);
    }


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['no'])){
        thumbsDown($_GET['id']);
    }

?>