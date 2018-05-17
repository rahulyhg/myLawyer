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
                                if($result_single_question == 'empty'){
                                    echo "This question not found. Please try again";
                                }else{
                                    //print_r($result_all_question);
                                    echo "<table class='table table-striped table-hover'>";
                                    echo "<tbody>";

                                    foreach($result_single_question as $question){
                                    
                                        
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<h4 class='text-capitalize'>";
                                                    
                                                    echo $question->forum_title;
                                                    
                                                echo "</h4>";
                                                echo "<p>";
                                                
                                                    //echo $question->forum_description;
                                                    
                                                        echo $question->forum_description;
                                                echo "</p>";
                                                echo "<p class='pull-right'>";
                                                    //echo 'asked on ' .  $question->forum_added_date;
                                                    echo  'asked on ' . date('l jS \of F Y h:i:s A', strtotime( $question->forum_added_date)).'<br>';
                                                    //echo 'posted by ' . $question->post_owner;
                                                echo "</p>";

                                            echo "</td>";
                                            

                                        echo "</tr>";
                                        if($result_answers == 'empty'){
                                            echo "<tr><td class='info text-center'>";
                                            echo "Your will be the first person to answer this question";
                                            echo "</td></tr>";
                                        }else{
                                            foreach($result_answers as $answer){
                                                echo "<tr>";
                                                    echo "<td class='warning'>";
                                                    echo '<p>' . $answer->answer_description . '</p>';
                                                    echo "<p class='pull-right'>";
                                                        //echo 'asked on ' .  $question->forum_added_date;
                                                        echo  'answered on ' . date('l jS \of F Y h:i:s A', strtotime( $answer->answer_added_date)).'<br>';
                                                        echo 'answered by ' . $answer->answer_owner;
                                                    echo "</p>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        
                                        echo "<tr>";
                                            echo "<td>";

                                            

                                            echo form_open('user/answerQuestion'); 
                                            
                                            $data = array(
                                                'type' => 'hidden',
                                                'name' => 'forum-id',
                                                'class' => 'form-control',
                                                'value' => $forum_id
                                                );
                                                echo form_input($data);

                                            echo "<div class='form-group'>";
                                            $data = array(
                                                'cols' => '10',
                                                'rows' => '5',
                                                'name' => 'answer',
                                                'class' => 'form-control',
                                                'placeholder' => 'Add your answer here'
                                                );
                                                echo form_textarea($data);
                                            echo "</div>";
                                            echo form_submit('submit', 'Submit Your Answer', "class='btn btn-success btn-md btn-block'");
                                            echo form_close();
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
   