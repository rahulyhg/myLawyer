<?php 
class User_model extends CI_Model
{
    public function lawyer_registration($data){
            // Query to check whether username already exist or not
        $condition = "email =" . "'" . $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data['register_date'] = date('Y-m-d');
            //$data['state'] = 'pending';
            //$data['email_url'] = sha1(time() . $data['email']);
            
            // Query to insert data in database
            $this->db->insert('tbl_user', $data);
            
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } 
        else {
            return false;
        }

        
    }
    public function client_registration($data){

    }
    public function user_login($data,$userType){
        if($userType == 'lawyer'){
           
            //lawyer login
            $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            echo $query->num_rows();
            if ($query->num_rows() == 1) {
                return true;
            } 
            else {
                return false;
            }
        }
        else if($userType == 'client'){
            //client login
        }

    }
    // Read data from database to show data in admin page
public function read_user_information($email,$userType) {
    if($userType == 'lawyer'){

    }

	$condition = "email =" . "'" . $email . "'";
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} 
	else {
		return false;
	}
}
    public function view_laywer_profile(){

    }
    public function edit_layer_profile(){
        
    }
    public function view_lawyer_availability(){

    }
    public function book_lawyer(){

    }

    public function show_upcomming_scheudle($search_date,$user_id){
        //print_r($search_date);

         $condition = "user_id =" . "'" . $user_id . "' AND (".  "schedule_date =" . "'" . $search_date[0] . "' OR schedule_date = " . "'" . $search_date[1] . "' OR schedule_date =" . "'" . $search_date[2] . "' OR schedule_date =" ."'" . $search_date[3] . "' OR schedule_date =" . "'" . $search_date[4] . "' OR schedule_date =" . "'" . $search_date[5] . "' OR schedule_date =" . "'" . $search_date[6] . "')";
        $this->db->select('*');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        //$this->db->limit(1);
        $query = $this->db->get();
        //echo $this->db->last_query(); show last executed query
        //print_r($query->result());
        if ($query->num_rows() > 0) {
            //has at least one record with booking or not
            return $query->result();
        } 
        else {
            return false;
        }
    }
    
}


?>