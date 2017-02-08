<html>
<head>
	<title>Login</title>

	<style type="text/css">
	body{
		font-family: Arial, Helvetica, sans-serif;
	}
	</style>
</head>
<body>
<div id='container'>
	<div id='header'>
			<h3>Login</h3>
	</div>
	<div id='alerts'>
		<?php
			echo "<div id='success'>".$this->session->flashdata('success')."</div>";
			echo "<div id='error'>".$this->session->flashdata('errors')."</div>";
		?>
	</div>
	<div id='login'>
		<form action='<?= base_url('Users/signin') ?>' method='post'>
			<p><b>Email:</b><br> <input type='text' name='email'></p>
			<p><b>Password:</b><br> <input type='password' name='password'></p>
			<input type='submit' id='add' value='Login'>
		</form>
	</div>
	<div id='container'>
	<div id='header'>
			<h3>Register Here</h3>
	</div>
	<div id='register'>
		<form action='<?= base_url('Users/registration') ?>' method='post'>
			<p><b>Name:</b><br> <input type='text' name='name'></p>
			<p><b>Alias:</b><br> <input type='text' name='alias'></p>
			<p><b>Email Address:</b><br> <input type='text' name='email'></p>
			<p><b>Password:</b><br> <input type='password' name='password'></p>
			<p><b>Confirm Password:</b><br> <input type='password' name='confirm_password'></p>
			<p><b>Birthdate:</b><br> <input type='date' name='date_of_birth'></p>
			<input id='add' type='submit' value='Register'>
		</form>
	</div>

	<div id ='error'>
		<?php
			echo $this->session->flashdata('errors');
		?>
</div>
</body>
</html>