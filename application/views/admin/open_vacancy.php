
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" >
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'] ?>" height="150px" alt="" /></div>
              <div class="info">
               <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo " Admin :".$profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png')?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
              <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                   <li ><a href="<?php echo base_url('index.php/admin') ?>">My Profile</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-smile-o"></i><span>Supervisors</span></a>
                  <ul class="sub-menu">
                  <li ><a href="<?php echo base_url('index.php/admin/add_supervisor') ?>">Add New</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/edit_supervisor') ?>">Edit Existing</a></li>
                  </ul>
              </li>
        
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Requests</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url('index.php/admin/pending_internrequests') ?>">Pending Intern Requests</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/pending_fellowrequests') ?>">Pending Fellow Requests</a></li>

                  <li ><a href="<?php echo base_url('index.php/admin/ongoing_internrequests') ?>">Ongoing Intern Requests</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/ongoing_fellowrequests') ?>">Ongoing Fellow Requests</a></li>

                  <li ><a href="<?php echo base_url('index.php/admin/processed_internrequests') ?>">Processed Intern Requests</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/processed_fellowrequests') ?>">Processed Fellow Requests</a></li>
                </ul>
              </li>
     <li><a href="#"><i class="fa fa-table"></i><span>Applications</span></a>
                <ul class="sub-menu">
                  <li><a href="<?php echo base_url('index.php/admin/pending_internship_applications') ?>">Pending Internship Applications</a></li>
                  <li ><a href="<?php echo base_url('index.php/admin/pending_fellowship_applications') ?>">Pending Fellowship Applications</a></li>
                  <li ><a href="<?php echo base_url('index.php/admin/ongoing_internship_applications') ?>">Ongoing Internship Applications</a></li>
                  <li ><a href="<?php echo base_url('index.php/admin/ongoing_fellowship_applications') ?>">Ongoing Fellowship Applications</a></li>
                  <li ><a href="<?php echo base_url('index.php/admin/processed_internship_applications') ?>">Processed Internship Applications</a></li>
                  <li ><a href="<?php echo base_url('index.php/admin/processed_fellowship_applications') ?>">Processed Fellowship Applications</a></li>

                   </ul>
              </li>
              
            

              <li><a href="#"><i class="fa fa-folder"></i><span>Contracts</span></a>
                <ul class="sub-menu">
           <li ><a href="<?php echo base_url('index.php/admin/new_contract') ?>">New Contract</a></li>
           <li ><a href="<?php echo base_url('index.php/admin/renew_contract') ?>">Renew Contracts</a></li>
                  </ul>
              </li>
              
              <li><a href="#"><i class="fa fa-folder"></i><span>Student Clearance</span></a>
                <ul class="sub-menu">
           <li ><a href="<?php echo base_url('index.php/admin/clear_student') ?>">Clear Student</a></li>
                  </ul></li>
      <li><a href="#"><i class="fa  fa-bar-chart-o"></i><span>Reports</span></a>
                <ul class="sub-menu">
                  
                  <li><a href="<?php echo base_url('index.php/admin/application_charts') ?>"><span>Applications</span></a></li>
                  <li><a href="<?php echo base_url('index.php/admin/generate_contract') ?>">Contracts</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/request_charts') ?>">Requests</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/intern_demographics') ?>">Interns Demographics</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/fellow_demographics') ?>">Fellow Demographics</a></li>
                  </ul>
              </li>
               
               <li><a href="#"><i class="fa fa-hdd-o"></i><span>Alumni Data</span></a>
                <ul class="sub-menu">
                  <li><a href="<?php echo base_url('index.php/admin/alumni_interns') ?>">Interns </a></li>
                  <li><a href="<?php echo base_url('index.php/admin/alumni_fellows') ?>">Fellows</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>
        <div class="container-fluid" id="pcont">
      <div class="cl-mcont">
      
        
        <div class="row">
        <div class="col-md-12">
          <h3 class="widget-title">Open Vacancy</h3>
                <div class="row">


          <form role="form" class="form-horizontal"<?php echo form_open('admin/openvacancy/'.$this->session->userdata('id')); ?>
                       <?php if(strlen($success['0'])>0){
                ?>

               <div class="alert alert-success alert-white rounded">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-check"></i></div>
                
                <strong style="margin-left:50px"> &nbsp;&nbsp;Success!</strong>A New Vacancy Has Been Placed!
               </div>

               <?php
                }
                ?>
                     <?php if(strlen($error['0'])>0){
                ?>

               <div class="alert alert-danger alert-white rounded">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-times"></i></div>
                
                <strong style="margin-left:50px"> &nbsp;&nbsp;Error!</strong>A vacancy for this request already exists!
               </div>

               <?php
                }
                ?>
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="vacancy_title">Vacancy Title</label>
                    <div class="col-sm-5">
                      <input type="text" placeholder="Vacancy Title" id="vacancy_title" value="<?php  echo set_value('vacancy_title');?>"
                      name="vacancy_title" class="form-control">
                             <div style="color:#DF0D8A" id="vacancy_title-error"> <?php echo form_error('vacancy_title'); ?></div>
        
                    </div>
                       </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="position_startdate">Position Start Date</label>
                    <div class="col-sm-9">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo set_value('position_startdate'); ?>"  size="16" name="position_startdate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                    <div style="color:#DF0D8A" id="position_startdate-error"> <?php echo form_error('position_startdate'); ?></div>
                
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="position_enddate">Position End Date</label>
                    <div class="col-sm-9">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo set_value('position_enddate'); ?>"  size="16" name="position_enddate"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>          
                <div  style="color:#DF0D8A"  id="position_enddate-error"> <?php echo form_error('position_enddate'); ?></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="application_deadline">Application Deadline</label>
                    <div class="col-sm-9">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control"   value="<?php echo set_value('application_deadline'); ?>"  size="16" name="application_deadline"type="text" value="" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                  <div style="color:#DF0D8A" id="application_deadline-error"> <?php echo form_error('application_deadline'); ?></div>
                
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="vacancy_description">Vacancy Description</label>
                    <div class="col-sm-5">
                      <textarea  name ="vacancy_description" id="vacancy_description" class="form-control">
                      <?php echo set_value('vacancy_description'); ?>
                        
                      </textarea> 
                           <div style="color:#DF0D8A" id="vacancy_description-error"> <?php echo form_error('vacancy_description'); ?></div>
            
                    </div>
                   
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Open Vacancy</button>
                      
                    </div>
                  </div>
         </form>
                </div>
              </div>
              </div>
                </body>

</html>