<html>
<head>
	<title>Home</title>
	<style type="text/css">
	body{
		font-family: Arial, Helvetica, sans-serif;
	}
	</style>
</head>
<body>
	<div id='container'>
		<div id='header'>
		<?php 
			$logged_user = $this->session->userdata('user');
			$users = $this->session->userdata('users');
			echo "<h1> Hello, ".$logged_user['name']."</h1>";

		?>
			<a id='logout' href='<?= base_url('Users/logout') ?>'>Logout</a>
		</div>
		<div id='content'>
			<h2>Friends List</h2>
			<hr>

		<table>
			<th>Alias</th>
			<th>Action</th>

		</table>
		<?php

		$query = $this->db->query("SELECT * FROM friendships;");

		foreach ($query->result('User') as $user)
		{
        echo $user->name.' '. $user->alias.' '.
        '<a href="/Users/remove_friend/welcome" class="view_profile1">Remove As Friend! </a>'.'<a href="/Users/show" class="view_profile"> /View Profile</a>'.'<br>'; 
  
		}
		?>

		<h2>Find Your Friends</h2>
		<hr>
			
		<table>
			<th>Alias</th>
			<th>Action</th>

		</table>
		<tbody>

		<tr>
		<?php
			$query = $this->db->query("SELECT * FROM users;");

		foreach ($query->result('User') as $user)
		{
        echo $user->name.' '.
        '<a href="/Users/add_friends" class="view_profile">Add </a>'.
  		'<a href="/Users/add_friends" class="view_profile"> </a>'.'<br>'.
  		'<a href="/Users/show" class="view_profile"> /View Profile</a>'.'<br>';  
		}
		?>					
		</tr>			
		</div>
	</div>
</body>
</html>
