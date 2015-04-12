
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
	
		<div class="container-fluid" id="pcont" >
		  <div class="cl-mcont">
		  
			  
	<div class="row">
          <div class="col-sm-12 block-flat">
        
                <div class="row"> 

                    <div class="col-sm-5"></div>
                    <div class="col-sm-3" style="margin:auto;"> <a href="#"> <img src="<?php echo base_url('assets/images/contract_logo.jpg');?>" height="200px" width="200px"/> </a> </div> 
                    <div class="col-sm-4"></div>

                </div>

                     <hr class="margin" />
              <div class="row"> 
                <div class="col-sm-4 pull-left" style ="padding-left:40px;padding-top:20px;">
                  <?php echo date('d M Y'); ?>
                   
                   
                  
                  <?php if($contract['0']['student_gender']=='Male'){echo 'Mr ' ;}else{echo 'Ms ';} ?>
                  <?php echo $contract['0']['student_name'] ?>
                  <br />
                  <?php echo $contract['0']['student_institution'] ?>
                  <br />
                   <?php echo $contract['0']['student_nationality'] ?>
                  <br />

                   <?php echo $contract['0']['student_phone'] ?>
                  <br />

                   <?php echo $contract['0']['student_email'] ?>
                  <br />
                  <br />
                   Dear  <?php if($contract['0']['student_gender']=='Male'){echo 'Mr ' ;}else{echo 'Ms ';} ?>
                  <?php echo $contract['0']['student_name'] ?> ,
                    <br />
                    <br />
                 
              </div>

              <div class="col-sm-12 pull-left" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                              
                <h5> <strong style=""><u>RE: Letter of Agreement with regard to Internship/Attachment</u></strong></h5>
              
              <p style="margin:auto;"> 
                On behalf of the World Agroforestry Centre (ICRAF),
                 I hereby confirm that your application for attachment has been successful.
                  The agreement is subject to the following terms and conditions:
              </p>
               
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Position: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                     Student Intern.
              </div>
              
               

               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Dates: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                    <?php echo $contract['0']['bdate']." - ".$contract['0']['edate']; ?>
              </div>
                
              

               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Location Attachment: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                    <?php echo $contract['0']['region']." , ".$contract['0']['country']; ?>
              </div>
                
              

              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Project: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                    <?php echo $contract['0']['researchtitle_purposeinternship']; ?>
              </div>
                
              
              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Project Summary: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                    <?php echo $contract['0']['summary']; ?>
              </div>
                
              

              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Stipend: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                    You will be provided with a monthly stipend of Ksh 8000.
              </div>
                
              

              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Cost Center: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                             <?php echo $contract['0']['cost_center']; ?>
         
              </div>
                
              

              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Travel: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  ICRAF will also cover the costs of your travel to and from 
                  ICRAF by providing a monthly transport allowance of Ksh. 8,180 (Taxable).

              </div>
                
              
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong> Medical Insurance: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  You will be responsible for your Medical and Personal Accident covers. 
                  Copies of the stated documents should be submitted to the Capacity Development Unit.


              </div>
                
              
            
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>Supervisor:</strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                 <?php echo $contract['0']['Name']." , ".$contract['0']['sd_unit']?>


              </div>
                
              
              
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>Expected Outputs:</strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                 <?php echo $contract['0']['expectedoutput']?>


              </div>
                
              
             <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>Terms of Reference:</strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                 <?php echo $contract['0']['tor']?>


              </div>
                
               

              <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>Research facilities: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                ICRAF will provide office space, Email connectivity, student ID and Computer.
                 Any equipment/materials given should be returned to
                 ICRAF in good condition upon completion of your attachment. 
                 You will be responsible for any damage or loss of equipment given.


              </div>
                
               
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>     Reports: </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  You will submit a soft and hard copy of your report to your supervisors 
                  and a copy to Capacity Development Unit one (1) week before the completion of your attachment. 
                  Upon completion of the attachment, you will be required to sign in a clearance form at the
                   Administration Office. The completed and signed clearance form should be submitted to the 
                   Capacity Development Unit.


              </div>
                
                                                   

               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>     Status:  </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  
            Interns are not ICRAF staff members. As a recipient of this attachment, you will not be an agent or
              representative of ICRAF. You shall ensure that you do not, in any way, represent or speak on behalf of
            ICRAF and its partners for any purpose unless specifically authorised to do so. You are 
              expected to conduct yourself in a manner befitting the status of an international civil servant. 


              </div>
                
              
                  <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>     Property rights:   </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  

 The rights, copyrights, patent rights or any other intellectual rights generated from any ICRAF research under the provision of this service agreement shall be subject to ICRAF’s research 
  policy, Intellectual Property and Enhanced Research policy. Co-authorship with ICRAF staff will occur by mutual consent of all parties in any publication emanating from work done during this attachment.                                          
        
Termination:  ICRAF reserves the right to terminate a fellowship when the ICRAF supervisor is able to convince Capacity Development Unit that the under- performance was deliberate on part of the student, who will in turn, forward the case for approval to the Assistant Director General, Partnerships & Impact/ respective Regional Coordinator. The approving authority will direct CDU staff to issue a written letter of termination, including justification, the date of termination and recommendations for dealing with outstanding attachment objectives
    and intellectual property.
    

On behalf of the World Agroforestry Centre, I wish you success in your internship activities during the course of this attachment.

If the above terms and conditions are acceptable to you, please sign this letter and return a copy to the Capacity Development Unit.



              </div>
              
               <div class="col-sm-4" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                <strong>     Yours sincerely,   </strong>
                </div>
               <div class="col-sm-8" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  
                    

Dr. Margaret M. Kroma 
Assistant Director General, Partnerships & Impact 
__________________________________________________________________________ <br/>
      
I fully understand and accept the terms and conditions of this agreement.</br>

Date  

              </div>
              
              <div class="col-sm-8 pull-right" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  
                    

<?php echo $contract['0']['student_name']; ?> (Student)
__________________________________________________________________________ <br/>

Date  

              </div>
    
    
 
              
              <div class="col-sm-8 pull-right" style ="padding-left:40px;padding-top:20px;font-size:14px;">
                  
                    

<?php echo $contract['0']['Name']; ?> (Supervisor)
__________________________________________________________________________ <br/>

Date  

              </div>
    
                 <div class="col-sm-8 pull-right" style ="padding-left:40px;padding-top:20px;font-size:14px;">
            

               <br /> <a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
Print Contract
<i class="entypo-doc-text"></i> </a>
&nbsp;
 </div> 

</div></div> </div> </div> 



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