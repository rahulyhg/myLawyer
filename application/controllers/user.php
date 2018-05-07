<?php
Class User extends CI_Controller {
    public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		//load url library
		$this->load->helper('url');

		// Load database
		$this->load->model('user_model');
		
	}  
	
	// Show registration page for client and lawyer
	public function register() {
		$this->load->view('header');
		
		$this->load->view('register');
	
	}
	// Show login page for client and lawyer
	public function login() {
	
		$this->load->view('login');
		
		
	}

	//client registration process
	public function clientRegistration(){

	}
	
	//lawyer registration process
	public function lawyerRegistration(){
		
	}

	//client login process
	public function clientLogin(){

	}
	//lawyer login process
	public function lawyerLogin(){

	}

	// Show lawyer profle and dashboard page
	public function lawyerDashBoard() {
	
		$this->load->view('lawyer-dashboard');
		
		
	}
	// Show client profle and dashboard page
	public function clientDashBoard() {
	
		$this->load->view('client-dashboard');
		
		
	}

	
}
?>
