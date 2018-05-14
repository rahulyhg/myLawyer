<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8">
    

        <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">                          
                            <li  class="active"><a href="#tab2default" data-toggle="tab">Case brief</a></li>
                        </ul>
                </div>
               
                        
                        <div class="tab-pane fade in active" id="tab2default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Add your latest work</h3>
                        
                        </div>
                    <div class="panel-body">
                    <?php

                    echo form_open('user/createCaseBrief');   
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
                    echo "<fieldset>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'case-title',
                            'class' => 'form-control',
                            'placeholder' => 'Title'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'cols' => '10',
                            'rows' => '5',
                            'name' => 'case-description',
                            'class' => 'form-control',
                            'placeholder' => 'Description'
                            );
                            echo form_textarea($data);
                        echo "</div>";
                        
                       
                    echo "</fieldset>";
                    echo form_submit('submit', 'Add This Case', "class='btn btn-success btn-md btn-block'");
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
   