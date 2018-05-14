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
                                echo "<li><a href='#tab1default' data-toggle='tab'>Client Login</a></li>";
                                echo "<li class='active'><a href='#tab2default' data-toggle='tab'>Lawyer Login</a></li>";
                            }
                            else{
                                echo "<li class='active'><a href='#tab1default' data-toggle='tab'>Client Login</a></li>";
                                echo "<li><a href='#tab2default' data-toggle='tab'>Lawyer Login</a></li>";
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
                        <h3 class="panel-title">Client Sign In</h3>
            </div>
                    <div class="panel-body">
                    <?php

                        echo form_open('user/clientLogin');   
                        if(form_error('email') || form_error('password') ){
                            echo '<div class="alert alert-danger" role="alert">';
                                echo form_error('email');
                                echo form_error('password');

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
                                'type' => 'email',
                                'name' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'E-mail'
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
                        echo "</fieldset>";
                        echo form_submit('submit', 'Login', "class='btn btn-success btn-md btn-block'");
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
                        <h3 class="panel-title">Lawyer Sign In</h3>
            </div>
                    <div class="panel-body">
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



                        echo form_open('user/lawyerLogin');   

                        echo "<fieldset>";
                            echo "<div class='form-group'>";
                            $data = array(
                                'type' => 'email',
                                'name' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'E-mail'
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
                        echo "</fieldset>";
                        echo form_submit('submit', 'Login', "class='btn btn-success btn-md btn-block'");
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
   