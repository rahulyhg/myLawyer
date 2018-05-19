<?php

if (!($this->session->userdata('client_detail'))) {
   
    redirect('/user/login');
}
else{
 $client_detail = $this->session->userdata('client_detail'); 
 
}


?>


<!-- lawyer profile and resouce link -->
<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<br>
<div class="container">
<div class="row">
<?php 

  if(isset($error_message_display)){
      echo '<div class="alert alert-danger" role="alert">';
      echo $error_message_display;
      echo '</div>';
      }
      if(isset($success_message_display)){
      echo '<div class="alert alert-success" role="alert">';
      echo $success_message_display;
      echo '</div>';
      }

?>
	<!-- Spacer -->
    
      <div class="col-md-5">
        	<!--  -->
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php 
              echo $client_detail['fname'] .' '. $client_detail['lname'];
              ?>
              
              
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email Address:</td>
                        <td>
                        <?php 
                        echo $client_detail['email']
                        ?>
                        </td>

                      </tr>
                      <tr>
                        <td>Contact detail:</td>
                        <td>
                        <?php 
                        echo $client_detail['contact']
                        ?>
                        </td>

                      </tr>
                      
                      
                   
                        <tr>
                        <td>Register Date</td>
                        <td><?php 
                        echo $client_detail['register-date']
                        ?></td>
                      </tr>
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
                        <span class="pull-right">
                        <a href="#"  type="button" class="btn btn-md btn-warning">Edit My Profile</a>                           
                        </span>
                        <div class="clearfix"></div>
                    </div>
            
          </div>
          <!--  -->
      
      </div>
				





    <div class="col-md-7">
      <!--  -->
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php 
              echo "<h3 class='panel-title'>Booking History</h3>";
              //  if($this->session->userdata('lawyer_detail')['legal-professional'] === 'lawyer-sworn-translator'){
              //   echo "<h3 class='panel-title'>Case handels and afflications</h3>";
              //  }
              //  else if($this->session->userdata('lawyer_detail')['legal-professional'] === 'lawyer'){
              //    echo "<h3 class='panel-title'>Case handled</h3>";
              //  }
              //  else if($this->session->userdata('lawyer_detail')['legal-professional'] === 'sworn-translator' || $this->session->userdata('lawyer_detail')['legal-professional'] === 'notary'||$this->session->userdata('lawyer_detail')['legal-professional'] === 'family-counselor'){
              //   echo "<h3 class='panel-title'>Affiliations</h3>";
              // }
              ?>
  
            </div>
            <div class="panel-body" style="overflow: auto;max-height: 500px;">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                
                  <?php
                  if($booking_history == 'empty'){
                    echo "<span class='label label-default' style='font-size:18px'>No appointment found.</span><br><br>";
                    
                  }
                  else{
                    echo "<table class='table table-user-information' style='height: 300px !important; overflow: auto;'>";
                    echo "<thead>";
                    echo "<tr>";
                      echo "<th>Legal Professional Name</th>";
                      echo "<th>Date</th>";
                      echo "<th>Time</th>";
                      echo "<th>Status</th>";
                      echo "<th>Booked Date</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                   //print_r($booking_history);
                    
                    foreach($booking_history as $booking){
                      $current_date = date('Y-m-d');
                              $yester_date = date('Y-m-d', strtotime($current_date . ' -1 day'));
                      if($yester_date >= $booking->schedule_date){
                        echo "<tr class='success' title='booking date passed'>";
                                echo "<td>";              
                                echo $booking->lawyer;
                                echo "</td>";
                              echo "<td>";
    
                               echo $booking->schedule_date;
                             
                              echo "</td>";
                              echo "<td>";
                                echo date('h:i:s a', strtotime( $booking->schedule_time)); 
                              echo "</td>";

                              echo "<td>";
                              if($booking->legal_professional == 'sworn-translator' || $booking->legal_professional == 'lawyer-sworn-translator' ){
                                echo "<a href='".base_url('user/clientMoreInfo/'.$booking->schedule_id). "'>";
                                  echo "<span class='label label-danger' data-toggle='tooltip' data-placement='top' title='Click to submit more information if request by Legal Professional'>";
                                  echo str_replace("-"," ",$booking->schedule_status) ;
                                  echo "</span>";
                                  
                                echo "</a>";
                            }else{
                              echo str_replace("-"," ",$booking->schedule_status);
                            }
                              echo "</td>";
                              echo "<td>";
                                echo $booking->booked_date;
                              
                            echo "</td>";
                            
                           
                           echo "</td>";
                          
                         echo "</tr>";
                      }else{
                        echo "<tr  title='Upcomming booking'>";
                                echo "<td>";              
                                echo $booking->lawyer;
                                echo "</td>";
                              echo "<td>";
                              $current_date = date('Y-m-d');
                              $yester_date = date('Y-m-d', strtotime($current_date . ' -1 day'));

                               echo $booking->schedule_date;
                             
                              echo "</td>";
                              echo "<td>";
                                echo date('h:i:s a', strtotime( $booking->schedule_time)); 
                               
                              echo "</td>";

                              echo "<td>";
                              if($booking->legal_professional == 'sworn-translator' || $booking->legal_professional == 'lawyer-sworn-translator' ){
                                  echo "<a href='".base_url('user/clientMoreInfo/'.$booking->schedule_id). "'>";
                                    echo "<span class='label label-danger' data-toggle='tooltip' data-placement='top' title='Click to submit more information if request by Legal Professional'>";
                                    echo str_replace("-"," ",$booking->schedule_status) ;
                                    echo "</span>";
                                    
                                  echo "</a>";
                              }else{
                                echo str_replace("-"," ",$booking->schedule_status);
                              }
                                
                              echo "</td>";
                              echo "<td>";
                                echo $booking->booked_date;
                              
                            echo "</td>";
                            
                           
                           echo "</td>";
                          
                         echo "</tr>";
                      }
                      
                     }
                     echo "</tbody>";
                echo "</table>";
                  }
                  
                  ?>
                  
             
                  
                  
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">

                        <span class="pull-right">
                        <!-- <a href="<?php echo base_url('/user/editSchedules'); ?>"  type="button" class="btn btn-md btn-warning"><i class="glyphicon glyphicon-edit"></i> &nbsp;Edit Upcomming Bookings</a> -->

                            <!-- <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
                        </span>
                        <div class="clearfix"></div>
                    </div>
            
          </div>
          <!--  -->
    </div>

  </div>

</div>




<?php $this->load->view('footer'); ?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip('show')
})
</script>