<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-12">
    

                    
                    
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

                       
                                //print_r($result_all_question);
                                if($result_all_question == 'empty'){
                                    echo "No question found. Be the first to add a question";
                                }else{
                                    //print_r($result_all_question);
                                    echo "<table class='table table-striped table-hover'>";
                                    echo "<tbody>";

                                    foreach($result_all_question as $question){
                                    
                                        
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<h4 class='text-capitalize'>";
                                                    echo "<a href='" . base_url('/user/showSingleQuestion/'. $question->forum_id) ."' style='color:#4286f4;'>";
                                                    echo $question->forum_title;
                                                    echo "</a>";
                                                echo "</h4>";
                                                echo "<p>";
                                                
                                                    //echo $question->forum_description;
                                                    if(strlen($question->forum_description)>400){
                                                        $pos=strpos($question->forum_description, ' ', 400);
                                                        echo substr($question->forum_description,0,$pos );
                                                        echo "...";
                                                    }else{
                                                        echo $question->forum_description;
                                                    }

                                                echo "</p>";
                                                echo "<p class='pull-right'>";
                                                    //echo 'asked on ' .  $question->forum_added_date;
                                                    echo  'asked on ' . date('l jS \of F Y', strtotime( $question->forum_added_date)).'<br>';
                                                    echo 'posted by ' . $question->post_owner;
                                                echo "</p>";

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
    
   

<?php $this->load->view('footer'); ?>
   