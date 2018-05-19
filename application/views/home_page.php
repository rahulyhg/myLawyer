<?php $this->load->view('header'); ?>
    <body>
    <?php $this->load->view('top-navigation'); ?>
        
        <!-- bootstrap carousel -->

			<div id="carousel-header" class="carousel slide" data-ride="carousel" data-interval="5000"> 
  			<!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-header" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-header" data-slide-to="1"></li>
                  <li data-target="#carousel-header" data-slide-to="2"></li>
                </ol>
  
  				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
    				<div class="item active"> 
                    	<img src="<?php echo  base_url('/assets/img/slider/slide1.jpg');?>" alt="...">
      					<div class="carousel-caption"> <span class="second-head">Easy</span> legal professional booking. 
                        </div>
    				</div>
                    <div class="item"> 
                        <img src="<?php echo  base_url('/assets/img/slider/slide2.jpg');?>" alt="...">
                        <div class="carousel-caption"> <span class="second-head">Proper</span> guideline. !
                        </div>
                    </div>
                    <div class="item"> 
                    	<img src="<?php echo  base_url('/assets/img/slider/slide3.jpg');?>" alt="...">
                        <div class="carousel-caption"> <span class="second-head">Platform</span> to discuss your problems!
                        </div>
                    </div>
  				</div>
  			
            <!-- Controls --> 
             
                <a class="left carousel-control" href="#carousel-header" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-header" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            
			
			</div>
			<!-- end bootstrap carousel --> 

        <div class="divide70"></div>
        <div class="container">
            <div class="row center-title">
                <div class="col-md-8 col-md-offset-2 clearfix text-center wow animated fadeInUp">
                    <h2>My legal professionals</h2>
                    <p>
                    The system "My legal professionals" mainly helps the Client in searching of Legal Professionals  based on his specialty area, 
                    provincial area, admitted bar as well as by looking at the latest performance of a particular Legal Professionals, 
                    where the system helps the Client to search a Legal Professionals relevant to the legal claim as the individuals are
                     lack of experience and expertise from legal aspects to make judgments
                    </p>
                    <!--                   -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 margin30">
                    <div class="service-box wow animated fadeIn" data-wow-delay="0.1s">
                        <i class="glyphicon glyphicon-scale"></i>
                        <h4>Legal Professional Booking</h4>
                        <p>
                        Make a booking to meet a legal professional at your preference. 
                        </p>
                    </div>
                </div><!--service column-->
                <div class="col-sm-6 col-md-3 margin30">
                    <div class="service-box wow animated fadeIn" data-wow-delay="0.2s">
                        <i class="glyphicon glyphicon-user"></i>
                        <h4>Forum</h4>
                        <p>
                        Share your knowledge on legal matter   with experts. 
                        </p>
                    </div>
                </div><!--service column-->
                <div class="col-sm-6 col-md-3 margin30">
                    <div class="service-box wow animated fadeIn" data-wow-delay="0.3s">
                        <i class="glyphicon glyphicon-leaf"></i>
                        <h4>Data for Sworn Translator</h4>
                        <p>
                        Send details for documents to sworn translator before you visit. 
                        </p>
                    </div>
                </div><!--service column-->
                <div class="col-sm-6 col-md-3 margin30">
                    <div class="service-box wow animated fadeIn" data-wow-delay="0.4s">
                        <i class="glyphicon glyphicon-earphone"></i>
                        <h4>Tips to Select Lawyer</h4>
                        <p>
                        Find lawyer specializations for the legal issue you meet with. 
                        </p>
                    </div>
                </div><!--service column-->
            </div>
            <div class="divide20"></div>
            <div class="text-center">
                <!-- <a href="#" class="btn btn-lg btn-theme-bg">More about our Services <i class="glyphicon glyphicon-circle-arrow-right"></i></a> -->
            </div>
        </div>
        <div class="divide60"></div>

        <!-- <div class="team-section">
            <div class="container"> -->
                <!-- <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="center-title">
                            <i class="glyphicon glyphicon-education"></i>
                            <h2>Meet our <strong>Specialists</strong></h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-sm-6 col-sm-3 margin30"> -->
                        <!-- <div class="team-col wow animated fadeInLeft" data-wow-delay="0.1s">
                            <a href="#"><img src="<?php //echo  base_url('/assets/img/medical/team-1.jpg');?>" class="img-responsive" alt=""></a>
                            <div class="divide20"></div>
                            <h3>Dr. Lorem</h3>
                            <em>Gastro Specialist</em>
                            <div class="divide20"></div>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="social-icon social-icon-sm social-ico-border-round social-ico-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>team col -->
                    <!-- </div>col-md-3 col-sm-6  -->
                    <!-- <div class="col-sm-6 col-sm-3 margin30"> -->
                        <!-- <div class="team-col wow animated fadeInLeft" data-wow-delay="0.2s">
                            <a href="#"><img src="<?php echo  base_url('/assets/img/medical/team-3.jpg');?>" class="img-responsive" alt=""></a>
                            <div class="divide20"></div>
                            <h3>Dr. Ipsum</h3>
                            <em>Cancer Specialist</em>
                            <div class="divide20"></div>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="social-icon social-icon-sm social-ico-border-round social-ico-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>team col -->
                    <!-- </div>col-md-3 col-sm-6 -->
                    <!-- <div class="col-sm-6 col-sm-3 margin30"> -->
                        <!-- <div class="team-col wow animated fadeInLeft" data-wow-delay="0.3s">
                            <a href="#"><img src="<?php //echo  base_url('/assets/img/medical/team-2.jpg');?>" class="img-responsive" alt=""></a>
                            <div class="divide20"></div>
                            <h3>Dr. Dallar</h3>
                            <em>Dental Specialist</em>
                            <div class="divide20"></div>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="social-icon social-icon-sm social-ico-border-round social-ico-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>team col -->
                    <!-- </div>col-md-3 col-sm-6 -->
                    <!-- <div class="col-sm-6 col-sm-3 margin30"> -->
                        <!-- <div class="team-col wow animated fadeInLeft" data-wow-delay="0.4s">
                            <a href="#"><img src="<?php //echo  base_url('/assets/img/medical/team-4.jpg');?>" class="img-responsive" alt=""></a>
                            <div class="divide20"></div>
                            <h3>Dr. Inpost</h3>
                            <em>Diet Specialist</em>
                            <div class="divide20"></div>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="social-icon social-icon-sm social-ico-border-round social-ico-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-icon social-icon-sm  social-ico-border-round social-ico-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>team col -->
                    <!-- </div>col-md-3 col-sm-6 -->
                <!-- </div>
            </div>
        </div>team section end -->


        
        <!--know more section end-->


       
        <!--testimonials end-->
        
        <!-- <div class="ads-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <h3>We offer full medical exam !!!</h3>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#" class="btn btn-white-border btn-lg">Make an appointment</a>
                    </div>
                </div>
            </div>
        </div> -->

        
       

        <?php $this->load->view('footer'); ?>