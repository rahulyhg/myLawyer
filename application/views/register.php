<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8">
    

        <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            
                            <?php
                            if(isset($user_type) && $user_type =='lawyer'){
                                echo "<li><a href='#tab1default' data-toggle='tab'>Client Registration</a></li>";
                                echo "<li class='active'><a href='#tab2default' data-toggle='tab'>Legal Professional Registration</a></li>";
                            }
                            else{
                                echo "<li class='active'><a href='#tab1default' data-toggle='tab'>Client Registration</a></li>";
                                echo "<li><a href='#tab2default' data-toggle='tab'>Legal Professional Registration</a></li>";
                            }
                            
                            ?>
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                    <?php
                        if(isset($user_type) && $user_type =='lawyer'){
                            echo "<div class='tab-pane fade' id='tab1default'>";
                        }
                        else{
                            echo "<div class='tab-pane fade in active' id='tab1default'>";
                        }
                        ?>
                       
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Client Basic Information</h3>
            </div>
                    <div class="panel-body">
                    <?php

                        echo form_open('user/clientRegistration');   
                        if((form_error('fname') || form_error('lname') || form_error('email') || form_error('password')) && isset($user_type) && $user_type =='client' ){
                            echo '<div class="alert alert-danger" role="alert">';
                                echo form_error('fname');
                                echo form_error('lname');
                                echo form_error('email');
                                echo form_error('password');
                                echo form_error('admitted-bar');
                                echo form_error('specialty');
                                echo form_error('location');
                            echo '</div>';
                            }
                            if(isset($user_type) && $user_type =='client'){
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
                            }
                        echo "<fieldset>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'text',
                                'name' => 'fname',
                                'class' => 'form-control',
                                'placeholder' => 'First Name'
                                );
                                echo form_input($data);
                            echo "</div>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'text',
                                'name' => 'lname',
                                'class' => 'form-control',
                                'placeholder' => 'Last Name'
                                );
                                echo form_input($data);
                            echo "</div>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'email',
                                'name' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'Valid Email Address'
                                );
                                echo form_input($data);
                            echo "</div>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'password',
                                'name' => 'password',
                                'class' => 'form-control',
                                'placeholder' => 'Password'
                                );
                                echo form_input($data);
                            echo "</div>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'tel',
                                'name' => 'contact',
                                'class' => 'form-control',
                                'placeholder' => 'Contact Number'
                                );
                                echo form_input($data);
                            echo "</div>";



                            
                        echo "</fieldset>";
                        echo form_submit('submit', 'Register Now', "class='btn btn-success btn-md btn-block'");
                        echo form_close();
                        
                        ?>



                    </div>
                        
                        
                        
                        </div>
                        <?php
                        if(isset($user_type) && $user_type =='lawyer'){
                            echo "<div class='tab-pane fade in active' id='tab2default'>";
                        }
                        else{
                            echo "<div class='tab-pane fade' id='tab2default'>";
                        }
                        ?>
                       
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Lawyer Basic Information</h3>
                        
            </div>
                    <div class="panel-body">
                    <?php

                    echo form_open('user/lawyerRegistration');   
                    if(form_error('fname') || form_error('lname') || form_error('email') || form_error('password')|| form_error('admitted-bar')|| form_error('specialty')|| form_error('location') && isset($user_type) && $user_type =='lawyer'){
                        echo '<div class="alert alert-danger" role="alert">';
                            echo form_error('fname');
                            echo form_error('lname');
                            echo form_error('email');
                            echo form_error('password');
                            echo form_error('admitted-bar');
                            echo form_error('specialty');
                            echo form_error('location');
                        echo '</div>';
                        }
                        if(isset($user_type) && $user_type =='lawyer'){
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
                        }
                        
                    echo "<fieldset>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'fname',
                            'class' => 'form-control',
                            'placeholder' => 'First Name'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'lname',
                            'class' => 'form-control',
                            'placeholder' => 'Last Name'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'email',
                            'name' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'Valid Email Address'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'password',
                            'name' => 'password',
                            'class' => 'form-control',
                            'placeholder' => 'Password'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $options = array(
                            '0'         => 'Legal Professional',
                            'lawyer'         => 'Lawyer',
                            'sworn-translator'  => 'Sworn Translator',
                            'lawyer-sworn-translator' => 'Lawyer and Sworn Translator',
                            'notary'  => 'Notary',
                            'family-counselor' => 'Family Counselor'
                           
                            
                        );
                        $attribute = 'class="form-control legal-professional"';


                    echo form_dropdown('legal-professional', $options, '0',$attribute);
                        echo "</div>";



                        echo "<div class='form-group'>";
                        $options = array(
                            'western'         => 'Western Province',
                            'northern'         => 'Northern Province',
                            'north-Western'         => 'North Western Province',
                            'north-Central'         => 'North Central Province',
                            'central'         => 'Central Province',
                            'sabaragamuwa'         => 'Sabaragamuwa Province',
                            'eastern'         => 'Eastern Province',
                            'uva'         => 'Uva Province',
                            'southern'         => 'Southern Province',
                            
                        );
                        $attribute = 'class="form-control"';


                    echo form_dropdown('provincial-area', $options, 'western',$attribute);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'admitted-bar',
                            'class' => 'form-control admitted-bar',
                            'style' => 'display:none',
                            'placeholder' => 'Admitted Bar'
                            
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $options = array(
                            ' '         => 'Specialty',
                            'divorce'         => 'Divorce',
                            'immigration'         => 'Immigration',
                            'accident-personal'         => 'Acceident & Personal Inqury',
                            'business-corporate'         => 'Business and Corporate',
                            'family'         => 'Family',
                            'criminal'         => 'Criminal',
                            'bankruptcy-employment'         => 'Bankruptcy and Employment',
                            
                        );
                        $attribute = 'class="form-control specialty" style="display:none;"';


                    echo form_dropdown('specialty', $options, ' ',$attribute);

                        
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'location',
                            'class' => 'form-control',
                            'placeholder' => 'Available Location'
                            );
                            echo form_input($data);
                        echo "</div>";
                    echo "</fieldset>";
                    echo form_submit('submit', 'Register Now', "class='btn btn-success btn-md btn-block'");
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
   <script>
   

$(document).ready(function(){

    $('.legal-professional').change(function(){
        
        if(this.value == 'lawyer' || this.value == 'lawyer-sworn-translator'){
            
            $('.admitted-bar').show();
            $('.specialty').show();
        }
        else{
            $('.admitted-bar').hide();
            $('.specialty').hide(); 
        }
       
    })
});

   </script>