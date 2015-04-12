
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
                  <li><a href="<?php echo base_url('index.php/admin/add_supervisor') ?>">Add New</a></li>
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
                  <li class="active" ><a href="<?php echo base_url('index.php/admin/intern_demographics') ?>">Interns Demographics</a></li>
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

 
<body>

		<div class="container">
			  
  <div class="cl-mcont">
  			  
	<div class="row">
        <div class="col-sm-12 block-flat">
          
             <div  class="col-sm-12" style="display:block;" >

              <div class="header" style="width:100%;padding-top:15px;">
              <h3 style = "text-align:center">Male Interns Distribution Per SD/Unit</h3>
            </div>

            <div style="width: 60%;background:#f2f2f2;display:block;float:left;padding:15px;">
            <div id="canvas-holder">
            <canvas id="chart-area" width="300" height="300" style="padding:20px"/>
            </div>

            </div>
            <div  style="width: 40% ; float:right;display:block;padding:15px;">
              <h4 style="text-align:center">Legend </h4>
              <hr/>
              <div id="legend"></div>
              </div>
             
           
          </div>    
          
          

          
             <div  class="col-sm-12"  style="display:block;" >
              <div class="header" style="width:100%;padding:15px">
              <h3 style = "text-align:center">Female Interns Distribution Per SD/Unit</h3>
            </div>

            <div style="width: 60%;background:#f2f2f2;display:block;float:left;padding-top:15px;">
            <div id="canvas-holder">
            <canvas id="chart-area_f" width="300" height="300" style="padding:20px"/>
            </div>

            </div>
            <div  style="width: 40% ; float:right;display:block;padding:15px;">
              <h4 style="text-align:center">Legend </h4>
              <hr/>
            <div id="legend_f"></div>
            </div>
             
           
          </div>    
          
          <div class="col-sm-12">
          <a class="btn btn-primary pull-right" onclick="javascript:window.print();">
          <i class="icon-print"></i> Print Report </a>
          </div>
          

      </div>

     

   </div>
  </div>
</div> 



  <!-- Scripts 
  ==================================================================================-->
    <script src="<?php echo base_url("/assets/src/Chart.js")?>"></script>
    <script src="<?php echo base_url("/assets/src/legend.js")?>"></script>
    <script src="<?php echo base_url("/assets/js/jquery.js")?>"></script>
                
       <script type="text/javascript">
      <?php 
      $colors = ['color:"rgba(186,213,50,2)",highlight: "rgba(186,213,50,0.8)','color: "rgba(124,56,134,2)",
          highlight: "rgba(124,56,134,.8)",','color: "#5AD3D1", highlight: "#5AD3D1",   color: "#DF0D8A",highlight: "##F0D8A",','color: "#4D5360",highlight: "#616774",'];

          

      ?>
     var pieData = [
      <?php
        $c = 0; 
        for($i=0;$i<count($maledistribution);$i++){
        if($c==5){$c=0;}
        ?>

        {
          value: <?php echo $maledistribution[$i]['number'] ?>,
        <?php echo $color[$c]?>
           label: "<?php echo $maledistribution[$i]['sd_unit'] ?>"
        }
      <?php $c++;
        }
       ?>      

      ];

    </script>

            <script>
  window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
         legend(document.getElementById("legend_f"), pieData);
         window.myPie = new Chart(ctx).Pie(pieData);
        var ctx = document.getElementById("chart-area_f").getContext("2d");
         legend(document.getElementById("legend"), pieData);
         window.myPie = new Chart(ctx).Pie(pieData);
   }

  </script>
  
</body>

</html>