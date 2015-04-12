<?php $this->load->helper('url'); 
$p=0;
//creating new arrays
while($p < sizeof($projects)){


$projectname[$p] = $projects[$p]['project_name'] ;
$projectcat[$p] = $projects[$p]['project_category'] ;
$projectdesc[$p] = $projects[$p]['project_description'] ;


$p++;
}

?>
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
                  <li><a href="<?php echo base_url("index.php/student");?>">My Profile</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-list-alt"></i><span>Vacancies</span></a>
               <ul class="sub-menu">
                <li ><a href="<?php echo base_url('index.php/student/internshipvacancies')?>">Internship Vacancies</a></li>
                  <li><a href="<?php echo base_url('index.php/student/fellowshipvacancies')?>">Fellowship Vacancies</a></li>
                     </ul>
              </li>
              <li><a href="#"><i class="fa fa-table"></i><span>Projects</span></a>
                <ul class="sub-menu">
                  <li class='active'><a href="<?php echo base_url('index.php/student/projects')?>">Project Details</a></li>
                  
                </ul>
              </li>              

                   <li><a href="#"><i class="fa fa-file"></i><span>Reports</span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url("index.php/student/project_reports");?>">Project</a></li>
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
        
       <div class="tab-container tab-left">
            
          <div id = "new" class="tab-pane">
          <div class="tab-content">
                <div class="tab-container tab-right">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#newproject">Project Details</a></li>
            <li><a data-toggle="tab" href="#newtools">Project Tasks</a></li>
          </ul>
          <div class="tab-content">
            <div id="newproject" class="tab-pane active cont">
               <div id ="newprojectmessage"></div>
              <form class="form-horizontal" role="form" onsubmit="return addproject()" id = "addproject">
              <table class="no-border no-strip information">
                <tbody class="no-border-x no-border-y">
                    <tr>
                    <td style="width:20%;" class="category"><strong>NEW PROJECT DETAILS</strong></td>
                    <td>
                      <table class="no-border no-strip skills">
                        <tbody class="no-border-x no-border-y">
                          <tr><td style="width:20%;"><b>Project Name</b></td><td>
                          <input type="text"  name = "name" value ="" class="form-control" id = "newname"></td></tr>
                          <tr><td style="width:20%;"><b>Project Category</b></td><td>
                          <input type="text"  name = "category" value ="" class="form-control"></td></tr>
                          <tr><td style="width:20%;"><b>Project Description</b></td><td>
                          <textarea name = "desc" class="form-control"></textarea> </td></tr>
                          </tbody>
                      </table>
                    </td>
                  </tr>
                 
                  
                </tbody>
              </table>
                      <button class="btn btn-default btn-flat btn-primary bg" type="submit"><span>Save Changes</span></button>
                </form>
            </div>
             <div id="newtools" class="tab-pane">

                  <h3 class="widget-title">Project Tasks</h3>
             <div id = "newtoolsmessage">
               
             </div>
              <div class="row friends-list">
                <div class="col-sm-6 col-md-6 pull-right">
                    <form class="form-horizontal" role="form" onsubmit="return addtool()" id ='addtools'>
                    <div class="input-group">
                    <select type="text" class="form-control col-md-12 col-xs-7"
                     id = "projectname" class="form-control"name = "project" required placeholder="Project Name" >
                      
                    </select> 
                    </div>
                    <div class="input-group date datetime col-md-12 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control" 
                     size="16" name="s_date"type="text" value="" required placeholder="Start Date" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                     <div class="input-group date datetime col-md-12 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control" 
                     size="16" name="e_date"type="text" value="" required placeholder="End Date" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>

                    <div class="input-group">
                    <textarea name = "tasks" class="form-control col-md-12 col-xs-7" id = "newtool" required placeholder="Tasks" > Tasks</textarea>
                    </div>

                  <button class="btn btn-default btn-flat btn-primary bg" type="submit"><span>Save Tasks</span></button>
                               
                    </form>
                    
                  
                </div>

                <div class="col-sm-6 col-md-6" id="addedtools">
                  
                   
                </div>
              </div>
            </div>


            </div>
            </div>
            </div>
            </div>
            

            
    <div id = "edit" class="tab-pane">
          <div class="tab-content">
                <div class="tab-container tab-right">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#editproject">Project Details</a></li>
            <li><a data-toggle="tab" href="#edittools">Project Tasks</a></li>
          </ul>
          <div class="tab-content">
            <div id="editproject" class="tab-pane active cont">
              <div id = "changeprojectmessage"></div>
              <form onsubmit="return editproject()" id = "changeproject" name = "changeproject">
              <table class="no-border no-strip information">
                <tbody class="no-border-x no-border-y">
                    <tr>
                    <td style="width:20%;" class="category"><strong>EDIT PROJECT DETAILS</strong></td>
                    <td>
                      <table class="no-border no-strip skills">
                         <tbody class="no-border-x no-border-y">
                          <tr><td style="width:20%;"><b>Select Project</b></td><td>
                          <select type="text"  name = "selectproject" value ="" class="form-control"
                             onclick="populateform()">
                                                      <?php for($i=0;$i<sizeof($projects);$i++){
                                                        $var=$projects[$i]['project_name'];
                                                      ?>
                                                      <option value ='<?php echo $var?>' editable ='true'> <?php echo $var ;?></option>
                                                     <?php }?>
                                                      
                          </select></td></tr>
                          
                          <tr><td style="width:20%;"><b>Project Name</b></td><td>
                          <input type="text"  name = "name" value ="" class="form-control"></td></tr>
                          <tr><td style="width:20%;"><b>Project Category</b></td><td>
                          <input type="text"  name = "category" value ="" class="form-control"></td></tr>
                          <tr><td style="width:20%;"><b>Project Description</b></td><td>
                          <textarea name = "desc" class="form-control"></textarea> </td></tr>
                    
                          </tbody>
                       </table>
                    </td>
                  </tr>
                 
                  
                </tbody>
              </table>
                      <button class="btn btn-default btn-flat btn-primary bg" type="submit"><span>Save Changes</span></button>
                  </form>
            </div>
             <div id="edittools" class="tab-pane">
               <table class="no-border no-strip information">
                <tbody class="no-border-x no-border-y">
                    <tr>
                    <td style="width:20%;" class="category"><strong>EDIT PROJECT TASKS</strong></td>
                    <td>
                <div class="row friends-list">
                <div class="col-sm-6 col-md-6">
                    <div id = "edittoolsmessage"></div>
                    <form onsubmit = "return extratool()" id = "edittool" name = "edittool">
                    <div class="input-group">
                    <select type="text" class="form-control" name = "project" id = "project">
                                    <?php for($i=0;$i<sizeof($projects);$i++){
                                                        $var=$projects[$i]['project_name'];
                                                      ?>
                                                      <option value ='<?php echo $var?>' editable ='true'> <?php echo $var ;?></option>
                                                     <?php }?>
                            
                    </select> 
                    </div>
                     <div class="input-group date datetime col-md-12 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control" 
                     size="16" name="s_date"type="text" value="" required placeholder="Start Date" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>
                     <div class="input-group date datetime col-md-12 col-xs-7" data-min-view="2" data-date-format="yyyy-mm-dd">
                    <input class="form-control" 
                     size="16" name="e_date"type="text" value="" required placeholder="End Date" >
                    <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                  </div>

                    <div class="input-group">
                    <textarea name = "tasks" class="form-control col-md-12 col-xs-7" id = "newtool" required placeholder="Tasks" > Tasks</textarea>
                    </div>
                    
                    <button class="btn btn-default btn-flat btn-primary bg" type="submit"><span>Save Changes</span></button>
                  </form>

                  
                </div>

                <div class="col-sm-6 col-md-6" id="tools">
                  
                   
                </div>
              </div>                    </td>
                  </tr>
                 
                  
                </tbody>
              </table>
              </form>
            </div> 
             </div>
            </div>
            </div>

            
          </div>
           <div class="tab-content">
            <div id="editproject" class="tab-pane active cont">
              <form onsubmit="return deleteproject()" id = "deleteform" name = "deleteform">
              <div id = "deletemessage"></div>
              <table class="no-border no-strip information">
                <tbody class="no-border-x no-border-y">
                    <tr>
                    <td style="width:20%;" class="category"><strong>DELETE PROJECT</strong></td>
                    <td>
                      <table class="no-border no-strip skills">
                   <table class="no-border no-strip skills">
                        <tbody class="no-border-x no-border-y">
                          <tr><td style="width:20%;"><b>Select Project</b></td><td>
                          <select type="text"  name = "project" value ="" class="form-control">
                                         <?php for($i=0;$i<sizeof($projects);$i++){
                                                        $var=$projects[$i]['project_name'];
                                                      ?>
                                                      <option value ='<?php echo $var?>' editable ='true'> <?php echo $var ;?></option>
                                                     <?php }?>
                            
                          </select></td></tr>
                            
                         
                         </tbody>
                      </table>
                    </td>
                  </tr>
                 
                  
                </tbody>
              </table>
                      <button class="btn btn-default btn-flat btn-danger bg" type="submit"><span>Delete Project</span></button>
              </form>
            </div>
         

