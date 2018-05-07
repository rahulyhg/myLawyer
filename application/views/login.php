<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8">
    

        <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Client Login</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Lawyer Login</a></li>
                           
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Client Sign In</h3>
            </div>
                    <div class="panel-body">
                    <?php

                        echo form_open('user/clientLogin');   

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
                        <div class="tab-pane fade" id="tab2default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Lawyer Sign In</h3>
            </div>
                    <div class="panel-body">
                    <?php

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
   