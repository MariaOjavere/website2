<?php 
ob_start(); 
$title = 'Profile '; 
?>

<div class="container" style="min-height:400px;">
	
	
			
			<div class="col-sm-12 col-sm-offset-2" >
				<div class="row" >
					<div class="col-sm-6">
						<h4>Name:</h4>
						<h4>Email:</h4>
						<h4>Password:</h4>
						
					</div>
					<div class="col-sm-6">
						<h5><?php echo $_SESSION['username']; ?></h5>
						<h5><?php echo $_SESSION['email']; ?></h5>
						<h5>******</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" id="myLink">
						<h5>
							<a href="#" class="btn btn-link" id="edit" >
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							 Change password</a>
						</h5>
					</div>
				</div>
				<?php
				if(isset($test) && $test[0]==true){
					echo '<p>Password changed </p>';
				}
				elseif(isset($test) && $test[0]==false){
					echo '<p id="answer">'.$test[1].'</p>';
				}
				?>
			</div>
				
				<div class="row" id="editpass" style="display:none">
					<div class="col-sm-6 col-sm-offset-3">
					<form method="POST" action="profileEditResult" >
						<div class="modal-header">
							<h3>Change Password <span class="extra-title muted"></span></h3>
						</div>
						<div class="modal-body form-horizontal">
							<div class="control-group">
								<label for="current_password" class="control-label">Current Password</label>
								
									<input type="password" class="form-control" name="current_password">
								
							</div>
							<div class="control-group">
								<label for="new_password" class="control-label">New Password</label>
							
									<input type="password" class="form-control" name="new_password">
								
							</div>
							<div class="control-group">
								<label for="confirm_password" class="control-label">Confirm Password</label>
								
									<input type="password" class="form-control" name="confirm_password">
								
							</div>      
						</div>
						<div class="modal-footer">
							<a href="profile" class="btn btn-primary"  >Close</a>
							<button name="send" type="submit" class="btn btn-primary" >Save changes</button>
						</div>
					</form>	
					</div>				
				</div>
			
	
	        
	   
	  </div>
 <script src="public/js/jquery-3.1.0.min.js"></script>
 <script>
 $('#edit').click(function(){
	 $('#editpass').show();
	 $('#myLink').hide();
	 $('#answer').hide();
 });
 </script>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; 