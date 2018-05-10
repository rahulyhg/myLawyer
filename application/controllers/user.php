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
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('provincial-area', 'Provincial Area', 'trim|required');
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('admitted-bar', 'Admitted Bar', 'trim|required');
		$this->form_validation->set_rules('specialty', 'Specialty Area', 'trim|required');
		$this->form_validation->set_rules('location', 'Location', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
			
			
		}
		else {
			$data = array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			'provincial_area' => $this->input->post('provincial-area'),
			'password' => sha1($this->input->post('password')),
			'admitted_bar' => $this->input->post('admitted-bar'),
			'specialty' => $this->input->post('specialty'),
			'location' => $this->input->post('location')
			);
			
			$result = $this->user_model->lawyer_registration($data);
			if ($result == TRUE) {
				$data['success_message_display'] = 'Registration Successfully!.';
				$this->load->view('register', $data);
			} 
			else {
				$data['error_message_display'] = 'Email Address Already Exist!';
				$this->load->view('register', $data);
			}
		}

	}

	//client login process
	public function clientLogin(){

	}
	//lawyer login process
	public function lawyerLogin(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['userinfo'])){
				//if session is already set
				// $this->load->view('dashboard');
				// $this->load->view('menu');
			}
			else{
				$this->load->view('login');
				
			}
		} 
		else {
			
			$data = array(
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
			);
			//print_r($data);
			$result = $this->user_model->user_login($data,'lawyer');
			if ($result == TRUE) {
				echo "success";
				
				$result = $this->user_model->read_user_information($this->input->post('email'),'lawyer');
				if ($result != false) {
					
					$lawyer_session_data = array(
					'user_id' => $result[0]->user_id,
					'fname' => $result[0]->first_name,
					'lname' => $result[0]->last_name,
					'email' => $result[0]->email,
					'provincial-area' => $result[0]->provincial_area,
					'admitted-bar' => $result[0]->admitted_bar,
					'specialty' => $result[0]->specialty,
					'location' => $result[0]->location,
					'register-date' => $result[0]->register_date,
					'login' => TRUE,
					);
					//print_r($lawyer_session_data);
					// Add user data in session
					//$this->session->set_userdata('userinfo', $session_data);
					
					$this->session->set_userdata('lawyer_detail', $lawyer_session_data);
					
					print_r($_SESSION);
					redirect('/user/lawyerDashBoard');
					//$this->load->view('dashboard');
				}
				else{
					$data = array(
					'error_loginmessage_display' => 'Invalid Username or Password'
					);
					$this->load->view('register', $data);
				}
			} 
			else {
				$data = array(
				'error_loginmessage_display' => 'Invalid Username or Password'
				);
				$this->load->view('register', $data);
				$this->load->view('menu');
			}
		}


	}

	// Show lawyer profle and dashboard page
	public function lawyerDashBoard() {
	
		$this->load->view('lawyer-dashboard');
		
		
	}
	// Show client profle and dashboard page
	public function clientDashBoard() {
	
		$this->load->view('client-dashboard');
		
		
	}
	//
	public function createLawyerSchedule() {
	
		$lawyer_detail = $this->session->userdata('lawyer_detail'); 
		//print_r($lawyer_detail);
		$search_date = array();
		$current_date = Date('Y-m-d');
		$tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
		$search_date[] = date('Y-m-d', strtotime($current_date . ' +1 day'));

		for($i=1;$i<7;$i++){
			$search_date[] = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));
			$tomorrow_date = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));

		} 
		//print_r($search_date);

		$result = $this->user_model->show_upcomming_scheudle($search_date,$lawyer_detail['user_id']);
		if($result == FALSE){
			
			$data['upcomming_scheduled'] = 'empty';
			$this->load->view('create-lawyer-schedule',$data);
		}
		else{
			
			$data['upcomming_scheduled'] = $result;
			$this->load->view('create-lawyer-schedule',$data);
		}
		
		
		
	}
	
}
?>
