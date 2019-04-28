<?php 
if(!empty($data['errors'])) {
	foreach($data['errors'] as $message) {
		echo "<span class='error'>".$message[0]."</span><br/>"; 
	}
}
?>
<br/>
<div class="container user-form"">
	<div class="row">
		<div class="popup Nshows" id="create" onclick="popItUp('create')">
		</div>
		<div class="col  col-xs-10 offset-sm-1 col-md-7 offset-md-1 Nshows myPopup create" id="create">
			<h3>create account</h3>
			<br>
			<form action="<?php echo URL . 'login\create'; ?>" method="post" class="col-s12">
				<div class="input-field row">
					<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
						<input name="voornaam" type="text" placeholder="voornaam">
						<input name="naam" type="text" placeholder="naam">
						<input name="email" type="text" placeholder="email">
						<input name="password" type="password" placeholder="password">
					</div>
					<div class="col col-xs-4 col-md-4">
						<label for="voornaam">voornaam</label>
						<label for="naam">naam</label>
						<label for="email">Email</label>
						<label for="password">password </label>
					</div>
				</div>
				<div class="input-field col col-xs-12">
					<p>* Required</p>
					<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<form action="<?php echo URL . 'login\login'; ?>" method="post" class="col s12">
			<div class="row">
				<div class="col-xs-4 offset-xs-2 col-sm-2 offset-sm-4">
					  <input id="email" name="email" type="text" class="validate" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
					  <input  id="username" name="password" type="password" class="validate" value="" autocomplete="off">
				</div>
				<div class="col-xs-2 col-sm-1">
					<label for="email">Email</label>
					<label for="username">Password</label>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 offset-xs-2 col-sm-3 offset-sm-4">
				  <input id="remember" name="remember" type="checkbox" value="1">
				  <label for="remember">Stay signed in</label>
				</div>
				<div class="col-xs-6 offset-xs-2 col-sm-3 offset-sm-4">
					<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">Login
						<i class="material-icons right">send</i>
					</button>
				</div>
				<div class="col-xs-6 offset-xs-2 col-sm-3 offset-sm-4">
					<a href='<?php echo URL; ?>login/forgot'> Forgot Password </a>
				</div>
				<div class="col-xs-6 offset-xs-2 col-sm-3 offset-sm-4">
					<button class="btn waves-effect waves-light light-blue darken-4" type="button" onclick="popItUp('create')" style="margin-top: 20px;">
						<i class="material-icons right">Create account</i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>