<!-- Modal -->
<div class="modal fade" id="login_modal" role="dialog">
	<div class="modal-dialog">
		    
		<!-- Modal content-->
		<form method = "post" target="index.php">
			<div class="modal-content">
			    <div class="modal-header">
			    	<button type="button" class="close" data-dismiss="modal">&times;</button>
			    	<h4 class="modal-title">Log In</h4>
			    </div>
			    <div class="modal-body">
			    	<div class = "form-group">
			    		<label for="email">Email:</label>
		    			<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			    	</div>
			    	<div class="form-group">
				    	<label for="password">Password:</label>
				    	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
				    </div>
				    <div class="checkbox">
				    	<label><input type="checkbox" name="remember"> Remember me</label>
				    </div>
				    <button type="submit" name = "submit_login_button" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit_login_button'])){
        logInUser($_POST["email"], $_POST["password"]);
    }
?>