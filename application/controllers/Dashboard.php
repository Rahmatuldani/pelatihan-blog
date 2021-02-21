<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');

		if ($this->session->userdata('id') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login First!</div>');
				redirect('auth');
		}
	}

	public function index()
	{
		$data = array(
			'post' => $this->post->get_post($this->session->userdata('id')),
		);
		$this->load->view('template/header');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
		$this->form_validation->set_rules('desc', 'Post', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header');
			$this->load->view('create_posting');
			$this->load->view('template/footer');
		} else {
			$this->tambah();
		}
	}

	private function tambah()
	{
		$date = date(DATE_ISO8601);
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => $this->input->post('desc'),
			'created_at' => $date,
			'updated_at' => $date,
			'is_actived' => 1,
		);

		$this->post->create($data);

		redirect('dashboard');
	}

	public function edit($id)
	{
		$data = array(
			'post' => $this->post->get($id),
		);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('subtitle', 'Subtitle', 'required');
		$this->form_validation->set_rules('desc', 'Post', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header');
			$this->load->view('edit_posting', $data);
			$this->load->view('template/footer');
		} else {
			$this->editing($id);
		}
	}

	private function editing($id)
	{
		$date = date(DATE_ISO8601);
		$data = array(
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => $this->input->post('desc'),
			'updated_at' => $date,
		);

		$this->post->update($data, $id);
		redirect('dashboard');
	}

	public function delete($id)
	{
		$this->post->delete($id);
		redirect('dashboard');
	}

	public function profile()
	{
		$this->load->view('template/header');
		$this->load->view('profile');
		$this->load->view('template/footer');
	}

	public function uprofile()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');

		$this->load->model('users');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header');
			$this->load->view('profile');
			$this->load->view('template/footer');
		} else {
			$data = array(
				'id' => $this->session->userdata('id'),
				'username' => $this->input->post('username'),
			);
	
			if ($this->input->post('password') != null) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			} else {
				$data['password'] = $this->session->userdata('password');
			}
	
			$this->users->update($data);
			redirect('dashboard/logout');
		}
	}

	public function logout(){
		$this->session->sess_destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have logout!</div>');
		redirect('home');		
	}
}
