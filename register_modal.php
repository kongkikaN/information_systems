<!-- Modal -->
<div class="modal fade" id="register_modal" role="dialog">
	<div class="modal-dialog">   
	<!-- Modal content-->
		<form action = "index.php" method = "post">
			<div class="modal-content">
			    <div class="modal-header">
			    	<button type="button" class="close" data-dismiss="modal">&times;</button>
			    	<h4 class="modal-title">Register</h4>
			    </div>
			    <div class="modal-body">
			    	<div class = "form-group">
			    		<label for="unipi_id">Unipi ID:</label>
		    			<input type="text" class="form-control" id="unipi_id" placeholder="Enter the ID provided by UniPi" name="unipi_id">
			    	</div>
			    	<div class = "form-group">
			    		<label for="first_name">First Name:</label>
		    			<input type="text" class="form-control" id="first_name" placeholder="Enter Your First Name" name="first_name">
			    	</div>
			    	<div class = "form-group">
			    		<label for="first_name">Last Name:</label>
		    			<input type="text" class="form-control" id="last_name" placeholder="Enter Your Last Name" name="last_name">
			    	</div>
			    	<div class = "form-group">
			    		<label for="email">Email:</label>
		    			<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			    	</div>
			    	<div class="form-group">
				    	<label for="pwd">Password:</label>
				    	<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				    </div>
				    <div class="form-group">
				    	<label for="category">Department:</label>
				    	<select class = "form-control input-lg" id = "category" name = "category">
							<option value="" disabled selected>Select your option</option>
							<option value="Digital Systems">Digital Systems</option>
							<option value="Computer Science">Computer Science</option>
							<option value="Statistics">Statistics</option>
							<option value="Economics">Economics</option>
							<option value="Business Administration">Business Administration</option>
							<option value="International And European Studies">International And European Studies</option>
							<option value="Maritime Studies">Maritime Studies</option>
						</select>
				    </div>
				    <div class="form-group">
				    	<label for="education">Academic Degree:</label>
				    	<select class = "form-control input-lg" id = "academic_degree" name = "academic_degree">
							<option value="" disabled selected>Select your option</option>
							<option value="Student">Student</option>
							<option value="Bachelors">Bachelors</option>
							<option value="Master">Master</option>
							<option value="Doctoral">Doctoral</option>
							<option value="Professor">Professor</option>
						</select>
				    </div>
				    <button type="submit" name = "submit_register_form" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit_register_form'])){
        registerUser($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["category"], $_POST["academic_degree"], $_POST["unipi_id"]);
    }
?>