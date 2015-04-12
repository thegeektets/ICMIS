<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisor extends CI_Controller {
 	  public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('supervisor_model');
    $this->load->model('student_model');
    
    
    }

	public function index()
	{
	
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/index' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
	

	}

  //students

  public function supervisorintern(){
      
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   $data['interns'] = $this->supervisor_model->get_supervisorinterns();
   
   
    $this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/supervisorinterns' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');

  }


  public function supervisorfellow(){
      
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   $data['fellows'] = $this->supervisor_model->get_supervisorfellows();
   
    $this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);

    $this->load->view('supervisor/supervisorfellows' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');

  }
 

  //requests
    
  public  function newinternrequest(){
    	$this->load->library('session');
    
   $this->load->helper('url');
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('skills', 'skills field ', 'required'); 
            $this->form_validation->set_rules('number', 'Number of Interns ', 'required'); 
            $this->form_validation->set_rules('education', 'Level of education ', 'required'); 
            $this->form_validation->set_rules('summary', 'summary of project  ', 'required'); 
            $this->form_validation->set_rules('purpose', 'Purpose of Internship  ', 'required'); 
            $this->form_validation->set_rules('sd_unit', 'SD/Unit  ', 'required'); 
            $this->form_validation->set_rules('costcenter', 'Cost Center ', 'required'); 
            $this->form_validation->set_rules('region', 'Region of Internship  ', 'required');                   
            $this->form_validation->set_rules('country', 'country of Internship  ', 'required');
      			$this->form_validation->set_rules('tors', 'Terms of Reference ', 'required');
      			$this->form_validation->set_rules('expected', 'Expected Output ', 'required');
      			$this->form_validation->set_rules('enddate', 'End Date ', 'required');
      			$this->form_validation->set_rules('startdate', 'Start Date ', 'required');
      			$this->form_validation->set_rules('budgetholder', 'Budget Holder ', 'required');
      			$this->form_validation->set_rules('budgetholderemail', 'Budget Holder Email ', 'required|valid_email');
      			


    if ($this->form_validation->run() == FALSE){
 
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/internrequest' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
      
    

    }
     else if($this->input->post("enddate") == $this->input->post("startdate")
      || $this->input->post("enddate") < $this->input->post("startdate") || $this->input->post("startdate") < date('Y-m-d') ){

     $data['error']= ("End Date should be greater than Start Date and Start Date greater than the Current Date") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/internrequest' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("Registration success") ;
     $this->supervisor_model->newinternrequest();
     
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));
   $data['irequests'] = $this->supervisor_model->get_irequests($this->session->userdata('username'));
   $data['frequests'] = $this->supervisor_model->get_frequests($this->session->userdata('username'));
  
  
   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/requeststatus' , $data);
    $this->load->view('includes/footer');
	  $this->load->view('includes/datatables');
  
    
    }
  }
   
  public  function newfellowrequest(){
    	$this->load->library('session');
    
   $this->load->helper('url');
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('skills', 'skills field ', 'required'); 
            $this->form_validation->set_rules('number', 'Number of fellows ', 'required'); 
            $this->form_validation->set_rules('education', 'Level of education ', 'required'); 
            $this->form_validation->set_rules('summary', 'summary of project  ', 'required'); 
            $this->form_validation->set_rules('purpose', 'Purpose of fellowship  ', 'required'); 
            $this->form_validation->set_rules('sd_unit', 'SD/Unit  ', 'required'); 
            $this->form_validation->set_rules('costcenter', 'Cost Center ', 'required'); 
            $this->form_validation->set_rules('region', 'Region of fellowship  ', 'required');                   
            $this->form_validation->set_rules('country', 'country of fellowship  ', 'required');
			$this->form_validation->set_rules('tors', 'Terms of Reference ', 'required');
			$this->form_validation->set_rules('expected', 'Expected Output ', 'required');
			$this->form_validation->set_rules('enddate', 'End Date ', 'required');
			$this->form_validation->set_rules('startdate', 'Start Date ', 'required');
			$this->form_validation->set_rules('budgetholder', 'Budget Holder ', 'required');
			$this->form_validation->set_rules('budgetholderemail', 'Budget Holder Email ', 'required|valid_email');
			


    if ($this->form_validation->run() == FALSE){
 
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/fellowrequest' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
  
    }
     else if($this->input->post("enddate") == $this->input->post("startdate")
      || $this->input->post("enddate") < $this->input->post("startdate") || $this->input->post("startdate") < date('Y-m-d') ){

     $data['error']= ("End Date should be greater than Start Date and Start Date greater than the Current Date") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/fellowrequest' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("Registration success") ;
     $this->supervisor_model->newfellowrequest();
     
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));
   $data['irequests'] = $this->supervisor_model->get_irequests($this->session->userdata('username'));
   $data['frequests'] = $this->supervisor_model->get_frequests($this->session->userdata('username'));
  
  
   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/requeststatus' , $data);
    $this->load->view('includes/footer');
	  $this->load->view('includes/datatables');
  
    
    }
  }
   

  public function requeststatus(){
  		$this->load->library('session');
        $this->load->helper('url');

   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['supervisor'] = $this->supervisor_model->get_supervisor($this->session->userdata('username'));
   $data['irequests'] = $this->supervisor_model->get_irequests($this->session->userdata('username'));
   $data['frequests'] = $this->supervisor_model->get_frequests($this->session->userdata('username'));
  
   	$this->load->view('includes/header');
    $this->load->view('includes/menu' ,$data);
    $this->load->view('supervisor/requeststatus' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
  
   
  }

  function editproject(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('name','name', 'required'); 
      $this->form_validation->set_rules('category','category', 'required'); 
      $this->form_validation->set_rules('desc','description', 'required'); 
      //$this->form_validation->set_rules('avatar','avatar', 'required'); 

   if ($this->form_validation->run() == FALSE){
          echo "0";
    }
    else {
      $this->users_model->editproject();
      echo "1";

    }

  }

  //edit projects function 

  function deleteproject(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('project','project', 'required'); 
          //$this->form_validation->set_rules('avatar','avatar', 'required'); 

   if ($this->form_validation->run() == FALSE){
          echo "0";
    }
    else {
      $this->users_model->deleteproject();
      echo "1";

    }

  }


  //function loads the portfolio of a user/developer
function profile($username){
          $this->load->library('session');
    
        $data['profile'] = $this->users_model->get_user($username);
        $data['skills'] = $this->users_model->get_skills($username);
        $data['projects'] =$this->users_model->get_projects($username);
  
        $this->load->view('dashboard/portfolio', $data);
 }
 function myprofile(){
        $this->load->library('session');
    
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
        $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
        $data['members'] = $this->users_model->get_members();
        $data['projects'] =$this->products_model->get_newproducts();
  
      $this->load->view('dashboard/profile', $data);
 }

//dashboard :
  function dashboard(){
          $this->load->library('session');
    
      if($this->session->userdata('logged_in') == "TRUE") {
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
        $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
        $data['members'] = $this->users_model->get_members();
        $data['projects'] =$this->products_model->get_newproducts();
  
     //   $data['projects'] =$this->users_model->get_projects($this->session->userdata('username'));
  
        $this->load->view('dashboard/index' , $data);
        }
        else{
          $this->index();
        }
      }
 function project_reports(){
     
     $this->load->library('session');
     $this->load->helper(array('form', 'url'));

    $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
    $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    $data['projects'] =$this->student_model->get_studentprojects();
     

        $this->load->view('includes/header');
        $this->load->view('includes/menu' , $data);
        $this->load->view('supervisor/project_reports' , $data);
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');
 
  }
  //this function loads the activity pane which updates members on what is going on
      function activity(){
          $this->load->library('session');
    
      if($this->session->userdata('logged_in') == "TRUE") {
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
        $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
        $data['online'] = $this->users_model->online();
        $data['logs'] = $this->users_model->readlog();
        
     //   $data['projects'] =$this->users_model->get_projects($this->session->userdata('username'));
        $this->load->view('includes/header');
     
        $this->load->view('dashboard/activity' , $data);
        }
        else{
          $this->index();
        }
      }
  //this function updates the activity log of users as they perform various actions 
    //this log is later used to update other members on what is happening in the coomunity
      //view other users profiles 
      function updatelog($username,$category ,$description ,$snap){
        //updatelog on db
        $this->users_model->updatelog($username,$category ,$description ,$snap);
        



      }
  function viewprofile($username){
          $this->load->library('session');
    
      if($this->session->userdata('logged_in') == "TRUE") {
        $data['profile'] = $this->users_model->get_user($username);
        $data['skills'] = $this->users_model->get_skills($username);
     //   $data['projects'] =$this->users_model->get_projects($this->session->userdata('username'));
  
        $this->load->view('dashboard/viewprofile' , $data);
        }
        else{
          $this->index();
        }
      }

  //allows you to edit the details of a user
 function editsupervisor(){
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Fullname ', 'required'); 
            $this->form_validation->set_rules('username', 'username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
            $this->form_validation->set_rules('sd_unit', 'SD/Unit  ', 'required'); 
            $this->form_validation->set_rules('phone_number', 'phone_number ', 'required|number'); 
                    
                       

    if ($this->form_validation->run() == FALSE){
        echo "0";
    }
    else {
     $this->load->library('session');
     $this->supervisor_model->editdetails();
     echo "1" ;
    }
}

function addproject(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name','name', 'required'); 
      $this->form_validation->set_rules('category','category', 'required'); 
      $this->form_validation->set_rules('desc','description', 'required'); 
      //$this->form_validation->set_rules('avatar','avatar', 'required'); 

   if ($this->form_validation->run() == FALSE){
         echo "0";
    }
    else {
    
     $this->load->library('session');
     $this->users_model->addproject();
     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
     $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
     echo "1";
     
    }

  }
 function addtool(){
       $this->load->library('session');
 
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('project','project', 'required'); 
      $this->form_validation->set_rules('tool','tool', 'required'); 
   
   if ($this->form_validation->run() == FALSE){
         echo "0";
    }
    else {
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
         
     $this->load->library('session');
     $this->users_model->add_tool($projectid);
     echo "1";
     
    }


 }

//change both avatars or one of them
function changeavatars(){
 $this->load->library('session');
 
 $this->load->helper(array('form', 'url'));

 $config['upload_path'] = './assets/img/users/';
 $config['allowed_types'] = 'gif|jpg|png';
 $config['max_size'] = '10000';
 $config['max_width']  = '10240';
 $config['max_height']  = '7680';
 $config['overwrite'] = FALSE; 
 $this->load->library('upload', $config);
 $this->upload->initialize($config);
 $useravatar = 'useravatar' ;

   if($this->upload->do_upload($useravatar)){
       $this->load->library('session');
   //   $error = $this->upload->display_errors();
      $this->supervisor_model->changeuseravatar();
     
      echo "1";
}
else{
       $error = $this->upload->display_errors();
        echo $error;
         echo "0";
}



}




function initializemail(){
    $this->load->library('email');
    $config['protocol'] = "smtp"; 
    $config['smtp_host'] = "mx1.hakikahost.com";
    $config['smtp_port'] = "25";
    $config['smtp_user'] = "support@equiplexdevelopers.com"; 
    $config['smtp_pass'] = "support";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);
  } 

function passwordmail(){
     $email = $this->users_model->get_email($this->input->post("user"));
     $this->initializemail();
     $this->load->helper('url');
     $this->load->library('email');
     $password = $this->users_model->logindetails();
     $this->email->from('support@equiplexdevelopers.com', 'Equiplex Developers Community Support');
     $this->email->to($email); 
     $this->email->subject('Equiplex Developers Community : Password');
     $this->email->message('Your Equiplex Developers Community Password is'. $password ); 
     $this->email->send();
     echo "1";
    
     
     }



function changecoveravatar(){
      $this->load->helper(array('form', 'url'));
     
        $config['upload_path'] = './assets/img/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = FALSE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $avatar = 'coveravatar' ;
    if ( ! $this->upload->do_upload($avatar))
    {
      $this->load->library('session');
      $error = $this->upload->display_errors();
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
      $data['success'] =("cover avatar file upload failure ".$error); 
      $this->load->view('includes/header');
      $this->load->view('dashboard/edit_profile' ,$data);
     
    }
    else
    {
     $this->load->library('session');
      $this->users_model->changecoveravatar();
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
      $data['success'] =("Cover photo upload success"); 
      $this->load->view('includes/header');
     $this->load->view('dashboard/edit_profile' ,$data);
  
  $this->updatelog($this->session->userdata("username"),"Cover Change",$this->session->userdata('username')." changed the profile cover avatar",null);
  
    }


    
    

  }

function changeuseravatar(){
       $this->load->helper(array('form', 'url'));
    
        $config['upload_path'] = './assets/img/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = FALSE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $avatar = 'useravatar' ;
    
    if ( ! $this->upload->do_upload($avatar))
    {
      $this->load->library('session');
      $error = $this->upload->display_errors();
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
      $data['success'] =("user avatar file upload failure ".$error); 
      $this->load->view('includes/header');
      $this->load->view('dashboard/edit_profile' ,$data);
     
    }
    else
    {
     $this->load->library('session');
      $this->users_model->changeuseravatar();
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['skills'] = $this->users_model->get_skills($this->session->userdata('username'));
      $data['success'] =("user avatar upload success"); 
      $this->load->view('includes/header');
     $this->load->view('dashboard/edit_profile' ,$data);
  $this->updatelog($this->session->userdata("username"),"Avatar Change",$this->session->userdata('username')." changed the profile user avatar",null);
     
    }


    
    

  }
    


function addskill(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('skill','skill', 'required'); 
   if ($this->form_validation->run() == FALSE){
          echo "0";
    }
    else {
     $this->load->library('session');
     $this->users_model->addskill();
        echo "1";
    } 
function uploadprojectpic(){

    $config['upload_path'] = './projects/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());

    }
    else
    {
      $data = array('upload_data' => $this->upload->data());

    }
}

}

}

