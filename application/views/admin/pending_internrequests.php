
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
                  <li class="active"><a href="<?php echo base_url('index.php/admin/pending_internrequests') ?>">Pending Intern Requests</a></li>
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
          <div class="block-flat">
            <div class="header">              
              <h3 style="font-weight:300;color:#7C3886">PENDING INTERN REQUESTS </h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable-icons" >
                  <thead>
                    <tr style="background:#70871B;color:#fff;">
                      <th>Request User</th>
                      <th>Request Email</th>
                      <th>Bugdet Holder</th>
                      <th>Bugdet Holder Email</th>
                      <th>SD/Unit</th>
                      <th>Cost Center</th>
                      <th>Internship Purpose</th>
                      <th>Number of Interns</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Request Date</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  
                  for ($i=0;$i<count($request);$i++){
                   ?>
                                      <tr class="gradeX">
                      <td><?php echo $request[$i]['username']  ;?></td>
                      <td><?php echo $request[$i]['useremail'] ;?></td>
                      <td><?php echo $request[$i]['budget_holder'] ;?></td>
                      <td><?php echo $request[$i]['email_budget_holder'] ;?></td>
                      <td><?php echo $request[$i]['sd_unit'] ;?></td>
                      <td><?php echo $request[$i]['cost_center'] ;?></td>
                      <td><?php echo $request[$i]['researchtitle_purposeinternship'] ;?></td>
                      <td><?php echo $request[$i]['number_students'] ;?></td>
                      <td><?php echo $request[$i]['start_date'] ;?></td>
                      <td><?php echo $request[$i]['end_date'] ;?></td>
                      <td><?php echo $request[$i]['request_date'] ;?></td>
                        <td class="center">
                        <a class="btn btn-default btn-xs" href="<?php echo base_url('index.php/admin/openvacancy/').'/'.$request[$i]['request_id'];?>" id="open_vacancy" data-original-title="Open Vacancy" data-toggle="tooltip"><i style="color:#BAD532;" class="fa fa-file"></i></a> 
                      </td>
                    </tr>
                    <?php }
                    ?>
                      </tbody>
                </table>              
              </div>
            </div>
          </div>        
        </div>
      </div>
          
          

      </div>

  </div>
  </div>
  	
  </div> 
  	
  </div>
  <!-- Scripts 
  ==================================================================================-->
    
  	<script src="<?php echo base_url("/assets/js/jquery.js")?>"></script>
    
  </body>

</html>