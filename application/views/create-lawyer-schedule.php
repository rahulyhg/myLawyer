<!-- this page will use to create schedule for comming 7 days -->

<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>

 <div class="container">
    <div class="row">
    <div class="col-md-offset-2 col-md-8 ">
    <?php
    echo "<table class='table table-striped'>";
    echo "<tbody>";

        

        echo "<tr>";
        echo form_open('user/clientLogin');
        echo "<td>";
        echo "08-08-2018 (Tuesday)";
        echo "</td>";
        echo "<td>";
        echo "<div class='form-group'>";
        $date = date("Y-m-d");  
        $options = array(
            $date.' 06:00:00'         => '6.00 am',
            $date.' 06:30:00'         => '6.30 am',
            $date.' 07:00:00'         => '7.00 am',
            $date.' 07:30:00'         => '7.30 am',
            $date.' 08:00:00'         => '8.00 am',
            $date.' 08:30:00'         => '8.30 am',
            $date.' 09:00:00'         => '9.00 am',
            $date.' 09:30:00'         => '9.30 am',
            $date.' 10:00:00'         => '10.00 am',
            $date.' 10:30:00'         => '10.30 am',
            $date.' 11:00:00'         => '11.00 am',
            $date.' 11:30:00'         => '11.30 am',
            $date.' 12:00:00'         => '12.00 noon',
            $date.' 12:30:00'         => '12.30 pm',
            $date.' 13:00:00'         => '1.00 pm',
            $date.' 13:30:00'         => '1.30 pm',
            $date.' 14:00:00'         => '2.00 pm',
            $date.' 14:30:00'         => '2.30 pm',
            $date.' 15:00:00'         => '3.00 pm',
            $date.' 15:30:00'         => '3.30 pm',
            $date.' 16:00:00'         => '4.00 pm',
            $date.' 17:30:00'         => '4.30 pm',
            $date.' 18:00:00'         => '5.00 pm',
            $date.' 18:30:00'         => '5.30 pm',
            $date.' 19:00:00'         => '6.00 pm',
            $date.' 19:30:00'         => '6.30 pm',
            $date.' 20:00:00'         => '7.00 pm',
            $date.' 21:30:00'         => '7.30 pm',
            $date.' 22:00:00'         => '8.00 pm',
            $date.' 22:30:00'         => '8.30 pm',
            $date.' 23:00:00'         => '9.00 pm',
            
            
            
        );
        $attribute = 'class="form-control time"';
    
    
    echo form_dropdown('start-time', $options, '6.00am',$attribute);
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class='form-group' style='margin-left:10px;'>";
        $options = array(
            '0'         => 'Number of slots',
            '1'         => '01',
            '2'         => '02',
            '3'         => '03',
            '4'         => '04',
            '5'         => '05',
            '6'         => '06',
            '7'         => '04',
            '8'         => '08',
            '9'         => '09',
            
            
        );
        $attribute = 'class="form-control slot"';
    
    
    echo form_dropdown('slot-count', $options, '0',$attribute);
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo form_submit('submit', 'Create', "class='btn btn-success btn-md' style='margin-left:10px;'");
        echo "</td>";
        echo form_close();
      echo "</tr>";
        echo "<td colspan='3'>test</td>";
        echo "<tr>";

      echo "</tr>";


      echo "<tr>";
        echo form_open('user/clientLogin');
        echo "<td>";
        echo "08-08-2018 (Tuesday)";
        echo "</td>";
        echo "<td>";
        echo "<div class='form-group'>";
        $date = date("Y-m-d");  
        $options = array(
            $date.' 06:00:00'         => '6.00 am',
            $date.' 06:30:00'         => '6.30 am',
            $date.' 07:00:00'         => '7.00 am',
            $date.' 07:30:00'         => '7.30 am',
            $date.' 08:00:00'         => '8.00 am',
            $date.' 08:30:00'         => '8.30 am',
            $date.' 09:00:00'         => '9.00 am',
            $date.' 09:30:00'         => '9.30 am',
            $date.' 10:00:00'         => '10.00 am',
            $date.' 10:30:00'         => '10.30 am',
            $date.' 11:00:00'         => '11.00 am',
            $date.' 11:30:00'         => '11.30 am',
            $date.' 12:00:00'         => '12.00 noon',
            $date.' 12:30:00'         => '12.30 pm',
            $date.' 13:00:00'         => '1.00 pm',
            $date.' 13:30:00'         => '1.30 pm',
            $date.' 14:00:00'         => '2.00 pm',
            $date.' 14:30:00'         => '2.30 pm',
            $date.' 15:00:00'         => '3.00 pm',
            $date.' 15:30:00'         => '3.30 pm',
            $date.' 16:00:00'         => '4.00 pm',
            $date.' 17:30:00'         => '4.30 pm',
            $date.' 18:00:00'         => '5.00 pm',
            $date.' 18:30:00'         => '5.30 pm',
            $date.' 19:00:00'         => '6.00 pm',
            $date.' 19:30:00'         => '6.30 pm',
            $date.' 20:00:00'         => '7.00 pm',
            $date.' 21:30:00'         => '7.30 pm',
            $date.' 22:00:00'         => '8.00 pm',
            $date.' 22:30:00'         => '8.30 pm',
            $date.' 23:00:00'         => '9.00 pm',
            
            
            
        );
        $attribute = 'class="form-control time"';
    
    
    echo form_dropdown('start-time', $options, '6.00am',$attribute);
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<div class='form-group' style='margin-left:10px;'>";
        $options = array(
            '0'         => 'Number of slots',
            '1'         => '01',
            '2'         => '02',
            '3'         => '03',
            '4'         => '04',
            '5'         => '05',
            '6'         => '06',
            '7'         => '04',
            '8'         => '08',
            '9'         => '09',
            
            
        );
        $attribute = 'class="form-control slot"';
    
    
    echo form_dropdown('slot-count', $options, '0',$attribute);
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo form_submit('submit', 'Create', "class='btn btn-success btn-md' style='margin-left:10px;'");
        echo "</td>";
        echo form_close();
      echo "</tr>";
        echo "<td colspan='3'>test</td>";
        echo "<tr>";

      echo "</tr>";
      
    echo "</tbody>";
    echo "</table>";

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