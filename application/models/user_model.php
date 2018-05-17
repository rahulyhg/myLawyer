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
            // Query to check whether username already exist or not
            $condition = "email =" . "'" . $data['email'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user_client');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                $data['register_date'] = date('Y-m-d');
                //$data['state'] = 'pending';
                //$data['email_url'] = sha1(time() . $data['email']);
                
                // Query to insert data in database
                $this->db->insert('tbl_user_client', $data);
                
                if ($this->db->affected_rows() > 0) {
                    return true;
                }
            } 
            else {
                return false;
            }
    
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
            $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user_client');
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

    }
    // Read data from database to show data in admin page
public function read_user_information($email,$userType) {
        if($userType == 'lawyer'){
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
        else if($userType == 'client'){
            $condition = "email =" . "'" . $email . "'";
            $this->db->select('*');
            $this->db->from('tbl_user_client');
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

	
}
    public function view_laywer_profile(){

    }
    public function edit_layer_profile(){
        
    }
    public function view_lawyer_availability(){

    }
    public function book_lawyer(){

    }

/**
 * return unique upcomming dates avaiable in db
 */
    public function show_upcomming_schedule_dates_dashboard($search_date,$user_id){
        
        $condition = "user_id =" . "'" . $user_id . "' AND (".  "schedule_date =" . "'" . $search_date[0] . "' OR schedule_date = " . "'" . $search_date[1] . "' OR schedule_date =" . "'" . $search_date[2] . "' OR schedule_date =" ."'" . $search_date[3] . "' OR schedule_date =" . "'" . $search_date[4] . "' OR schedule_date =" . "'" . $search_date[5] . "' OR schedule_date =" . "'" . $search_date[6] . "')";
        
        $this->db->select('schedule_date');
        $this->db->distinct('schedule_date');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        
        $this->db->order_by("schedule_date", "asc");
        $this->db->order_by("schedule_time", "asc");
        //$this->db->limit(1);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            //has at least one record with booking or not
            return $query->result();
        } 
        else {
            return false;
        }
        
       // echo $this->db->last_query();
    }

    /**
     * this modle will return upcomming scheduel including current date to dashboard
     */
    public function show_upcomming_schedule_dashboard($search_date,$user_id){
        //print_r($search_date);

         $condition = "user_id =" . "'" . $user_id . "' AND (".  "schedule_date =" . "'" . $search_date[0] . "' OR schedule_date = " . "'" . $search_date[1] . "' OR schedule_date =" . "'" . $search_date[2] . "' OR schedule_date =" ."'" . $search_date[3] . "' OR schedule_date =" . "'" . $search_date[4] . "' OR schedule_date =" . "'" . $search_date[5] . "' OR schedule_date =" . "'" . $search_date[6] . "')";
        $this->db->select('*');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        
        $this->db->order_by("schedule_date", "asc");
        $this->db->order_by("schedule_time", "asc");
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


/**
 * this model will give schedule to create lawyer scheudle
 */
    public function show_upcomming_schedule($search_date,$user_id){
        //print_r($search_date);

         $condition = "user_id =" . "'" . $user_id . "' AND (".  "schedule_date =" . "'" . $search_date[0] . "' OR schedule_date = " . "'" . $search_date[1] . "' OR schedule_date =" . "'" . $search_date[2] . "' OR schedule_date =" ."'" . $search_date[3] . "' OR schedule_date =" . "'" . $search_date[4] . "' OR schedule_date =" . "'" . $search_date[5] . "' OR schedule_date =" . "'" . $search_date[6] . "')";
        $this->db->select('*');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        
        $this->db->order_by("schedule_date", "asc");
        $this->db->order_by("schedule_time", "asc");
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
    /**
     * insert lawyer scheduel dates to the the db
     */
    public function create_lawyer_schedule($data){
        //$user_id = $this->session->lawyer_detail['user_id'];
        $condition ="user_id =" . "'" . $data['user_id'] . "' AND " .  "schedule_date =" . "'" . $data['schedule_date'] . "' AND " . "schedule_time =" . "'" . $data['schedule_time'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_lawyer_schedule');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            echo $query->num_rows();
            if ($query->num_rows() == 1) {
                echo  false;
            } 
            else {
                $this->db->insert('tbl_lawyer_schedule', $data);
            
                if ($this->db->affected_rows() > 0) {
                    return true;
                }
                //return false;
            }
    }
    /**
     * insert case brief in to the db
     */
    public function create_case_brief($data){
        $this->db->insert('tbl_casebrief', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else{
            return false;
        }
    }
    public function show_case_brief($data){
        $condition ="user_id =" . "'" . $data . "'";
        $this->db->select('*');
        $this->db->from('tbl_casebrief');
        $this->db->where($condition);
        $this->db->order_by("case_added_date", "desc");
        $query_case_brief = $this->db->get();
         //echo $this->db->last_query();
        if ($query_case_brief->num_rows() > 0) {
            return $query_case_brief->result();
            
        } 
        else{
            return  false;
        }
    }

    public function show_client_booking($data){
        $condition ="client_id =" . "'" . $data . "'";
        $this->db->select('*');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        $this->db->order_by("schedule_date", "desc");
        $query_client_booking = $this->db->get();
         //echo $this->db->last_query();
         
        if ($query_client_booking->num_rows() > 0) {
            return $query_client_booking->result();
            
        } 
        elseif($query_client_booking->num_rows() == 0){
            return 'empty';
        }
        else{
            return  false;
        }
    }
    public function get_lawyer_detail($user_id){
        $condition ="user_id =" . "'" . $user_id . "'";     
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $this->db->limit(1);
        
        $query_lawyer_detail = $this->db->get();
        if ($query_lawyer_detail->num_rows() == 1) {
            return $query_lawyer_detail->result();
            
        } 
        elseif($query_lawyer_detail->num_rows() > 0){
            return 'empty';
        }
        else{
            return  false;
        }
    }

    public function searh_lawyer($data){
       // print_r($data);
        echo "<br>";
        if($data['admitted_bar'] == '0' && $data['specialty'] == '0'){
            
           $condition ="legal_professional =" . "'" . $data['legal_professional'] . "' AND provincial_area =". "'" . $data['provincial_area'] . "'";
        }
        elseif($data['admitted_bar'] != '0' && $data['specialty'] != '0'){
           $condition ="legal_professional =" . "'" . $data['legal_professional'] . "' AND provincial_area =". "'" . $data['provincial_area'] . "' AND specialty =" . "'" . $data['specialty']. "' AND admitted_bar =" . "'" . $data['admitted_bar'] ."'";
        }
        elseif($data['specialty'] != '0'){
           $condition ="legal_professional =" . "'" . $data['legal_professional'] . "' AND provincial_area =". "'" . $data['provincial_area'] . "' AND specialty =" . "'" . $data['specialty']."'";
        }
        else{
           $condition ="legal_professional =" . "'" . $data['legal_professional'] . "' AND provincial_area =". "'" . $data['provincial_area'] . "' AND admitted_bar =" . "'" . $data['admitted_bar']."'";
        }
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $query_lawyer_detail = $this->db->get();
        if ($query_lawyer_detail->num_rows() > 0) {
            return $query_lawyer_detail->result();
            
        } 
        else{
            return 'empty';
        }
        //print_r($data);
    }
    public function searh_other_lawyer($data){
        $condition ="legal_professional =" . "'" . $data['legal_professional'] . "' AND provincial_area =". "'". $data['provincial_area'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($condition);
        $query_lawyer_detail = $this->db->get();
        if ($query_lawyer_detail->num_rows() > 0) {
            return $query_lawyer_detail->result();
            
        } 
        else{
            return 'empty';
        }
    }

    public function set_to_book($data){
        $condition ="schedule_id =" . "'" . $data['schedule_id'] . "'";
        $this->db->select('schedule_status');
        $this->db->from('tbl_lawyer_schedule');
        $this->db->where($condition);
        $this->db->limit(1);
        $query_check_availability = $this->db->get();
        $schedule_status = $query_check_availability->result()[0]->schedule_status;
        
        if($schedule_status == 'available'){
            
            $this->db->set('schedule_status', 'booked');
            $this->db->set('client_id', $data['client_id']);
            $this->db->set('booked_date', $data['current_date']);
            $this->db->where('schedule_id', $data['schedule_id']);
            $this->db->update('tbl_lawyer_schedule');
            //echo $this->db->last_query();
            if ($this->db->affected_rows() > 0) {
                return true;
                //echo "success";
            }else{
                //echo "error";
                return false;
            }
            
        }else{
            return "notavailable";
        }
    }

    public function create_question($data){
        $this->db->insert('tbl_forum_question', $data);
        echo $this->db->last_query();
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    public function get_all_question(){
        $this->db->select('*');
        $this->db->from('tbl_forum_question');
        $this->db->order_by("forum_added_date", "desc");
        $all_question = $this->db->get();
        if ($all_question->num_rows() > 0) {
            return $all_question->result();
            
        } 
        else{
            return 'empty';
        }
    }
    public function get_any_user_detail($data){
        if($data['user_type'] == 'client'){
            $condition ="client_id =" . "'" . $data['user_id'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user_client');
            $this->db->where($condition);
            $this->db->limit(1);
            
        }else if($data['user_type']=='lawyer'){
            $condition ="user_id =" . "'" . $data['user_id'] . "'";
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where($condition);
            $this->db->limit(1);
           
        }
        $any_user_detail = $this->db->get();
        return $any_user_detail->result();

    }
    public function get_single_question($data){
        $condition ="forum_id =" . "'" . $data['forum_id'] . "'";
        $this->db->select('*');
        $this->db->from('tbl_forum_question');
        $this->db->where($condition);
        $this->db->limit(1);
        $single_forum_detail = $this->db->get();
        if ($single_forum_detail->num_rows() > 0) {
            return $single_forum_detail->result();
            
        } 
        else{
            return 'empty';
        }
        
    }
    
}


?>