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
	public function index() {
		if(isset($this->session->userdata['lawyer_detail'])){
			//if session is already set
			redirect('/user/lawyerDashBoard');
		}
		else{
			$this->load->view('login');
			
		}
	}
	// Show registration page for client and lawyer
	public function register() {
		if(isset($this->session->userdata['lawyer_detail'])){
			//if session is already set
			redirect('/user/lawyerDashBoard');
		}
		elseif(isset($this->session->userdata['client_detail'])){
			redirect('/user/clientDashBoard');
		}
		else{
			$this->load->view('register');
			
		}
		
		
		
	
	}
	// Show login page for client and lawyer
	public function login() {
		if(isset($this->session->userdata['lawyer_detail'])){
				//if session is already set
				redirect('/user/lawyerDashBoard');
			}
			else{
				$this->load->view('login');
				
			}
		
		
		
	}

	//client registration process
	public function clientRegistration(){
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'user_type' => 'client'
			);
			$this->load->view('register',$data);
			
		}
		else{
			$data = array(
				'first_name' => $this->input->post('fname'),
				'last_name' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password')),
				'contact' => $this->input->post('contact')
				
				);
			$result = $this->user_model->client_registration($data);
			if ($result == TRUE) {
				$data['success_message_display'] = 'Registration Successfully!.';
				$data['user_type'] = 'client';
				
				$this->load->view('login', $data);
			} 
			else {
				$data['error_message_display'] = 'Email Address Already Exist!';
				$data['user_type'] = 'client';
				$this->load->view('register', $data);
			}
		}
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
		$this->form_validation->set_rules('legal-professional', 'Legal Professional', 'trim|required');
		if($this->input->post('legal-professional') == 'lawyer' || $this->input->post('legal-professional') == 'lawyer-sworn-translator'){
			$this->form_validation->set_rules('admitted-bar', 'Admitted Bar', 'trim|required');
			$this->form_validation->set_rules('specialty', 'Specialty Area', 'trim|required');
		}
		else{
			$this->form_validation->set_rules('admitted-bar', 'Admitted Bar', 'trim');
			$this->form_validation->set_rules('specialty', 'Specialty Area', 'trim');
		}
		

		$this->form_validation->set_rules('location', 'Location', 'trim|required');

		print_r($_POST);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'user_type' => 'lawyer'
			);
			$this->load->view('register',$data);
			//print_r($_POST);
			
			
		}
		else {
			$data = array(
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'title' => $this->input->post('title'),
			'email' => $this->input->post('email'),
			'provincial_area' => $this->input->post('provincial-area'),
			'password' => sha1($this->input->post('password')),
			'legal_professional' => $this->input->post('legal-professional'),
			'admitted_bar' => $this->input->post('admitted-bar'),
			'specialty' => $this->input->post('specialty'),
			'location' => $this->input->post('location')
			);
			
			$result = $this->user_model->lawyer_registration($data);
			if ($result == TRUE) {
				$data['success_message_display'] = 'Registration Successfully!.';
				$data['user_type'] = 'lawyer';
				
				$this->load->view('login', $data);
			} 
			else {
				$data['error_message_display'] = 'Email Address Already Exist!';
				$data['user_type'] = 'lawyer';
				$this->load->view('register', $data);
			}
		}

	}

	//client login process
	public function clientLogin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['client_detail'])){
				//if session is already set
				redirect('/user/clientDashBoard');
			}
			else{
				$data['user_type'] = 'client';
				$this->load->view('login',$data);
				
			}
		} 
		else{
			$data = array(
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
				);
			$result = $this->user_model->user_login($data,'client');
			if ($result == TRUE) {
				echo "success";
				$result = $this->user_model->read_user_information($this->input->post('email'),'client');
				//print_r($result);
				$client_session_data = array(
					'user_id' => $result[0]->client_id,
					'fname' => $result[0]->first_name,
					'lname' => $result[0]->last_name,
					'email' => $result[0]->email,
					'contact' => $result[0]->contact,
					'register-date' => $result[0]->register_date,
					'login' => TRUE,
					'type' => 'client'

					);
					//print_r($client_session_data);
					$this->session->set_userdata('client_detail', $client_session_data);
					
					//print_r($_SESSION);
					redirect('/user/clientDashBoard');
					//$this->load->view('dashboard');
			}
			else{
				$data = array(
					'error_message_display' => 'Invalid Username or Password',
					'user_type' => 'client'
					);
					$this->load->view('login', $data);
			}
		}
	}
	//lawyer login process
	public function lawyerLogin(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['lawyer_detail'])){
				//if session is already set
				redirect('/user/lawyerDashBoard');
			}
			else{
				$data['user_type'] = 'lawyer';
				$this->load->view('login',$data);
				
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
				//echo "success";
				
				$result = $this->user_model->read_user_information($this->input->post('email'),'lawyer');
				if ($result != false) {
					if($result[0]->legal_professional == 'lawyer' || $result[0]->legal_professional == 'lawyer-sworn-translator'){
						$lawyer_session_data = array(
							'title' => $result[0]->title,
							'user_id' => $result[0]->user_id,
							'fname' => $result[0]->first_name,
							'lname' => $result[0]->last_name,
							'email' => $result[0]->email,
							'provincial-area' => $result[0]->provincial_area,
							'admitted-bar' => $result[0]->admitted_bar,
							'legal-professional' => $result[0]->legal_professional,
							'specialty' => $result[0]->specialty,
							'location' => $result[0]->location,
							'register-date' => $result[0]->register_date,
							'login' => TRUE,
							'type' => 'lawyer'
							);
					}
					else{
						$lawyer_session_data = array(
							'user_id' => $result[0]->user_id,
							'fname' => $result[0]->first_name,
							'lname' => $result[0]->last_name,
							'email' => $result[0]->email,
							'provincial-area' => $result[0]->provincial_area,
							'legal-professional' => $result[0]->legal_professional,
							'location' => $result[0]->location,
							'register-date' => $result[0]->register_date,
							'login' => TRUE,
							'type' => 'lawyer'
							
							);
					}
					
					//print_r($lawyer_session_data);
					// Add user data in session
					//$this->session->set_userdata('userinfo', $session_data);
					
					$this->session->set_userdata('lawyer_detail', $lawyer_session_data);
					
					//print_r($_SESSION);
					redirect('/user/lawyerDashBoard');
					//$this->load->view('dashboard');
				}
				else{
					$data = array(
					'error_message_display' => 'Invalid Username or Password',
					'user_type' => 'lawyer'
					);
					$this->load->view('login', $data);
				}
			} 
			else {
				$data = array(
				'error_message_display' => 'Invalid Username or Password',
				'user_type' => 'lawyer'
				);
				$this->load->view('login', $data);
			}
		}


	}

	// Logout from user page
	public function logout($user) {

		// Removing session data
		if($user == 'lawyer'){
				$this->session->unset_userdata('lawyer_detail');
				$data['success_message_display'] = 'Log out sucessfully';
				$data['user_type'] = 'lawyer';
				$this->load->view('login', $data);
		}
		elseif($user = 'client'){
				$this->session->unset_userdata('client_detail');
				$data['success_message_display'] = 'Log out sucessfully';
				$data['user_type'] = 'client';
				$this->load->view('login', $data);
		}
		

		
		
		}

	// Show lawyer profle and dashboard page
	public function lawyerDashBoard() {
		$lawyer_detail = $this->session->userdata('lawyer_detail'); 
		//print_r($lawyer_detail);
		$search_date = array();
		$current_date = Date('Y-m-d');
		$tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
		$search_date[] = $current_date;
		$search_date[] = date('Y-m-d', strtotime($current_date . ' +1 day'));
		
		//$schedule_time =array("5",5,"5");
		
		for($i=1;$i<7;$i++){
			$search_date[] = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));
			$tomorrow_date = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));

		} 
		//print_r($search_date);

		$result_unique_dates = $this->user_model->show_upcomming_schedule_dates_dashboard($search_date,$lawyer_detail['user_id']);
		$result_all_scheules = $this->user_model->show_upcomming_schedule($search_date,$lawyer_detail['user_id']);
		//print_r($result_unique_dates);
		if($result_unique_dates == FALSE AND $result_all_scheules == FALSE){
			$data['result_unique_dates'] = 'empty';
			$data['result_all_scheules'] = 'empty';
		}
		else{
			$data['result_unique_dates'] = $result_unique_dates;
			$data['result_all_schedules'] = $result_all_scheules;
		}
		$result_case_brief = $this->user_model->show_case_brief($lawyer_detail['user_id']);
			
			if($result_case_brief == FALSE){
				$data['case_briefs'] = 'empty';
			}
			else{
				$data['case_briefs'] = $result_case_brief;
			}

		$this->load->view('lawyer-dashboard',$data);
		
		
	}
	// Show client profle and dashboard page
	public function clientDashBoard() {
		$client_detail = $this->session->userdata('client_detail'); 
		$result = $this->user_model->show_client_booking($client_detail['user_id']);
		if($result == 'empty'){
			$data['booking_history'] = 'empty';
			$this->load->view('client-dashboard',$data);
		}
		else if($result == FALSE){
			//error handeling

		}
		else{
			
			//print_r($result);
			foreach($result as $key=>$book_value){
				
				$result_lawyer_detail= $this->user_model->get_lawyer_detail($book_value->user_id);
				//print_r($result_lawyer_detail[0]->first_name);
				$book_value->lawyer = $result_lawyer_detail[0]->first_name . ' '. $result_lawyer_detail[0]->last_name;
				$result_booking_history[] = $book_value;
				
			}
			
			$data['booking_history'] = $result_booking_history;
			$this->load->view('client-dashboard',$data);
			//print_r($book_value);
		}
		
		
		
	}
	//
	public function showLawyerSchedule() {
		$success = $this->session->flashdata('success_message_display');
		$error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
		}
		if(!empty($error)){
			$data['error_message_display'] = $error;
		}
		$lawyer_detail = $this->session->userdata('lawyer_detail'); 
		//print_r($lawyer_detail);
		$search_date = array();
		$current_date = Date('Y-m-d');
		$tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
		$search_date[] = date('Y-m-d', strtotime($current_date . ' +1 day'));
		
		//$schedule_time =array("5",5,"5");
		
		for($i=1;$i<7;$i++){
			$search_date[] = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));
			$tomorrow_date = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));

		} 
		//print_r($search_date);

		$result = $this->user_model->show_upcomming_schedule($search_date,$lawyer_detail['user_id']);
		if($result == FALSE){
			
			$data['upcomming_scheduled'] = $search_date;
			$data['result_in_db'] = 'empty';

			$this->load->view('create-lawyer-schedule',$data);
			//$this->load->view('2018-05-12',$data);
		}
		else{
			$finalize_dates = array();
			//print_r($search_date);
			//print_r($result);






			
		foreach($result as $db_data){
			$schedule_time = array(0=>'06:00:00',1=>'06:30:00',2=>'07:00:00',3=>'07:30:00',4=>'08:00:00'
							,5=>'08:30:00',6=>'09:00:00',7=>'09:30:00',8=>'10:00:00',9=>'10:30:00',10=>'11:00:00'
							,11=>'11:30:00',12=>'12:00:00',13=>'12:30:00',14=>'13:00:00',15=>'13:30:00'
							,16=>'14:00:00',17=>'14:30:00',18=>'15:00:00',19=>'15:30:00',20=>'16:00:00',21=>'16:30:00'
							,22=>'17:00:00',23=>'17:30:00',24=>'18:00:00',25=>'18:30:00',26=>'19:00:00',27=>'19:30:00'
							,28=>'20:00:00',29=>'20:30:00',30=>'21:00:00',31=>'21:30:00',32=>'22:00:00',33=>'22:30:00'
							,34=>'23:00:00'
						);
			//echo $db_data->schedule_date;
			$key_date = array_search($db_data->schedule_date,$search_date);
			

			if($key_date >= 0){
				//$finalize_dates[$db_data->schedule_date];
					$key_time = array_search($db_data->schedule_time,$schedule_time);
					if($key_time>=0){
						$time =  $schedule_time[$key_time];
						$finalize_dates[$db_data->schedule_date][$time]= array();
						$finalize_dates[$db_data->schedule_date][$time] = $db_data;
						//remove index for time array
						//unset($schedule_time[$key_time]);
						//echo "<br>";

					}
			}
			// //loop in search data array to check if there are future dates
			// foreach($search_date as $index=>$future_date){
			// 	if($future_date == $db_data->schedule_date){
			// 		echo "found record" . $future_date .'<br>';

			// 	}
			// 	else{
			// 		echo "not fount" . $future_date . '<br>';
					
			// 		$finalize_dates[$future_date] = array();
			// 		// foreach($schedule_time as $time_index=>$time){
			// 		// 	//$search_date[$index][$time_index] = $time;
						
			// 		// 	$finalize_dates[$index][$time_index] = $time;
			// 		// 	//print_r($time);

						
			// 		// }
					

			// 	}
			// }
			// //print_r($db_data);
			// //print_r($finalize_dates);

		}
			
			//print_r($finalize_dates);
			$data['upcomming_scheduled'] = $search_date;
			$data['result_in_db'] = $finalize_dates;

			$this->load->view('create-lawyer-schedule',$data);
		}
		
		
		
	}

	public function createLawyerSchedule(){
		$schedule_time = array(0=>'06:00:00',1=>'06:30:00',2=>'07:00:00',3=>'07:30:00',4=>'08:00:00'
							,5=>'08:30:00',6=>'09:00:00',7=>'09:30:00',8=>'10:00:00',9=>'10:30:00',10=>'11:00:00'
							,11=>'11:30:00',12=>'12:00:00',13=>'12:30:00',14=>'13:00:00',15=>'13:30:00'
							,16=>'14:00:00',17=>'14:30:00',18=>'15:00:00',19=>'15:30:00',20=>'16:00:00',21=>'16:30:00'
							,22=>'17:00:00',23=>'17:30:00',24=>'18:00:00',25=>'18:30:00',26=>'19:00:00',27=>'19:30:00'
							,28=>'20:00:00',29=>'20:30:00',30=>'21:00:00',31=>'21:30:00',32=>'22:00:00',33=>'22:30:00'
							,34=>'23:00:00'
						);
		$data = array(
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password'))
			);
			foreach($schedule_time as $time){
				if(array_key_exists($time,$_POST)){
					
					//print_r ($this->session->lawyer_detail['user_id']);
					$data = array(
						'user_id' => $this->session->lawyer_detail['user_id'],
						'schedule_date' => $this->input->post($time),
						'day' => date('l',strtotime($this->input->post($time))),
						'schedule_time' => $time,
						'schedule_status' => 'available',
						'client_id' => 0,
						'schedule_add_date' =>  date("Y-m-d"),
						'updated_date' =>  date("Y-m-d"),

					);
					$result = $this->user_model->create_lawyer_schedule($data);
					//print_r($data);
					if($result == FALSE){
						$this->session->set_flashdata('error_message_display','Error or processing your request. Please try again');
						redirect('/user/showLawyerSchedule');
					}
					
					//print_r($data);
				}
			}
				$this->session->set_flashdata('success_message_display','Request Updated Sucessfully');
				redirect('/user/showLawyerSchedule');
			
		//print_r($_POST);
	}
	/**
	 * show form to add case details he attended
	 */
	public function showCaseBrief(){
		$success = $this->session->flashdata('success_message_display');
		$error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
			$this->load->view('create-casebrief',$data);
		}
		if(!empty($error)){
			$data['error_message_display'] = $error;
			$this->load->view('create-casebrief',$data);
		}
		$this->load->view('create-casebrief');
	}

	/**
	 * lawyer submited previous case details he attended
	 */
	public function createCaseBrief(){
		$this->form_validation->set_rules('case-title', 'Case title', 'trim|required');
		$this->form_validation->set_rules('case-description', 'Case description', 'trim|required');
		
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('create-casebrief');				
			}
			else {
				$data = array(
					'user_id'=> $this->session->lawyer_detail['user_id'],
					'case_title' => $this->input->post('case-title'),
					'case_description' => $this->input->post('case-description'),
					'case_added_date' => Date('Y-m-d')
					);
					$result = $this->user_model->create_case_brief($data);
					if($result == TRUE){
						
						
						$this->session->set_flashdata('success_message_display','Case added sucessfully');
						redirect('/user/showCaseBrief');
					}
					else{
						
						$this->session->set_flashdata('error_message_display','Error or processing your request. Please try again');
						redirect('/user/showCaseBrief');						
					}
			}
	}
	
	/**
	 * client view of lawyer profile
	 */

	public function lawyerDashBoardClientView($user_id) {

		$lawyer_detail = $this->session->userdata('lawyer_detail'); 
		
		//print_r($lawyer_detail);
		$search_date = array();
		$current_date = Date('Y-m-d');
		$tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
		$search_date[] = $current_date;
		$search_date[] = date('Y-m-d', strtotime($current_date . ' +1 day'));
		
		//$schedule_time =array("5",5,"5");
		
		for($i=1;$i<7;$i++){
			$search_date[] = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));
			$tomorrow_date = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));

		} 
		//print_r($search_date);

		$result_unique_dates = $this->user_model->show_upcomming_schedule_dates_dashboard($search_date,$user_id);
		$result_all_scheules = $this->user_model->show_upcomming_schedule($search_date,$user_id);
		$result_lawyer_detail = $this->user_model->get_lawyer_detail($user_id);
		
		//print_r($result_unique_dates);
		if($result_unique_dates == FALSE AND $result_all_scheules == FALSE){
			$data['result_unique_dates'] = 'empty';
			$data['result_all_scheules'] = 'empty';
		}
		else{
			$data['result_unique_dates'] = $result_unique_dates;
			$data['result_all_schedules'] = $result_all_scheules;
			$data['result_lawyer_detail'] = $result_lawyer_detail;
		}
		$result_case_brief = $this->user_model->show_case_brief($user_id);
			
			if($result_case_brief == FALSE){
				$data['case_briefs'] = 'empty';
			}
			else{
				$data['case_briefs'] = $result_case_brief;
			}

		$this->load->view('lawyer-dashboard-client-view',$data);
		
		
	}

	


}
?>
