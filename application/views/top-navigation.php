<!-- This is general navigation comming on top of the page -->
<div class="container">
            <div class="top-bar">
                <div class="row">
                    <div class="col-md-7 hidden-xs hidden-sm">
                        <span><i class="glyphicon glyphicon-phone"></i> +1 324 567 8910</span>
                    </div>
                    <div class="col-md-5 text-right">
                        <div class="top-bar-right">
                            <a class='appointment' id="appointment" href="<?php echo base_url('/user/search') ?>">make an appointment </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt=""></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html">What we do</a></li>
                                <li><a href="about.html">Our Hisrory</a></li>
                                <li><a href="about.html">Our Leadership</a></li>
                                <li><a href="about.html">Press about us</a></li>

                            </ul>
                        </li>
                        <li><a href="team.html">Our Team</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="services.html">Cancer Center</a></li>
                                <li><a href="services.html">Rehabilitation Center</a></li>
                                <li><a href="services.html">Gastro Labs</a></li>
                                <li><a href="services.html">Emergency Room</a></li>

                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('/user/showForum') ?>">Forum</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="<?php echo base_url('/user/register') ?>">Join</a></li>
                        <?php 
                            //print_r($this->session->userdata['lawyer_detail']);
                            if(isset($this->session->userdata['lawyer_detail'])){
                                echo "<li><a href='";
                                echo base_url('/user/logout/lawyer');
                                echo "'>log out</a></li>";
                            }
                            elseif(isset($this->session->userdata['client_detail'])){
                                echo "<li><a href='";
                                echo base_url('/user/logout/client');
                                echo "'>log out</a></li>";
                            }
                            else{
                                echo "<li><a href='";
                                echo base_url('/user/login');
                                echo "'>log in</a></li>";
                            }
                        ?>
                        <?php 
                            if(isset($this->session->userdata['lawyer_detail'])){
                                echo "<li><a href='";
                                echo base_url('/user/lawyerDashBoard');
                                echo "'>";
                                echo "<span class='label label-default' style='font-size:14px'> My Dashboard</span>";
                               
                                echo "</a></li>";
                            }
                            elseif(isset($this->session->userdata['client_detail'])){
                                echo "<li><a style='padding-left: 5px; padding-right: 5px;' href='";
                                echo base_url('/user/clientDashBoard');
                                echo "'>";
                                echo "<span class='label label-default' style='font-size:14px;'> My Dashboard</span>";
                               
                                echo "</a></li>";
                            }
                        ?>
                        <li><a style="padding-left: 5px; padding-right: 5px;" href="<?php echo base_url('/user/createQuestion') ?>"><span class="label label-primary " style="font-size:14px"> Ask Question </span></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
