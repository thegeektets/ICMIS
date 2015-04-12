
<body>


	<div id="cl-wrapper" class="fixed-menu">
		<div class="cl-sidebar" data-position="right">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="<?php echo $profile['0']['user_avatar'];?>"  height = "150px"alt="" /></div>
              <div class="info">
               <a href="#"><?php if (strlen($profile['0']['username']) > 1 ){echo  "Student : ". $profile['0']['username'] ;} ?></a>
                <img src="<?php echo base_url('/assets/images/state_online.png');?>" alt="Status" /> <span>Online</span>
              </div>
            </div>
            <ul class="cl-vnavigation">
             <li><a href="#"><i class="fa fa-home"></i><span>Profile</span></a>
                <ul class="sub-menu">
                  <li ><a href="<?php echo base_url("index.php/student");?>">My Profile</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Vacancies</span></a>
                <ul class="sub-menu">
                       <li ><a href="<?php echo base_url('index.php/student/internshipvacancies')?>">Internship Vacancies</a></li>
                       <li ><a href="<?php echo base_url('index.php/student/fellowshipvacancies')?>">Fellowship Vacancies</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Projects</span></a>
                <ul class="sub-menu">
                <li><a href="<?php echo base_url("index.php/student/projects");?>">Project Details</a></li>
                    </ul>
              </li>              

                   <li><a href="#"><i class="fa fa-file"></i><span>Reports</span></a>
                <ul class="sub-menu">
                  <li class="active"><a href="<?php echo base_url("index.php/student/project_reports");?>">Projects</a></li>
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
          <div class="col-sm-12 block-flat">
        
                <div class="row"> 

                    <div class="col-sm-5"></div>
                    <div class="col-sm-3" style="margin:auto;"> <a href="#"> 
                      <img src="<?php echo base_url('assets/images/contract_logo.jpg');?>" height="150px" width="150px"/> </a> </div> 
                    <div class="col-sm-4"></div>

                </div>

                     <hr class="margin" />
             
   <div class="invoice"> <div class="row"> 
 
   <div class="row" style="margin:auto;padding-left:40%;padding-bottom:40px;"> 
    <div class="col-sm-12 invoice-left" style= "padding-left:50px"> <h4>Project</h4>
      <?php print "Project Name : ".$project['0']['project_name'] ; ?>     
  <br />
      <?php echo "Project Category : ".$project['0']['project_category'] ; ?>     
  <br />
      <?php echo "Project Description : ".$project['0']['project_description'] ; ?>     
 
 </div>
 </div>
  <div class="margin"></div> 

  <table class="table table-bordered" style="padding-top:60px">
   <thead> 
    <tr> <th class="text-center">#</th> 
      <th>Start Date</th> <th>End Date</th> <th>Tasks</th> </tr> 
  </thead>
    <tbody> 
          <?php 
               
                   for ($i=0;$i<count($projecttasks);$i++){
                   ?>
                      
         <tr> 
        <td class="text-center"><?php echo ($i + 1) ;?></td> 
        <td><?php echo $projecttasks[$i]['s_date'] ;?></td> 
        <td><?php echo $projecttasks[$i]['e_date'] ;?></td>
        <td class="text-right"><?php echo $projecttasks[$i]['tasks'] ;?></td>
         </tr>
         <?php }
                    ?>

    </tbody>
  </table> 
  <a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
  Print Report
  <i class="entypo-doc-text"></i> </a>
  &nbsp; </div> </div> </div> </div>
              </div>
              </div>
              </div>
              </body>

</html>