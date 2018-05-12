<?php

if (!($this->session->userdata('lawyer_detail'))) {
   
    redirect('/user/login');
}
else{
 $lawyer_detail = $this->session->userdata('lawyer_detail'); 
 
}


?>


<!-- lawyer profile and resouce link -->
<?php $this->load->view('header'); ?>
<?php $this->load->view('top-navigation'); ?>
<br>
<div class="container">
<div class="row">
	<!-- Spacer -->
    
      <div class="col-md-6">
        	<!--  -->
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?php 
              echo $lawyer_detail['fname'] .' '. $lawyer_detail['lname'];
              ?>
              
              
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email Address:</td>
                        <td>
                        <?php 
                        echo $lawyer_detail['email']
                        ?>
                        </td>

                      </tr>
                      <tr>
                        <td>Provicial Area</td>
                        <td><?php 
                        echo $lawyer_detail['provincial-area']
                        ?></td>
                      </tr>
                      <tr>
                        <td>Admitted Bar</td>
                        <td><?php 
                        echo $lawyer_detail['admitted-bar']
                        ?></td>
                      </tr>
                      <tr>
                        <td>Specialty</td>
                        <td><?php 
                        echo $lawyer_detail['specialty']
                        ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Available Location</td>
                        <td><?php 
                        echo $lawyer_detail['location']
                        ?></td>
                      </tr>
                        <tr>
                        <td>Register Date</td>
                        <td><?php 
                        echo $lawyer_detail['register-date']
                        ?></td>
                      </tr>
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
          <!--  -->
      
      </div>
				





    <div class="col-md-6">
      <!--  -->
      <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Case Status</h3>
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>
                          <h3>Case Title</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum aliquet pretium. Sed ultrices, magna in pulvinar vestibulum, orci urna tristique ex, vitae suscipit magna mi quis lorem. Nulla facilisi. Donec molestie ac magna id sollicitudin. Sed id vulputate velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque condimentum vestibulum fringilla. Duis rutrum posuere fringilla. Nunc faucibus interdum porta.</p>
                        
                        </td>
                       
                      </tr>
                      <tr>
                        <td>
                          <h3>Case Title</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum aliquet pretium. Sed ultrices, magna in pulvinar vestibulum, orci urna tristique ex, vitae suscipit magna mi quis lorem. Nulla facilisi. Donec molestie ac magna id sollicitudin. Sed id vulputate velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque condimentum vestibulum fringilla. Duis rutrum posuere fringilla. Nunc faucibus interdum porta.</p>
                        
                        </td>
                       
                      </tr>
                      
                     
                   
                         
                        
                      
                        
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">See All</a>
                  <a href="#" class="btn btn-primary">Add New Case Title</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
          <!--  -->
    </div>

  </div>
  <div class="row">
  <div class="col-md-12">
      <!--  -->
      <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Your Booking Schedule</h3>
            </div>
            <div class="panel-body">
              <div class="row">
 

                <div class=" col-md-12 col-lg-12 "> 
                  <!--  -->
                  <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          07-05-2018
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
      <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>8.00 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                      <tr>
                        <td>8.30 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                      <tr>
                        <td>9.00 am</td>
                        <td><button class="btn btn-default disabled danger">Booked</button></td>
                      </tr>
                      <tr>
                        <td>9.30 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                    </tbody>
      </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          08-05-2018
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
      <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>8.00 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                      <tr>
                        <td>8.30 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                      <tr>
                        <td>9.00 am</td>
                        <td><button class="btn btn-default disabled danger">Booked</button></td>
                      </tr>
                      <tr>
                        <td>9.30 am</td>
                        <td><button class="btn btn-success">Available</button></td>
                      </tr>
                    </tbody>
      </table>
      </div>
    </div>
  </div>

</div>
                  <!--  -->
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
          <!--  -->
    </div>
  </div>
</div>




<?php $this->load->view('footer'); ?>