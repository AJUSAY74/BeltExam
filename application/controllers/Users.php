<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->output->enable_profiler(TRUE);
        }

	public function index()
	{
		$this->load->view('users_index');
		$this->output->enable_profiler(TRUE);
	}
	public function home()
	{
		 $this->load->view('welcome');

	}

	public function registration()
	{
		$this->load->view('users_index');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('alias', 'Alias', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('date_of_birth', 'date_of_birth', 'required');
		if($this->form_validation->run() === FALSE) 
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('/'));
		}
		else //success
		{
			$this->session->set_flashdata('success', 'You have successfully registered!');
			$this->load->model('user');
			$this->load->library('encrypt');

			$user_details = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'date_of_birth' => $this->input->post('date_of_birth')
				);
			$add_user = $this->user->add_user($user_details);

			redirect(base_url('Users/index'));
		}
	}

	public function signin()
	{
		$this->load->model('user');
		$email = $this->input->post('email');
		$this->load->library('encrypt');
		$password = $this->input->post('password');
		$get_user = $this->user->login_user($email);
		if($get_user && $get_user['password'] == $password) //login success
		{
			$user = array(
				'id'=>$get_user['id'],
				'name'=>$get_user['name'],
				'alias'=>$get_user['alias'],
				'email'=>$get_user['email']
			);
			$this->session->set_userdata('user', $get_user);

			 $this->load->view('welcome');
			// redirect(base_url('Users/welcome'));
		}
		else
		{
			$this->session->set_flashdata('errors', 'Invalid email or password');
			redirect(base_url('/'));
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('users_index');
		// exit;
	}
	
	public function add_friends()
	{
		$this->load->model('user');
		$friend_info['name'] = $this->input->post('name');

		//$this->user->add_friends($friend_info);
		$this->load->view('welcome');
	}

	public function show()
	{

		$this->load->model('user');
		$user = $this->session->userdata('user');
		$user_info['id'] = $user['id'];
		$get_friends = $this->user->show_friends($user_info);
		$this->session->set_userdata('friendships', $get_friends);

		
		$user_data['friendships'] = $get_friends;

		echo $user['alias']."'s ".'Profile'.'<br>';
		echo 'Name: '. $user['name'].'<br>';
		echo 'Email: '. $user['email'].'<br>';
		echo '<a href="/Users/home/" class="view_profile">Home</a>'.'<br>';
		echo '<a href="/Users/index/" class="view_profile">Logout</a>'.'<br>';
	}

	public function remove_friend()
	{
		$this->load->view('welcome');
		$this->load->model("user");
		$this->user->remove_friend('$id');

	}
}























