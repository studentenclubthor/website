<?php 
if(!empty($data['errors'])) {
	foreach($data['errors'] as $message) {
		echo "<span class='error'>".$message[0]."</span><br/>"; 
	}
}
?>
<br/>
<div class="container user-form" style="float: left; width: 100%;"> 
	<div class="row">
		<form action="<?php echo URL . 'login\login'; ?>" method="post" class="col s12">
			<div class="row">
				<div class="col-xs-4 col-xs-offset-2 col-sm-2 col-sm-offset-4">
					  <input id="email" name="email" type="text" class="validate" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
					  <input  id="username" name="password" type="password" class="validate" value="" autocomplete="off">
				</div>
				<div class="col-xs-2 col-sm-1">
					<label for="email">Email</label>
					<label for="username">Password</label>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-2 col-sm-3 col-sm-offset-4">
				  <input id="remember" name="remember" type="checkbox" value="1">
				  <label for="remember">Stay signed in</label>
				</div>
				<div class="col-xs-6 col-xs-offset-2 col-sm-3 col-sm-offset-4">
					<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">Login
						<i class="material-icons right">send</i>
					</button>
				</div>
				<div class="col-xs-6 col-xs-offset-2 col-sm-3 col-sm-offset-4">
					<a href='<?php echo URL; ?>login/forgot'> Forgot Password </a>
				</div>
			</div>
		</form>
	</div>
</div>
