<!-- this page will use to create schedule for comming 7 days -->
<?php

if (!($this->session->userdata('lawyer_detail'))) {
   
    redirect('/user/login');
}
else{
 //$lawyer_detail = $this->session->userdata('lawyer_detail'); 
 //print_r($lawyer_detail);
}


?>
<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>

 <div class="container">

    <div class="row">
    <?php 
    // print_r($upcomming_scheduled);
    // echo "<hr>";
    // print_r($result_in_db);
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

    <h2>Aready Added</h2>
        <div>
        <?php 
             
            foreach($result_in_db as $date => $all_time){
                echo "<div class='card'>";
                    echo "<div class='card-header' role='tab' id='headingOne'>";
                    echo "<h5 class='mb-0'>";
                    echo "<a data-toggle='collapse' data-parent='#accordion' href='#".$date."' aria-expanded='true' aria-controls='collapseOne'>";
                        echo $date;
                    echo "</a>";
                    echo "</h5>";
                echo "</div>";
                echo "<div id='".$date."' class='collapse' role='tabpanel' aria-labelledby='headingOne'>";
                echo "<div class='card-block'>";
                
                echo "<table class='table table-striped'>";
                echo "<tbody>";
             echo "<tr class='warning'>";
                    echo "<td>Time</td><td>Day</td><td>Status</td><td>Added date</td>";
             echo "</tr>";
                foreach($all_time as $time=>$db_data){
                    
             
            echo "<tr>";
                    echo "<td>";
                        echo $time;
                    echo "</td>";
                    echo "<td>";
                        echo $db_data->day;
                    echo "</td>";
                    echo "<td>";
                        echo $db_data->schedule_status;
                    echo "</td>";
                    echo "<td>";
                        echo $db_data->schedule_add_date;
                    echo "</td>";
                    
            echo "</tr>";
             
                   
            echo "</tbody>";        
                }
                echo "</table>"; 
              echo "</div>";
                echo "</div>";
            echo "</div>";
            }
             

             
             
        ?>
       <h2>New to add</h2>
       <?php
       $schedule_time = array(0=>'06:00:00',1=>'06:30:00',2=>'07:00:00',3=>'07:30:00',4=>'08:00:00'
							,5=>'08:30:00',6=>'09:00:00',7=>'09:30:00',8=>'10:00:00',9=>'10:30:00',10=>'11:00:00'
							,11=>'11:30:00',12=>'12:00:00',13=>'12:30:00',14=>'13:00:00',15=>'13:30:00'
							,16=>'14:00:00',17=>'14:30:00',18=>'15:00:00',19=>'15:30:00',20=>'16:00:00',21=>'16:30:00'
							,22=>'17:00:00',23=>'17:30:00',24=>'18:00:00',25=>'18:30:00',26=>'19:00:00',27=>'19:30:00'
							,28=>'20:00:00',29=>'20:30:00',30=>'21:00:00',31=>'21:30:00',32=>'22:00:00',33=>'22:30:00'
							,34=>'23:00:00'
                        );
        ?>
       <?php
       foreach($upcomming_scheduled as $date){
        
              
                    if(array_key_exists($date, $result_in_db)){
                        echo "<h3>" . $date . '</h3>';
                        echo form_open('user/createLawyerSchedule'); 
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        //print_r($result_in_db[$date]);
                        $i=1;
                        foreach($schedule_time as $time){


                            if(array_key_exists($time, $result_in_db[$date])){
                                //echo $date . $time . " exists in database<br>";
                            }
                            else{
                                
                                if($i == 1){
                                   
                                    echo "<tr>";

                                }
                                if(($i%5)==0){
                                    echo "</tr>";
                                    echo "<tr>";
                                    $i=1;
                                }
                                    
                                    echo "<td>";
                                    echo date('h:i:s a', strtotime($time));
                                    echo "</td>";
                                    echo "<td>";
                                        //echo "<input type='checkbox' name='" . $date . "' value='" . $time . "'>";
                                        echo form_checkbox($time, $date, FALSE);
                                        echo "Approve";
                                    echo "</td>";
                                    
                                    $i++;
                               
                                //echo $date . $time . " not in database<br>";
                            }
                        }
                        echo "<tr><td>";
                        echo form_submit('submit', 'Update schedule', "class='btn btn-success btn-md btn-block'");    
                        echo "</td></td>";
                        echo "</tbody>";
                        echo "</table>";
                        echo form_close();

                
            }
            else{
                echo "<h3>" . $date . '</h3>';
                echo form_open('user/createLawyerSchedule'); 
                echo "<table class='table table-striped table-bordered'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                                echo "<td>Slot Time</td><td>Approve</td>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";




                        $y=1;
                        foreach($schedule_time as $time){
                             
                            if($y == 1){
                                   
                                echo "<tr>";

                            }
                            if(($y%5)==0){
                                echo "</tr>";
                                echo "<tr>";
                                $y=1;
                            }
                            echo "<td>";
                            echo date('h:i:s a', strtotime($time));
                            
                        echo "</td>";
                        echo "<td>";
                            //echo "<input type='checkbox' name='" . $date . "' value='" . $time . "'>";
                            echo form_checkbox($time, $date, FALSE);
                            echo "Approve";
                        echo "</td>";
                        
                        $y++;
                        }
                        echo "<tr><td>";
                        echo form_submit('submit', 'Update schedule', "class='btn btn-success btn-md btn-block'");    
                        echo "</td></td>";
                        echo "</tbody>";

                        echo "</table>";
                        
                        echo form_close();
            }
       }
       
       ?>

        

        
        </div>
    
    </div>


    <div class="row">
    <div class="col-md-offset-2 col-md-8 ">
    <?php
    //Time slots this is a fixed one
    
    // echo "<table class='table table-striped'>";
    // echo "<tbody>";

        

    //     echo "<tr>";
    //     echo form_open('user/clientLogin');
    //     echo "<td>";
    //     echo "08-08-2018 (Tuesday)";
    //     echo "</td>";
    //     echo "<td>";
    //     echo "<div class='form-group'>";
    //     $date = date("Y-m-d");  
    //     $options = array(
    //         $date.' 06:00:00'         => '6.00 am',
    //         $date.' 06:30:00'         => '6.30 am',
    //         $date.' 07:00:00'         => '7.00 am',
    //         $date.' 07:30:00'         => '7.30 am',
    //         $date.' 08:00:00'         => '8.00 am',
    //         $date.' 08:30:00'         => '8.30 am',
    //         $date.' 09:00:00'         => '9.00 am',
    //         $date.' 09:30:00'         => '9.30 am',
    //         $date.' 10:00:00'         => '10.00 am',
    //         $date.' 10:30:00'         => '10.30 am',
    //         $date.' 11:00:00'         => '11.00 am',
    //         $date.' 11:30:00'         => '11.30 am',
    //         $date.' 12:00:00'         => '12.00 noon',
    //         $date.' 12:30:00'         => '12.30 pm',
    //         $date.' 13:00:00'         => '1.00 pm',
    //         $date.' 13:30:00'         => '1.30 pm',
    //         $date.' 14:00:00'         => '2.00 pm',
    //         $date.' 14:30:00'         => '2.30 pm',
    //         $date.' 15:00:00'         => '3.00 pm',
    //         $date.' 15:30:00'         => '3.30 pm',
    //         $date.' 16:00:00'         => '4.00 pm',
    //         $date.' 17:30:00'         => '4.30 pm',
    //         $date.' 18:00:00'         => '5.00 pm',
    //         $date.' 18:30:00'         => '5.30 pm',
    //         $date.' 19:00:00'         => '6.00 pm',
    //         $date.' 19:30:00'         => '6.30 pm',
    //         $date.' 20:00:00'         => '7.00 pm',
    //         $date.' 21:30:00'         => '7.30 pm',
    //         $date.' 22:00:00'         => '8.00 pm',
    //         $date.' 22:30:00'         => '8.30 pm',
    //         $date.' 23:00:00'         => '9.00 pm',
            
            
            
    //     );
    //     $attribute = 'class="form-control time"';
    
    
    // echo form_dropdown('start-time', $options, '6.00am',$attribute);
    //     echo "</div>";
    //     echo "</td>";
    //     echo "<td>";
    //     echo "<div class='form-group' style='margin-left:10px;'>";
    //     $options = array(
    //         '0'         => 'Number of slots',
    //         '1'         => '01',
    //         '2'         => '02',
    //         '3'         => '03',
    //         '4'         => '04',
    //         '5'         => '05',
    //         '6'         => '06',
    //         '7'         => '04',
    //         '8'         => '08',
    //         '9'         => '09',
            
            
    //     );
    //     $attribute = 'class="form-control slot"';
    
    
    // echo form_dropdown('slot-count', $options, '0',$attribute);
    //     echo "</div>";
    //     echo "</td>";
    //     echo "<td>";
    //     echo form_submit('submit', 'Create my schedule', "class='btn btn-success btn-md' style='margin-left:10px;'");
    //     echo "</td>";
    //     echo form_close();
    //   echo "</tr>";
    //     echo "<td colspan='3'>test</td>";
    //     echo "<tr>";

    //   echo "</tr>";


    //   echo "<tr>";
    //     echo form_open('user/clientLogin');
    //     echo "<td>";
    //     echo "08-08-2018 (Tuesday)";
    //     echo "</td>";
    //     echo "<td>";
    //     echo "<div class='form-group'>";
    //     $date = date("Y-m-d");  
    //     $options = array(
    //         $date.' 06:00:00'         => '6.00 am',
    //         $date.' 06:30:00'         => '6.30 am',
    //         $date.' 07:00:00'         => '7.00 am',
    //         $date.' 07:30:00'         => '7.30 am',
    //         $date.' 08:00:00'         => '8.00 am',
    //         $date.' 08:30:00'         => '8.30 am',
    //         $date.' 09:00:00'         => '9.00 am',
    //         $date.' 09:30:00'         => '9.30 am',
    //         $date.' 10:00:00'         => '10.00 am',
    //         $date.' 10:30:00'         => '10.30 am',
    //         $date.' 11:00:00'         => '11.00 am',
    //         $date.' 11:30:00'         => '11.30 am',
    //         $date.' 12:00:00'         => '12.00 noon',
    //         $date.' 12:30:00'         => '12.30 pm',
    //         $date.' 13:00:00'         => '1.00 pm',
    //         $date.' 13:30:00'         => '1.30 pm',
    //         $date.' 14:00:00'         => '2.00 pm',
    //         $date.' 14:30:00'         => '2.30 pm',
    //         $date.' 15:00:00'         => '3.00 pm',
    //         $date.' 15:30:00'         => '3.30 pm',
    //         $date.' 16:00:00'         => '4.00 pm',
    //         $date.' 17:30:00'         => '4.30 pm',
    //         $date.' 18:00:00'         => '5.00 pm',
    //         $date.' 18:30:00'         => '5.30 pm',
    //         $date.' 19:00:00'         => '6.00 pm',
    //         $date.' 19:30:00'         => '6.30 pm',
    //         $date.' 20:00:00'         => '7.00 pm',
    //         $date.' 21:30:00'         => '7.30 pm',
    //         $date.' 22:00:00'         => '8.00 pm',
    //         $date.' 22:30:00'         => '8.30 pm',
    //         $date.' 23:00:00'         => '9.00 pm',
            
            
            
    //     );
    //     $attribute = 'class="form-control time"';
    
    
    // echo form_dropdown('start-time', $options, '6.00am',$attribute);
    //     echo "</div>";
    //     echo "</td>";
    //     echo "<td>";
    //     echo "<div class='form-group' style='margin-left:10px;'>";
    //     $options = array(
    //         '0'         => 'Number of slots',
    //         '1'         => '01',
    //         '2'         => '02',
    //         '3'         => '03',
    //         '4'         => '04',
    //         '5'         => '05',
    //         '6'         => '06',
    //         '7'         => '04',
    //         '8'         => '08',
    //         '9'         => '09',
            
            
    //     );
    //     $attribute = 'class="form-control slot"';
    
    
    // echo form_dropdown('slot-count', $options, '0',$attribute);
    //     echo "</div>";
    //     echo "</td>";
    //     echo "<td>";
    //     echo form_submit('submit', 'Create my schedule', "class='btn btn-success btn-md' style='margin-left:10px;'");
    //     echo "</td>";
    //     echo form_close();
    //   echo "</tr>";
    //     echo "<td colspan='3'>test</td>";
    //     echo "<tr>";

    //   echo "</tr>";
      
    // echo "</tbody>";
    // echo "</table>";

    ?>

    
    
    
    </div>

    
    </div>
 
 
 </div>  

<?php $this->load->view('footer'); ?>
<script>

        $(document).ready(function(){
            
            $('.slot').on('change',function(){
                
                
                //alert(this.value);
                var tr = $(this).closest('tr');
                var time = $(tr).find('.time').val();
                //var time = $('.time').val();
               
               var schedule_time = new Array();
                for(i=1;i<=this.value;i++){
                    time = moment(time).add(30, 'm').format('LLL');
                    schedule_time[i] = moment(time).add(0, 'm').format('LT');
                    //alert(moment(time).add(30, 'm').format('LT'));

                }
                var result = alert('Following Time Slots will Allocate\n' + schedule_time);
                if(result){
                    schedule_time = new Array();
                }
                
            });
        });
</script>