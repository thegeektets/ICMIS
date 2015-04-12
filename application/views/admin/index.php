
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
                   <li class="active" ><a href="<?php echo base_url('index.php/admin') ?>">My Profile</a></li>
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
                  <li><a href="<?php echo base_url('index.php/admin/ongoing_internrequests') ?>">Ongoing Intern Requests</a></li>
                  <li><a href="<?php echo base_url('index.php/admin/ongoing_fellowrequests') ?>">Ongoing Fellow Requests</a></li>
               
                  <li><a href="<?php echo base_url('index.php/admin/processed_internrequests') ?>">Processed Intern Requests</a></li>
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
           <li ><a href="<?php echo base_url('index.php/admin/clear_student') ?>">Clear Student </a></li>
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
        <div class="col-sm-12">
          
          <div class="tab-container">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Admin Details</a></li>
              <li><a data-toggle="tab" href="#avatar">User Avatar</a></li>
              <li><a data-toggle="tab" href="#settings">Account Settings</a></li>
            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane active cont">
                <form onsubmit="return editprofile()" id = "editprofile">
                <div id="message">
                  
                </div>
                <table class="no-border no-strip information">
                  <tbody class="no-border-x no-border-y">
                      <tr>
                      <td style="width:20%;" class="category"><strong>PROFILE</strong></td>
                      <td>
                        <table class="no-border no-strip skills">
                          <tbody class="no-border-x no-border-y">
                            <tr><td style="width:20%;"><b>Username</b></td><td><span class = "detail"><?php echo $profile[0]['username'] ;
                            if($profile[0]['username'] == null){echo "username" ;} ?></span>
                            <input type="text" class="detail hidden" name = "username" value ="<?php echo $profile[0]['username'] ?>"></td></tr>
                      
                           </tbody>
                        </table>
                      </td>
                    </tr>
                   
                    <tr>
                      <td style="width:20%;" class="category"><strong>CONTACT</strong></td>
                      <td>
                        <table class="no-border no-strip skills">
                          <tbody class="no-border-x no-border-y">
                               <tr><td style="width:20%;"><b>E-mail</b></td><td><span class = "detail"><?php echo $profile[0]['useremail'] ;
                              if($profile[0]['useremail'] == null){echo "email" ;}?></span>
                            <input type="text" class="detail hidden" name = "email" value ="<?php echo $profile[0]['useremail'] ?>"></td></tr>
                             </tbody>
                        </table>
                      </td>
                    </tr>
               
          
               

                  </tbody>
                </table>
                        <button class="btn btn-default btn-flat btn-primary bg" type ="submit"><span>Save Changes</span></button>
                      </form>
              </div>

              
              <div id="settings" class="tab-pane cont">
                <h3 class="widget-title">Change Account Password</h3>
                     <div id= 'passmessage'></div>
             
                <div class="row friends-list">
                            <form role="form" class="form-horizontal" onsubmit="return changepassword()" id = "changepassword">
             
                  <div class="form-group spacer2">
                    <div class="col-sm-3"></div>
                    <label class="col-sm-9">Change Password</label>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="password">Password</label>
                    <div class="col-sm-9">
                      <input name="password" type="password" placeholder="Password" id="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="cpassword">Repeat Password</label>
                    <div class="col-sm-9">
                      <input type="password" placeholder="cpassword" id="cpassword" name="cpassword" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                      <button class="btn btn-primary" type="submit">Update</button>
                      <button class="btn btn-default">Reset</button>
                    </div>
                  </div>
              </form>
                </div>
              </div>

              <div id="avatar" class="tab-pane">
                <div id= 'avatarmessage'></div>
                <form role="form" class="form-horizontal" onsubmit="return changeavatars()" enctype ='multipart/form-data' id="avatars">
                <div class="form-group">
                  <label class="col-sm-3 control-label">User avatar</label>
                  <div class="col-sm-6">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div>
                        <span class="btn btn-primary btn-file"><span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span><input type="file" name="useravatar"></span>
                      </div>
                    </div>
                  </div>
                </div>
         
                        <button class="btn btn-default btn-flat btn-primary bg" type ="submit"><span>Save Changes</span></button>
                    

                </form>

                <div class="md-overlay"></div>
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
        function changepassword(){
      $.ajax({
      type: 'post',
      url:'<?php echo base_url("/index.php/user/changepassword")?>',
      data:$('#changepassword').serialize(),
      success:
        function(data){
          if (data == '1'){
             $('#passmessage').attr("class" ,"alert alert-success alert-white-alt rounded");
             $('#passmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#passmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
             $('#passmessage').append("<strong>Success!</strong> Changes has been saved successfully!"); 

            
          }
          else if (data == '3'){
            
             $('#passmessage').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#passmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#passmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#passmessage').append("<strong>Error!</strong> validation error "); 
          }

          else {


             $('#passmessage').attr("class" ,"alert alert-danger alert-white-alt rounded");
             $('#passmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
             $('#passmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
             $('#passmessage').append("<strong>Error!</strong> password do not match"); 
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


  </body>

</html>