</div>
</div>
  
</div> 
  
</div>
<!-- Scripts 
==================================================================================-->
  
  <script src="<?php echo base_url("assets/js/jquery.js")?>"></script>
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

  function addproject(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/student/addproject")?>',
    data:$('#addproject').serialize(),
    success:
      function(data){
        if (data == '1'){
           $('#newprojectmessage').attr("class" ,"alert alert-success alert-white-alt rounded");
           $('#newprojectmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#newprojectmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
           $('#newprojectmessage').append("<strong>Success!</strong> New Project Added!"); 
           $('#projectname').append("<option value ='"+$("#newname").val()+"'>"+$("#newname").val()+"</option>");
           $('#snapnew').append("<option value ='"+$("#newname").val()+"'>"+$("#newname").val()+"</option>");

          
        }
        else{
          
           $('#newprojectmessage').attr("class" ,"alert alert-danger alert-white-alt rounded");
           $('#newprojectmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#newprojectmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
           $('#newprojectmessage').append("<strong>Error!</strong> Failed To Add New Project"); 
        }
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  
  return false;

  }
function editproject(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/student/editproject")?>',
    data:$('#changeproject').serialize(),
    success:
      function(data){
        if (data == '1'){
           $('#changeprojectmessage').attr("class" ,"alert alert-success alert-white rounded");
           $('#changeprojectmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#changeprojectmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
           $('#changeprojectmessage').append("<strong>Success!</strong> Project Details Edited !"); 
          
          
        }
        else{
          
           $('#changeprojectmessage').attr("class" ,"alert alert-danger alert-white rounded");
           $('#changeprojectmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#changeprojectmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
           $('#changeprojectmessage').append("<strong>Error!</strong> Failed To Edit Project Details"); 
        }
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  
  return false;

  }
   function addtool(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/student/addtool")?>',
    data:$('#addtools').serialize(),
    success:
      function(data){
        if (data == '1'){

           $('#newtoolsmessage').attr("class" ,"alert alert-success alert-white rounded");
           $('#newtoolsmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#newtoolsmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
           $('#newtoolsmessage').append("<strong>Success!</strong> New Task Added!"); 
           $('#addedtools').append("<h4>"+$("#newtool").val()+"</h4>"); 
          
        }
        else{
          
           $('#newtoolsmessage').attr("class" ,"alert alert-danger alert-white rounded");
           $('#newtoolsmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#newtoolsmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
           $('#newtoolsmessage').append("<strong>Error!</strong> Failed to Add New Task"); 
        }
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  
  return false;

  }
    function extratool(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/student/addtool")?>',
    data:$('#edittool').serialize(),
    success:
      function(data){
        if (data == '1'){
           $('#edittoolsmessage').attr("class" ,"alert alert-success alert-white rounded");
           $('#edittoolsmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#edittoolsmessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
           $('#edittoolsmessage').append("<strong>Success!</strong> new task added!"); 
          
        }
        else{
          
           $('#edittoolsmessage').attr("class" ,"alert alert-danger alert-white rounded");
           $('#edittoolsmessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#edittoolsmessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
           $('#edittoolsmessage').append("<strong>Error!</strong> failed to add new task"); 
        }
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  
  return false;

  }
      function deleteproject(){
    $.ajax({
    type: 'post',
    url:'<?php echo base_url("/index.php/student/deleteproject")?>',
    data:$('#deleteform').serialize(),
    success:
      function(data){
        if (data == '1'){
           $('#deletemessage').attr("class" ,"alert alert-success alert-white rounded");
           $('#deletemessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#deletemessage').append("<div class='icon'><i class='fa fa-check'></i></div>");
           $('#deletemessage').append("<strong>Success!</strong> project deleted !"); 
          
        }
        else{
          
           $('#deletemessage').attr("class" ,"alert alert-danger alert-white rounded");
           $('#deletemessage').append("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>");
           $('#deletemessage').append("<div class='icon'><i class='fa fa-warning'></i></div>");
           $('#deletemessages').append("<strong>Error!</strong> project deletion failed"); 
        }
      },
    fail:
      function(data){
        console.log(data);
      }

  });
  
  return false;

  }

  function populateform(){
 var s=document.changeproject.selectproject.selectedIndex;
            var selected=document.changeproject.selectproject.options[s].value;
            var names=<?php echo json_encode($projectname);?>;
            var category=<?php echo json_encode($projectcat);?>;
            var description=<?php echo json_encode($projectdesc);?>;
                          
 for(var i=0;i<names.length;i++){
      if(selected==names[i].replace(/[\[\]']+/g,'').replace(/['"]/g,'')){
        document.changeproject.name.value=names[i].replace(/[\[\]']+/g,'').replace(/['"]/g,'');
        document.changeproject.category.value=category[i].replace(/[\[\]']+/g,'').replace(/['"]/g,'');
        document.changeproject.desc.value=description[i].replace(/[\[\]']+/g,'').replace(/['"]/g,'');
           }
        
    }
    return false;
    }


</script>


  </body>

</html>
