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
	<!-- Spacer -->
    
      <div class="col-md-6">
        	<!--  -->
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php 
              echo $result_lawyer_detail[0]->title . '.' . $result_lawyer_detail[0]->first_name .' '. $result_lawyer_detail[0]->last_name;
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
                        echo $result_lawyer_detail[0]->email;
                        ?>
                        </td>

                      </tr>
                      <tr>
                        <td>Provicial Area</td>
                        <td><?php 
                        echo $result_lawyer_detail[0]->provincial_area;
                        ?></td>
                      </tr>
                      <?php 
                        if($result_lawyer_detail[0]->legal_professional == 'lawyer' || $result_lawyer_detail[0]->legal_professional== 'lawyer-sworn-translator'){
                          echo "<tr>";
                          echo "<td>Legal Professional</td>";
                          echo "<td>";
                          echo str_replace("-"," ",$result_lawyer_detail[0]->legal_professional);
                          
                          echo "</td>";
                        echo "</tr>";
                          echo "<tr>";
                          echo "<td>Admitted Bar</td>";
                          echo "<td>";
                          echo $result_lawyer_detail[0]->admitted_bar;
                          echo "</td>";
                        echo "</tr>";
                        echo "<tr>";
                          echo "<td>Specialty</td>";
                          echo "<td>";
                          echo $result_lawyer_detail[0]->specialty;
                          echo "</td>";
                        echo "</tr>";
                        }
                        else{
                          echo "<tr>";
                          echo "<td>Legal Professional</td>";
                          echo "<td>";
                          echo $result_lawyer_detail[0]->legal_professional;
                          echo "</td>";
                        echo "</tr>";
                        }
                        
                      ?>
                      
                   
                         <tr>
                             <tr>
                        <td>Available Location</td>
                        <td><?php 
                        echo $result_lawyer_detail[0]->location;
                        ?></td>
                      </tr>
                        <tr>
                        <td>Register Date</td>
                        <td><?php 
                        echo $result_lawyer_detail[0]->register_date;
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
                        
                        </span>
                        <div class="clearfix"></div>
                    </div>
            
          </div>
          <!--  -->
      
      </div>
				





    <div class="col-md-6">
      <!--  -->
      <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php 
              
               if($this->session->userdata('lawyer_detail')['legal-professional'] === 'lawyer-sworn-translator'){
                echo "<h3 class='panel-title'>Case handels and afflications</h3>";
               }
               else if($this->session->userdata('lawyer_detail')['legal-professional'] === 'lawyer'){
                 echo "<h3 class='panel-title'>Case handled</h3>";
               }
               else if($this->session->userdata('lawyer_detail')['legal-professional'] === 'sworn-translator' || $this->session->userdata('lawyer_detail')['legal-professional'] === 'notary'||$this->session->userdata('lawyer_detail')['legal-professional'] === 'family-counselor'){
                echo "<h3 class='panel-title'>Affiliations</h3>";
              }
              ?>
  
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                
                  <?php
                  if($case_briefs == 'empty'){
                    echo "<span class='label label-default' style='font-size:18px'>Please add cases you atteneded</span><br><br>";
                    
                  }
                  else{
                    echo "<table class='table table-user-information' style='display: block; height: 300px !important; overflow: auto;'>";
                    echo "<tbody>";
                    foreach($case_briefs as $case_brief){
                      echo "<tr>";
                           echo "<td>";
                             echo "<h3>";
                               echo $case_brief->case_title;
                               echo "</h3>";
                             echo "<p>";
                               echo $case_brief->case_description;
                             echo "</p>";
                             echo "<span class='label label-info'>";
                             echo $case_brief->case_added_date;
                             echo "</span>";
                           
                           echo "</td>";
                          
                         echo "</tr>";
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
                      
                        </span>
                        <div class="clearfix"></div>
                    </div>
            
          </div>
          <!--  -->
    </div>

  </div>
  <div class="row">
  <div class="col-md-12">
      <!--  -->
      <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Your Booking Schedule</h3>
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                <?php 
                  //print_r($result_unique_dates);
                 // echo "<hr>";
                // print_r($result_all_schedules);
                  if($result_unique_dates == 'empty'){
                    echo "<span class='label label-default' style='font-size:18px'>Please add your availabitity to show client</span><br><br>";
                  }
                  else{
                    echo "<div id='accordion' role='tablist' aria-multiselectable='true'>";
                    $i=1;
                  foreach($result_unique_dates as $unique_date){
                   // print_r($unique_date->schedule_date);


                  
                   echo "<div class='card'>";
                     echo "<div class='card-header' role='tab' id='headingOne'>";
                       echo "<h5 class='mb-0'>";
                         echo "<a data-toggle='collapse' data-parent='#accordion' href='#". $unique_date->schedule_date ."' aria-expanded='true' aria-controls='collapseOne'>";
                           echo $unique_date->schedule_date;
                           echo '&nbsp ('. date('l', strtotime($unique_date->schedule_date)) . ")";
                         echo  "</a>";
                       echo "</h5>";
                     echo "</div>";
                    if($i == 1){
                      echo  "<div id='". $unique_date->schedule_date."' class='collapse in' role='tabpanel' aria-labelledby='headingOne'>";
                      $i++;
                    }
                    else{
                      echo  "<div id='". $unique_date->schedule_date."' class='collapse' role='tabpanel' aria-labelledby='headingOne'>";
                    }
                    
                      echo "<div class='card-block'>";
                      echo "<table class='table table-user-information'>";
                    echo "<tbody>";


                      foreach($result_all_schedules as $schedule){
                        //print_r($schedule->schedule_date);
                       // print_r( $unique_date->schedule_date);

                        if($unique_date->schedule_date == $schedule->schedule_date){
                          echo "<tr>";
                          echo "<td>";
                         
                          echo date('h:i:s a', strtotime($schedule->schedule_time));
                          echo "</td>";
                          echo "<td>";
                            if($schedule->schedule_status == 'tentative booking'){
                              echo "Tentative booking";
                            }
                            else if($schedule->schedule_status == 'available'){
                              echo "<button class='btn btn-success'>". $schedule->schedule_status ."</button>";
                            }
                            else if($schedule->schedule_status == 'booked'){
                              echo "Booked ";
                            }
                            else if($schedule->schedule_status == 'booked-closed'){
                              echo "Booking completed ";
                            }
                            else if($schedule->schedule_status == 'closed'){
                              echo "Slot closed";
                            }
                            
                          echo "</td>";
                          
                        }
                      }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                  }
                  echo "</div>";
                  }

                 
                ?>
                  
            
                  <!--  -->
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                 
                        <span class="pull-right">
                       
                        </span>
                        <div class="clearfix"></div>
                    </div>
            
          </div>
          <!--  -->
    </div>
  </div>
</div>




<?php $this->load->view('footer'); ?>