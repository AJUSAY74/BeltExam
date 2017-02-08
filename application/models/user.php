<?php

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  	public function add_user($user_data)
	{
  		$query = "INSERT INTO users( name, alias, email, password, date_of_birth, date_created, date_updated) VALUES (?,?,?,?,?, NOW(), NOW())";
         $values = array($user_data['name'], $user_data['alias'],  $user_data['email'],  $user_data['password'], $user_data['date_of_birth']);
         return $this->db->query($query, $values);
  		 return $this->db->insert('User', $user);
	}

	// public function add_friends($user_data)
	// {
 //  		$query = "INSERT INTO friendships( name, alias, email, password, date_of_birth, date_created, date_updated) VALUES (?,?,?,?,?, NOW(), NOW())";
 //         $values = array($user_data['name'], $user_data['alias'],  $user_data['email'],  $user_data['password'], $user_data['date_of_birth']);
 //         return $this->db->query($query, $values);
 //  		 return $this->db->insert('User', $user);
	// }

	function login_user($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";

		return $this->db->query($query, array($email))->row_array();
	}

	function show_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
		return $this->db->query($query, $values);
	}

	public function show_friends($id)
	{

		$query = "SELECT * FROM friendships WHERE id = 1";
		//return $this->db->query($query)->result_array();
	}

	function remove_friend($id)
	{
		$query = "DELETE FROM friendships WHERE id = 1 ";
		return $this->db->query($query);
	}

}

