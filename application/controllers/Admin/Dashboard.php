<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/v_index');
		$this->load->view('admin/footer');
	}

	public function form()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/v_form');
		$this->load->view('admin/footer');
	}
}
