<!-- =================== User login ============== -->
<div class="modal fade" tabindex="-1" id="login_user"role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:25px 20px">
		<h2 class="alert alert-info text-center">User Login</h2>
      	<form method="post">
			<div class="form-group">
			  <label for="u_email">Email:</label>
			  <input type="email" class="form-control" id="u_email" placeholder="Enter email" name="u_email" 
			  value="<?php if(isset($_COOKIE['u_email'])){echo $_COOKIE['u_email'];} ?>">
			</div>
			<div class="form-group">
			  <label for="u_pwd">Password:</label>
			  <input type="password" class="form-control" id="u_pwd" placeholder="Enter password" name="u_pwd"
			 value="<?php if(isset($_COOKIE['u_pwd'])){echo $_COOKIE['u_pwd'];} ?>">
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" name="u_remember" <?php if(isset($_COOKIE['u_email'])){echo 'checked';} ?>> Remember me</label>
			</div>
			<button type="submit" class="btn btn-info" name="u_submit">Submit</button>
		  </form>

    </div>
  </div>
</div>
