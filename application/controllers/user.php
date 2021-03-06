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
	/**
	 * Show login page for client and lawyer
	 */
	
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
				/**if register sucess direct user to the login page */
			if ($result == TRUE) {
				
				$data['user_type'] = 'client';
				$schedule_id =$this->input->post('schedule-id');
				$consultant_id =$this->input->post('consultant-id');
				if($schedule_id > 0 && $consultant_id>0 ){
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
							
							$this->session->set_userdata('client_detail', $client_session_data);
							/**
							 * once registration done call for booking fucttion
							 */
							$this-> bookConsultant($schedule_id,$consultant_id);
					
					}







					
				}else{
					$this->load->view('login', $data);
				}
				
			} 
			else {
				$data['error_message_display'] = 'Email Address Already Exist!';
				$data['user_type'] = 'client';
				//$data['schedule_id'] = $schedule_id;
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

		//print_r($_POST);

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

	
	/**
	 *client login process 
	 */
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
					$this->session->set_userdata('client_detail', $client_session_data);
					redirect('/user/clientDashBoard');
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
	
	/**
	 * lawyer login process 
	 */
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

			$result = $this->user_model->user_login($data,'lawyer');
			if ($result == TRUE) {
			
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
							'title' => $result[0]->title,
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
					$this->session->set_userdata('lawyer_detail', $lawyer_session_data);
					redirect('/user/lawyerDashBoard');			
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

	/**
	 * Logout module 
	 */
	 
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
			
			
			foreach($result_all_scheules as $key => $single_schedule){
				if($single_schedule->client_id>0){
					//get client details
					//print_r($single_schedule);
					$data = array(
						'user_type'=>'client',
						'user_id'=> $single_schedule->client_id,
						'schedule_id'=> $single_schedule->schedule_id
						
					);
					$result_user_detail = $this->user_model->get_any_user_detail($data);
					$result_user_form = $this->user_model->get_user_form_deatail($data);
					if($result_user_form == FALSE){
						$single_schedule->user_form = 0;
					}else{
						$single_schedule->user_form = $single_schedule->schedule_id;
					}
					$single_schedule->client_name = $result_user_detail[0]->first_name . ' ' . $result_user_detail[0]->last_name;
					$single_schedule->client_email = $result_user_detail[0]->email;
					$single_schedule->client_contact = $result_user_detail[0]->contact;
					$reslt_updated_schedule[] = $single_schedule;
				}else{
					$reslt_updated_schedule[] = $single_schedule;
				}
			}
			$data['result_unique_dates'] = $result_unique_dates;
			


			$data['result_all_schedules'] = $reslt_updated_schedule;
			
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
	
	/**
	 * Show client profle and dashboard page
	 */
	public function clientDashBoard() {
		$success = $this->session->flashdata('success_message_display');
		 $error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
		}
		if(!empty($error)){
			$data['error_message_display'] = $error;
		}

		$client_detail = $this->session->userdata('client_detail');
		
		$result = $this->user_model->show_client_booking($client_detail['user_id']);
		
		if($result == 'empty'){
			$data['booking_history'] = 'empty';
			$this->load->view('client-dashboard',$data);
		}
		else if($result == FALSE){
	
		}
		else{
			
	
			foreach($result as $key=>$book_value){
	
				$result_lawyer_detail= $this->user_model->get_lawyer_detail($book_value->user_id);
				$book_value->lawyer = $result_lawyer_detail[0]->first_name . ' '. $result_lawyer_detail[0]->last_name;
				$book_value->legal_professional = $result_lawyer_detail[0]->legal_professional;
				$result_booking_history[] = $book_value;
				
			}
			
			$data['booking_history'] = $result_booking_history;
			$this->load->view('client-dashboard',$data);
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
	 * client view of legal professional profile
	 */

	public function lawyerDashBoardClientView($user_id) {
		 $success = $this->session->flashdata('success_message_display');
		 $error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
		}
		if(!empty($error)){
			$data['error_message_display'] = $error;
		}

		$lawyer_detail = $this->session->userdata('lawyer_detail'); 
	
		$search_date = array();
		$current_date = Date('Y-m-d');
		$tomorrow_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
		$search_date[] = $current_date;
		$search_date[] = date('Y-m-d', strtotime($current_date . ' +1 day'));

		
		for($i=1;$i<7;$i++){
			$search_date[] = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));
			$tomorrow_date = date('Y-m-d', strtotime($tomorrow_date . ' +1 day'));

		} 
		//print_r($search_date);
	
		$result_unique_dates = $this->user_model->show_upcomming_schedule_dates_dashboard($search_date,$user_id);
		$result_all_scheules = $this->user_model->show_upcomming_schedule($search_date,$user_id);
		//print_r($result_all_scheules);
		$result_lawyer_detail = $this->user_model->get_lawyer_detail($user_id);
		if($result_unique_dates == FALSE AND $result_all_scheules == FALSE){
			$data['result_unique_dates'] = 'empty';
			$data['result_all_scheules'] = 'empty';
			$data['result_lawyer_detail'] = $result_lawyer_detail;
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

	public function search() {
		$this->load->view('search');
	}
	
	/**
	 * by collecting search form post data this method will handle the search functionality
	 */
	public function showSearchResult() {
		
		$this->form_validation->set_rules('provincial-area', 'Provincial Area', 'trim|required');
		
		$this->form_validation->set_rules('legal-professional', 'Legal Professional', 'trim|required');
		if($this->input->post('legal-professional') == 'lawyer' || $this->input->post('legal-professional') == 'lawyer-sworn-translator'){
			$this->form_validation->set_rules('admitted-bar', 'Admitted Bar', 'trim|required');
			$this->form_validation->set_rules('specialty', 'Specialty Area', 'trim|required');
		}
		else{
			$this->form_validation->set_rules('admitted-bar', 'Admitted Bar', 'trim');
			$this->form_validation->set_rules('specialty', 'Specialty Area', 'trim');
		}


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('search');	
		}
		else {
			if($this->input->post('legal-professional') == 'lawyer' || $this->input->post('legal-professional') == 'lawyer-sworn-translator'){
				
				$data = array(
					'provincial_area' => $this->input->post('provincial-area'),
					
					'legal_professional' => $this->input->post('legal-professional'),
					'admitted_bar' => $this->input->post('admitted-bar'),
					'specialty' => $this->input->post('specialty'),
					);
					
					$result = $this->user_model->searh_lawyer($data);
					if($result == 'empty'){
						$data['search_result'] = 'empty';
						$this->load->view('search',$data);
					}else{
						
						$data['search_result'] = $result;
						$this->load->view('search',$data);
					}
					
			}
			else{
				
				$data = array(
					'provincial_area' => $this->input->post('provincial-area'),
					'legal_professional' => $this->input->post('legal-professional')			
					);
					$result = $this->user_model->searh_other_lawyer($data);
					if($result == 'empty'){
						$data['search_result'] = 'empty';
						$this->load->view('search',$data);
					}else{
						
						$data['search_result'] = $result;
						$this->load->view('search',$data);
					}		
			}
		}
	
	}

	public function bookConsultant($schedule_id,$consultant_id){
		//print_r($this->session->userdata('client_detail'));
		if(isset($this->session->userdata('client_detail')['user_id'])){
			//echo "work";
			$client_detail = $this->session->userdata('client_detail');
			$data['schedule_id'] = $schedule_id;
			$data = array(
			'schedule_id' =>  $schedule_id,
			'client_id' => $client_detail['user_id'],
			'current_date'=> Date('Y-m-d')

			);

			echo $result = $this->user_model->set_to_book($data);

			if($result === "notavailable"){
				
				
				$this->session->set_flashdata('error_message_display','This booking no longer available. Please with different schedule');
				
				redirect('/user/lawyerDashBoardClientView/'.$consultant_id);
				
			}elseif($result == FALSE){
				
				//$this->session->set_flashdata('error_message_display','Error when processing your booking. Please try againg');
				$data['error_message_display'] = 'Error when processing your booking. Please try againg';
				$this->load->view('search',$data);
				
				
			}elseif($result == TRUE){
				
				$this->session->set_flashdata('success_message_display','Successfully Booked');
				//$data['success_message_display'] = 'Successfully Booked';.
				//$this->load->view('client-dashboard',$data);
				//client session should be avaiable
				redirect('/user/clientDashBoard');
			}
		}else{
			//client has to login
				$data['success_message_display'] = 'You need to register with us to complete booking. ';
				$data['schedule_id'] = $schedule_id;
				$data['consultant_id'] = $consultant_id;
				$data['user_type'] = 'client';
				$this->load->view('register',$data);
		}

		
	}
	
	/**
	 * register user can submit legal question for leagal professional reference
	 */
	public function createQuestion(){
		$this->form_validation->set_rules('question-title', 'question title', 'trim|required');
		$this->form_validation->set_rules('question-description', 'question description', 'trim|required');
		
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('create-question');				
			}
			else {
				
				if($this->session->userdata('client_detail') == FALSE && $this->session->userdata('lawyer_detail') == FALSE){
					redirect('/user/login');
				}elseif($this->session->userdata('client_detail') == TRUE){
					$question_poster_id = $this->session->userdata('client_detail')['user_id'];
					$user_type = $this->session->userdata('client_detail')['type'];
				}else{
					$question_poster_id = $this->session->userdata('lawyer_detail')['user_id'];
					$user_type = $this->session->userdata('lawyer_detail')['type'];
				}

				$data = array(
					'user_id'=> $question_poster_id,
					'forum_title' => $this->input->post('question-title'),
					'forum_description' => $this->input->post('question-description'),
					'forum_added_date' => Date('Y-m-d H:i:s'),
					'user_type' => $user_type
					);
					$result = $this->user_model->create_question($data);
					 if($result == TRUE){	
					 	$this->session->set_flashdata('success_message_display','Question added sucessfully');
					 	redirect('/user/showForum');
					 }
					else{	
						$this->session->set_flashdata('error_message_display','Error or processing your request. Please try again');
						redirect('/user/createQuestion');						
					}
			}
	
	}
	public function showForum(){
		$success = $this->session->flashdata('success_message_display');
		 $error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
		}
		if(!empty($error)){
			$data['error_message_display'] = $error;
		}
		/**
		 * get latest from records
		 */
		$result_all_question = $this->user_model->get_all_question();

		foreach($result_all_question as $key=>$question){
			//print_r($question);
			$data = array(
				'user_id'=>$question->user_id,
				'user_type'=>$question->user_type
			);
			$result_user_detail = $this->user_model->get_any_user_detail($data);
			//print_r($result_user_detail);

			$question->post_owner = $result_user_detail[0]->first_name . ' '. $result_user_detail[0]->last_name;
			$result_updated_all_question[] = $question;
			
		}


		
		if($result_all_question == 'empty'){
			$data['result_all_question'] = 'empty';
		}else{
			$data['result_all_question'] = $result_updated_all_question;
		}

		$this->load->view('show-forum',$data);	
	}
	public function showSingleQuestion($forum_id){

		$success = $this->session->flashdata('success_message_display');
		 $error = $this->session->flashdata('error_message_display');
		if(!empty($success)){
			$data['success_message_display'] = $success;
		}
		if(!empty($error)){
			
			$data['error_message_display'] = $error;
		}

		
		if($this->session->userdata('client_detail') == FALSE && $this->session->userdata('lawyer_detail') == FALSE){
			redirect('/user/login');
		}elseif($this->session->userdata('client_detail') == TRUE){
			$question_poster_id = $this->session->userdata('client_detail')['user_id'];
			$user_type = $this->session->userdata('client_detail')['type'];
		}else{
			$question_poster_id = $this->session->userdata('lawyer_detail')['user_id'];
			$user_type = $this->session->userdata('lawyer_detail')['type'];
		}
		
		$data['forum_id'] = $forum_id;
		
		
		$result_single_question = $this->user_model->get_single_question($data);
		$result_answers = $this->user_model->get_answers($forum_id);
		
		
		if($result_answers == 'empty'){
			$data['result_answers'] = 'empty';
		}else{
			foreach($result_answers as $key => $answer){
				// $data = array(
				// 	'user_type' => $answer->user_type,
				// 	'user_id' => $answer->user_id
				// );
				$data['user_type'] = $answer->user_type;
				$data['user_id'] = $answer->user_id;
				$result_answers = $this->user_model->get_any_user_detail($data);
				$answer->answer_owner = $result_answers[0]->first_name . ' '. $result_answers[0]->last_name;
				$result_updated_all_answers[] = $answer;
			}
			$data['result_answers'] = $result_updated_all_answers;
			
		}
		
		
		$data['result_single_question'] = $result_single_question;
		//print_r($result_single_question);
		
		$this->load->view('answer-forum',$data);	
	}
	/**
	 * legal professonal can submited their ideas for questions
	 */
	public function answerQuestion(){
		$this->form_validation->set_rules('answer', 'answer', 'trim|required');
		$forum_id = $this->input->post('forum-id');
		if ($this->form_validation->run() == FALSE) {
			
			$this->session->set_flashdata('error_message_display','The answer field cannot empty');
			redirect('/user/showSingleQuestion/'.$forum_id);
		}
		else {
			if($this->session->userdata('client_detail') == FALSE && $this->session->userdata('lawyer_detail') == FALSE){
				redirect('/user/login');
			}elseif($this->session->userdata('client_detail') == TRUE){
				$answer_poster_id = $this->session->userdata('client_detail')['user_id'];
				$user_type = $this->session->userdata('client_detail')['type'];
			}else{
				$answer_poster_id = $this->session->userdata('lawyer_detail')['user_id'];
				$user_type = $this->session->userdata('lawyer_detail')['type'];
			}
			$data = array(
				'forum_id' =>$forum_id,
				'answer_description' => $this->input->post('answer'),
				'user_id' => $answer_poster_id,
				'user_type' => $user_type,
				'answer_added_date' => Date('Y-m-d H:i:s')

			);
			$result_single_question = $this->user_model->insert_answer_question($data);
			if($result_single_question == TRUE){
				$this->session->set_flashdata('success_message_display','Answer submitted sucessfully');
				redirect('/user/showSingleQuestion/'.$forum_id);
			}else{
				$this->session->set_flashdata('erro_message_display','Error when prcessing your request, try aganing');
				redirect('/user/showSingleQuestion/'.$forum_id);
			}
		}
	}
	
	/**
		 * how faq page this is a static page
		 */
		public function faq(){
			
			$this->load->view('faq-page');
		}

		/**
		 * for sworn translator and lawyer-sworn translator requires client more details this form will direct to client 
		 */
		public function clientMoreInfo($schedule_id){
			$data['schedule_id'] = $schedule_id;
			$result_user_form_detail = $this->user_model->get_user_form_deatail($data);
			if($result_user_form_detail == FALSE){
				
				$data['schedule_id'] = $schedule_id;
				$this->load->view('create-user-form',$data);
			}else{
				$data['user_form_details'] = $result_user_form_detail;
				$this->load->view('create-user-form',$data);
			}
			
		}
		public function createMoreInfo(){
			//print_r($_POST);
			$this->form_validation->set_rules('gender', 'gender', 'trim|required');
			$this->form_validation->set_rules('birth-place', 'birth place', 'trim|required');
			$this->form_validation->set_rules('birth-year', 'birth year', 'trim|required');
			$this->form_validation->set_rules('father-name', 'fathers name', 'trim|required');
			$this->form_validation->set_rules('mother-name', 'mothers name', 'trim|required');
			$this->form_validation->set_rules('father-profession', 'fathers profession', 'trim|required');
			$schedule_id = $this->input->post('schedule-id');
		if ($this->form_validation->run() == FALSE) {
			
			$data['schedule_id'] = $schedule_id;
			$this->load->view('create-user-form',$data);	
		}else{
			$client_detail = $this->session->userdata('client_detail');
			$data = array(
				'schedule_id' => $schedule_id,
				'client_id' => $client_detail['user_id'],
				'gender' => $this->input->post('gender'),
				'birth_place' => $this->input->post('birth-place'),
				'birth_year' => $this->input->post('birth-year'),
				'father_name' => $this->input->post('father-name'),
				'mother_name' => $this->input->post('mother-name'),
				'father_profession' => $this->input->post('father-profession'),
				'last_update_date' => Date('Y-m-d')

			);
			//print_r($data);
			$result_user_form = $this->user_model->insert_user_form($data);
			if($result_user_form === 'form_filled'){
				$data['error_message_display'] = 'You have already filled this form.';
				$data['schedule_id'] = $schedule_id;
				$this->load->view('create-user-form',$data);
			}elseif($result_user_form == TRUE){
				
				$this->session->set_flashdata('success_message_display','Form submitted successfully');
				redirect('/user/clientDashBoard');
			}else{
				$data['error_message_display'] = 'Error on processing your request. Try again';
				$data['schedule_id'] = $schedule_id;
				$this->load->view('create-user-form',$data);
			}

			
		}

}
}
?>
