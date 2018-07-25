<?php
	session_start();
	include 'functions.php';
?>

<?php
	$inf_article_title = $_POST["article_title"];
	$inf_article_description = $_POST["article_description"];
	$inf_article_url = "uploads/". $_FILES["fileToUpload"]["name"];
	$inf_article_author_first_name = $_POST["first_name"];
	$inf_article_author_last_name = $_POST["last_name"];
	$inf_user_id = $_SESSION["user_id"];
	$inf_category_type = $_POST["article_category"];

	
	createArticle($inf_article_title, $inf_article_description, $inf_article_url, $inf_user_id);
	$inf_article_id = getArticleIdByUrl($inf_article_url);

	createAuthor($inf_article_author_first_name, $inf_article_author_last_name, $inf_article_id);
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/". $_FILES["fileToUpload"]["name"]);

	addArticleCategory($inf_article_id, $inf_category_type);

	redirectTo("index.php");
?>