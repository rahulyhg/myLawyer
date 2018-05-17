<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8">
    

        <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">                          
                            <li  class="active"><a href="#tab2default" data-toggle="tab">Client form for sworn translators</a></li>
                        </ul>
                </div>
               
                        
                        <div class="tab-pane fade in active" id="tab2default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">You are required to submit accurate details</h3>
                        
                        </div>
                    <div class="panel-body">
                    <?php

                    echo form_open('user/createMoreInfo');   
                    if(form_error('case-title') || form_error('case-description') ){
                        echo '<div class="alert alert-danger" role="alert">';
                            echo form_error('case-title');
                            echo form_error('case-description');
                            
                        echo '</div>';
                        }
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


                            $data = array(
                                'type' => 'text',
                                'name' => 'schedule-id',
                                'class' => 'form-control',
                                'value' => $schedule_id
                                );
                                echo form_input($data);

                    echo "<fieldset>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'birth-place',
                            'class' => 'form-control',
                            'placeholder' => 'Birth Place'
                            );
                            echo form_input($data);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'father-name',
                            'class' => 'form-control',
                            'placeholder' => 'Fathers Name'
                            );
                            echo form_input($data);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'mother-name',
                            'class' => 'form-control',
                            'placeholder' => 'Mothers Name'
                            );
                            echo form_input($data);
                        echo "</div>";

                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'father-profession',
                            'class' => 'form-control',
                            'placeholder' => 'Fathers Profession'
                            );
                            echo form_input($data);
                        echo "</div>";

                        
                        
                       
                    echo "</fieldset>";
                    echo form_submit('submit', 'Submit The Document', "class='btn btn-success btn-md btn-block'");
                    echo form_close();

                    ?>
                    </div>
                        
                        
                        </div>
                       
                        
                    </div>
                </div>
            </div>



            
        </div>
    </div>
</div>
    
   

<?php $this->load->view('footer'); ?>
   