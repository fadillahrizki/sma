<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!isset($this->session->user)){
			header("location:/auth/login");
		}
	}

	function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('dashboard');
		$this->load->view('layouts/footer');
	}
}
