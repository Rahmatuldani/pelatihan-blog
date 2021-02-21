<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		$this->load->model('users');
	}
	
	public function index()
	{
		$data = array(
			'post' => $this->post->read(),
			'title' => 'Blogspot',
		);
		$this->load->view('home', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/footer');
	}

	public function about()
	{
		$data = array('title' => 'Blogspot');
		$this->load->view('about');
		$this->load->view('layout/header', $data);
		$this->load->view('layout/footer');
	}

	public function contact()
	{
		$data = array('title' => 'Blogspot');
		$this->load->view('contact');
		$this->load->view('layout/header',$data);
		$this->load->view('layout/footer');
	}
	
	public function posting($id)
	{
		$data = array(
			'post' => $this->post->get($id),
			'title' => 'Blogspot',
		);

		$this->load->view('posting', $data);
		$this->load->view('layout/header',$data);
		$this->load->view('layout/footer');
	}
}
