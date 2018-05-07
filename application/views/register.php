<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8">
    

        <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Client Registration</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Lawyer Registration</a></li>
                           
                            
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Client Basic Information</h3>
            </div>
                    <div class="panel-body">
                    <?php

                        echo form_open('user/clientRegistration');   

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
                        <div class="tab-pane fade" id="tab2default">
                        
                        <div class="panel-heading">
                        <h3 class="panel-title">Lawyer Basic Information</h3>
            </div>
                    <div class="panel-body">
                    <?php

                    echo form_open('user/lawyerRegistration');   

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
                            'class' => 'form-control',
                            'placeholder' => 'Admitted Bar'
                            );
                            echo form_input($data);
                        echo "</div>";
                        echo "<div class='form-group'>";
                        $data = array(
                            'type' => 'text',
                            'name' => 'specialty',
                            'class' => 'form-control',
                            'placeholder' => 'Specialty Area / Practice Area'
                            );
                            echo form_input($data);
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
   