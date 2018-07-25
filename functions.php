<?php

	/*
		user management
	 */
	function registerUser($first_name, $last_name, $email, $password, $category, $academic_degree){
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
		$query = "select * from articles where inf_article_title like '%$search_input%'";
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


?>