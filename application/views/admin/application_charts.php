
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
                  
                  <li class="active"><a href="<?php echo base_url('index.php/admin/application_charts') ?>"><span>Applications</span></a></li>
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
    <?php
  $applications = array_unique(array_merge($fapplications,$iapplications), SORT_REGULAR);

   foreach ($fapplications as $application) {
     # code...
      $fnumber[] =  $application['number']; 
      $fmonths[] =  date("F", mktime(0, 0, 0, $application['MONTH'], 10)) ." : ".$application['YEAR'];   
  
}
foreach ($iapplications as $application) {
     # code...
      $inumber[] =  $application['number']; 
       $imonths[] =  date("F", mktime(0, 0, 0, $application['MONTH'], 10)) ." : ".$application['YEAR']; 
    
}
    
   ?>
 
<body>

		<div class="container">
			  
  <div class="cl-mcont">
  			  
	<div class="row">
        <div class="col-sm-12 block-flat">
          
             <div  class="col-sm-12" style="display:block;" >

              <div class="header" style="width:100%;padding-top:15px;">
              <h3 style = "text-align:center">Internship Applications Received  Per Month Bar Graph</h3>
            </div>

            <div style="width: 60%;background:#f2f2f2;display:block;float:left;padding:15px;">
            <canvas id="canvas" height="350" width="600"></canvas>
            </div>
            <div  style="width: 40% ; float:right;display:block;padding:15px;">
              <h4 style="text-align:center">Legend </h4>
              <hr/>
            <div id="legend"></div>
            </div>
             
           
          </div>    
          
          

          
             <div  class="col-sm-12"  style="display:block;" >
              <div class="header" style="width:100%;padding:15px">
              <h3 style = "text-align:center">Fellowship Applications Received  Per Month Bar Graph</h3>
            </div>

            <div style="width: 60%;background:#f2f2f2;display:block;float:left;padding-top:15px;">
            <canvas id="canvas_f" height="350" width="600"></canvas>
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
      
     $("span.detail").click(function() 
      {
       edit($(this));
       });
    
     
     $("input.detail").change(function(){
        change($(this));
     }).blur(function() {
      $(this).hide().siblings("span.detail").show();
      });
     
    
    
     
     
     function edit($field){
       $field.hide()
       .siblings("input" ,"textarea").attr("class" ,"detail")
       .show()
       .val($field.text())
       .attr("value" ,$("input").val())
      

       .focus();
        
      }
    function change($input){
      $input.hide();
      
      var $span = $input.siblings("span.detail");
      if ($input.val())
      {
      $span.text($input.val());
      }
      $span.show();
    }

    function editprofile(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/editadmin")?>',
      data:$('#editprofile').serialize(),
      success:
        function(data){
          if (data == '1'){
             $('#message').attr("class" ,"alert alert-success alert-white-alt rounded");
             $('#message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#message').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#message').append("<strong>Success!</strong> Changes has been saved successfully!"); 

            
          }
          else{
            
             $('#message').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#message').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#message').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#message').append("<strong>Error!</strong> saving changes"); 
          }
        },
      fail:
        function(data){
          console.log(data);
        }

    });
    
    return false;

    }

      function changeavatars(){

    var form = document.getElementById('avatars');
    var myfd = new FormData(form);

      $.ajax({
      
      type: 'post',
      url:'<?php echo base_url("/index.php/admin/changeavatars")?>',
      data:myfd,
      processData: false,
      contentType:false,
      
      success:
        function(data){
          if ( data != '0'){
             $('#avatarmessage').attr("class" ,"alert alert-success alert-white-alt rounded");
             $('#avatarmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#avatarmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#avatarmessage').append("<strong>Success!</strong> Avatar changed"); 
             
          }
          else{
            
             $('#avatarmessage').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#avatarmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#avatarmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#avatarmessage').append("<strong>Error!</strong> Avatar change failed"); 
          }
        },
      fail:
        function(data){
          console.log(data);
        }

    });
    
    return false;

    }



</script>

            <script>

  var barChartData = {
   labels : <?php $ms = json_encode($imonths ,JSON_NUMERIC_CHECK);
       echo print_r($ms,true); ?>,
     datasets : [
 
      {
        fillColor : "rgba(124,56,134,1)",
        strokeColor : "rgba(124,56,134,2)",
        highlightFill : "rgba(124,56,134,0.9)",
        highlightStroke : "rgba(124,56,134,1)",
     data : <?php $ex = json_encode($inumber ,JSON_NUMERIC_CHECK);
           echo print_r($ex,true); ?>,
      label : 'Internship Applications' 
          }

      
    ]

  }

  var barChartDataf = {
   labels : <?php $ms = json_encode($fmonths ,JSON_NUMERIC_CHECK);
       echo print_r($ms,true); ?>,
     datasets : [
 
          {
        fillColor : "rgba(186,213,50,1)",
        strokeColor : "rgba(186,213,50,2)",
        highlightFill: "rgba(186,213,50,0.9)",
        highlightStroke: "rgba(186,213,50,1)",
        data : <?php $ex = json_encode($fnumber ,JSON_NUMERIC_CHECK);
           echo print_r($ex,true); ?> ,
        label : 'Fellowship Applications'   
      }


      
    ]

  }
  window.onload = function(){
    var ctx = document.getElementById("canvas_f").getContext("2d");
     legend(document.getElementById("legend_f"), barChartDataf);

    window.myBar = new Chart(ctx).Bar(barChartDataf, {
      responsive : true
    });

   var ctx_i = document.getElementById("canvas").getContext("2d");
     legend(document.getElementById("legend"), barChartData);

    window.myBar = new Chart(ctx_i).Bar(barChartData, {
      responsive : true
    });

  }

  </script>
  
</body>

</html>