<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
		if ($this->session->userdata('id') != NULL) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$data = array('title' => 'Blogspot');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/layout/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/layout/footer');
		} else {
			$this->login();
		}
	}

	private function Login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('pass');

		$query = $this->users->verify($email);

		if ($query != null) {
			if (password_verify($password, $query['password'])) {
				$this->session->set_userdata($query);
				redirect('home');
			}
			else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email did not exist!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', array('is_unique' => $this->session->set_flashdata('unique', '<div class="alert alert-danger" role="alert">Email already exists!</div>')));
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$data = array('title' => 'Blogspot');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/layout/header',$data);
			$this->load->view('auth/register');
			$this->load->view('auth/layout/footer');
		} else {
			$this->register_proses();
		}
	}

	private function register_proses()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
			'is_actived' => 1,

		);

		$this->users->create($data);
		redirect('auth');
	}

}
