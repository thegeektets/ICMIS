<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
 	
  private $vacancyid;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('admin_model');
   
    $this->load->model('student_model');
    
    }

	public function index()
	{
	
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['student'] = $this->student_model->get_student($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/index' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
	

	}

//logs out the user and re initializes the session varibles
  function logout(){
        $this->load->library('session');
        $this->users_model->logout($this->session->userdata('username'));
        $newdata = array(
        'logged_in' => FALSE);

        $this->session->set_userdata($newdata);
        $data['success']=("") ;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'Username ', 'required'); 
        $this->form_validation->set_rules('pass', 'Password  ', 'required'); 
    
    if ($this->form_validation->run() == FALSE){
   // $this->load->view('includes/header');
    $this->load->view('login',$data);
    }else {
      $passw = $this->users_model->logindetails();
      if($this->input->post("pass") == $passw){
        $this->load->library('session');
        $newdata = array(
                   'username'  => $this->input->post("user"),
                   'logged_in' => TRUE );

       $this->session->set_userdata($newdata);
       $users = $this->session->all_userdata();
       $this->users_model->login($this->input->post("user") );
       $this->dashboard();
      }

      else{
     $data['success']= ("Login Failed !") ;
   //  $this->load->view('includes/header');
     $this->load->view('login' ,$data);
   
      }
        
    }
      
     
      }
  function project_reports(){
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

  if($this->session->userdata('logged_in') == "TRUE"
      and $this->session->userdata('usertype') == "student" ) {
    
     $data['student'] = $this->student_model->get_student($this->session->userdata('username'));

     if($data['student']['0']['student_state'] == "ongoing"){

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
  
     $data['projects'] =$this->student_model->get_projects($this->session->userdata('username'));
     

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/project_reports' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
  }
  else{
            $data['message'] = 'Applications Must Be Approved';
            $this->load->view('includes/header');
            $this->load->view('access_denied',$data);
            $this->load->view('includes/footer');
    
  }
   }else{
            $data['message'] = 'Login Required'.'!' ;
            $this->load->view('includes/header');
            $this->load->view('access_denied',$data);
            $this->load->view('includes/footer');
  
}
 
  }

  function project_report($project_id){
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

   if($this->session->userdata('logged_in') == "TRUE"
      and $this->session->userdata('usertype') == "student" ) {
  
     $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
   if($data['student']['0']['student_state'] == "ongoing"){

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
  
     $data['project'] =$this->student_model->get_project($project_id);
     $data['projecttasks'] =$this->student_model->get_projecttasks($project_id);
     
     

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/project_report' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    }
    else{
        $data['message'] = 'Login Required'.'!' ;
            $this->load->view('includes/header');
            $this->load->view('access_denied',$data);
            $this->load->view('includes/footer');
       
    }
   }
   else{
        $data['message'] = 'Applications Must Be Approved'.'!' ;
            $this->load->view('includes/header');
            $this->load->view('access_denied',$data);
            $this->load->view('includes/footer');
       
    }
  }
  //loads the edit_projects page with the necessary data and tools

  function projects(){
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

    if($this->session->userdata('logged_in') == "TRUE"
      and $this->session->userdata('usertype') == "student" ) {
      $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
            
      if($data['student']['0']['student_state'] == "ongoing"){

      $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
  
      $data['projects'] =$this->student_model->get_projects($this->session->userdata('username'));
      $data['success']=("") ;
    
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/project' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
        }
        else{
            $data['message'] = 'Applications Must Be Approved';
                $this->load->view('includes/header');
                $this->load->view('access_denied',$data);
                $this->load->view('includes/footer');

        }
 
    }
    else{
          $data['message'] = 'Login Required'.'!' ;
            $this->load->view('includes/header');
            $this->load->view('access_denied',$data);
            $this->load->view('includes/footer');
   
      }
        
      }
   

function addproject(){
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name','name', 'required'); 
      $this->form_validation->set_rules('category','category', 'required'); 
      $this->form_validation->set_rules('desc','description', 'required'); 

   if ($this->form_validation->run() == FALSE){
         echo "0";
    }
    else {
    
     $this->load->library('session');
     $this->student_model->addproject();
      echo "1";
     
    }

  }
 function addtool(){
       $this->load->library('session');
 
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('project','project', 'required'); 
     

      $this->form_validation->set_rules('s_date','s_date', 'required'); 
      $this->form_validation->set_rules('e_date','e_date', 'required'); 
      $this->form_validation->set_rules('tasks','tasks', 'required'); 
      

   
   if ($this->form_validation->run() == FALSE){
         echo "0";
         echo form_error();
    }
    else {
    $project = $this->input->post("project");


    $projectid = $this->student_model->get_projectid($project);
         
     $this->load->library('session');
     $this->student_model->add_tool($projectid);
     echo "1";
     
    }


 }

//edit projects function 

  function editproject(){

    $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name','name', 'required'); 
      $this->form_validation->set_rules('category','category', 'required'); 
      $this->form_validation->set_rules('desc','description', 'required'); 
      
   if ($this->form_validation->run() == FALSE){
          echo "0";
          echo form_error();

    }
    else {
      $this->student_model->editproject();
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
      $this->student_model->deleteproject();
      echo "1";

    }

  }



  //allows you to edit the details of a user
 function editstudent(){
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id','Student Id ', 'required');
            $this->form_validation->set_rules('name','Fullname ', 'required'); 
            $this->form_validation->set_rules('username', 'username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
            $this->form_validation->set_rules('gender', 'Gender  ', 'required'); 
            $this->form_validation->set_rules('about', 'about ', 'required'); 
            $this->form_validation->set_rules('phone_number', 'phone_number ', 'required|number'); 
            $this->form_validation->set_rules('institution', 'Institution  ', 'required'); 
            $this->form_validation->set_rules('country', 'Nationality', 'required'); 
            $this->form_validation->set_rules('DOB', 'Birthday  ', 'required'); 
                    
                       

    if ($this->form_validation->run() == FALSE){
        echo "0";
    }
    else {
     $this->load->library('session');
     $this->student_model->editdetails();
     echo "1" ;
    }
}
  function editstudentdetails(){
            $this->load->library('session');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id','Student Id ', 'required');
            $this->form_validation->set_rules('student_name', "Applicants' Name", 'required'); 
            $this->form_validation->set_rules('student_gender', "Applicants' Gender", 'required'); 
            $this->form_validation->set_rules('student_dob', "Applicants' DOB", 'required'); 
            $this->form_validation->set_rules('student_email', "Applicants' Email", 'required|valid_email'); 
            $this->form_validation->set_rules('student_phone', "Applicants' Phone", 'required'); 
            $this->form_validation->set_rules('student_nationality', "Applicants' Nationality", 'required'); 
            $this->form_validation->set_rules('student_nextofkin', "Applicants' Next of Kin", 'required'); 
            $this->form_validation->set_rules('student_nextofkincontact', "Next of Kin Contacts", 'required'); 
            $this->form_validation->set_rules('student_institution', "Applicants' Institution", 'required');

             if ($this->form_validation->run() == FALSE){

                  echo 0 ;
                    }
            
            else {
            
                 $this->student_model->editstudentdetails();
                 echo 1;
    
    }
  }

  function applyinternship($vacancyid){
  
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

  if($this->session->userdata('logged_in') == "TRUE") {
    $newdata = array(
          
                'vacancyid'  => $vacancyid
            
               );

    $this->session->set_userdata($newdata);
    $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
    $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    
      if(count($this->student_model->check_application($vacancyid))>0){

      $data['success']= ("You have already made this application edit application to change your submissions") ;
  
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_internship',$data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
  
    $this->load->view('includes/wizard');
     }
     else
     {

    $data['success']= ("") ;
 
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_internship',$data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
  
    $this->load->view('includes/wizard');
    
  }
  
  }
  else{

      $data['success']=("Login Required to Apply Internship") ;
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
      $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('login',$data);
       $this->load->view('includes/footer');   
       $this->load->view('includes/datatables');
     
    }
        
  }

  }

  function placeinternshipapplication($vacancyid){

   $this->load->library('session');

     $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');

            $this->form_validation->set_rules('applicant_skills', "Applicants' Skills", 'required'); 
            $this->form_validation->set_rules('relevantinformation', "Relevant Information", 'required'); 
    
        if ($this->form_validation->run() == FALSE){

              echo "0"  ;
    
    }
    else {
     $this->student_model->apply_internship($vacancyid);
     echo "1" ;
    }           



  }
    //upload cover letter
    function iuploadcover($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/coverletter/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $applicant_coverletter = 'applicant_coverletter' ;

         if($this->upload->do_upload($applicant_coverletter)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->iuploadcover($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }



    function iuploadcv($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/cv/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $applicant_curriculumvitae = 'applicant_curriculumvitae' ;

         if($this->upload->do_upload($applicant_curriculumvitae)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->iuploadcv($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }

    function iuploadil($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/introductionletter/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $introductionletter = 'introductionletter' ;

         if($this->upload->do_upload($introductionletter)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->iuploadil($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }



  function placefellowshipapplication($vacancyid){

   $this->load->library('session');

     $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');

            $this->form_validation->set_rules('applicant_skills', "Applicants' Skills", 'required'); 
            $this->form_validation->set_rules('relevantinformation', "Relevant Information", 'required'); 
            $this->form_validation->set_rules('research_title', "Proposed Research Title", 'required'); 
    
        if ($this->form_validation->run() == FALSE){

              echo "0"  ;
    
    }
    else {
     $this->student_model->apply_fellowship($vacancyid);
     echo "1" ;
    }           



  }


  //upload cover letter
    function uploadcover($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/coverletter/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $applicant_coverletter = 'applicant_coverletter' ;

         if($this->upload->do_upload($applicant_coverletter)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->uploadcover($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }



    function uploadcv($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/cv/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $applicant_curriculumvitae = 'applicant_curriculumvitae' ;

         if($this->upload->do_upload($applicant_curriculumvitae)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->uploadcv($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }

    function uploadil($vacancyid){
       $this->load->library('session');
       
       $this->load->helper(array('form', 'url'));

       $config['upload_path'] = './assets/introductionletter/';
       $config['allowed_types'] = 'doc|docx|pdf|odt';
       $config['max_size'] = '10000';
       $config['overwrite'] = FALSE; 
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       $introductionletter = 'introductionletter' ;

         if($this->upload->do_upload($introductionletter)){
             $this->load->library('session');
         //   $error = $this->upload->display_errors();
            $this->student_model->uploadil($vacancyid);
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }



    function applyfellowship($vacancyid){
  
   $this->load->library('session');
   $this->load->helper(array('form', 'url'));

  if($this->session->userdata('logged_in') == "TRUE") {
    $newdata = array(
          
                'vacancyid'  => $vacancyid
            
               );

    $this->session->set_userdata($newdata);
    $data['student'] = $this->student_model->get_student($this->session->userdata('username'));
    $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    
      if(count($this->student_model->check_fapplication($vacancyid))>0){

      $data['success']= ("You have already made this application another submission will edit your application.") ;
  
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_fellowship',$data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');

    $this->load->view('includes/wizard');
     }
     else
     {

 
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('student/apply_fellowship',$data);
    $this->load->view('includes/datatables');
  
    $this->load->view('includes/footer');
    $this->load->view('includes/wizard');
  
    
    }

  }
  
  
  else{

      $data['success']=("Login Required to Apply Fellowship") ;
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
      $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('login',$data);
       $this->load->view('includes/footer');   
       $this->load->view('includes/datatables');
     
    }
        
  }

  }

  function internshipvacancies(){
        $this->load->library('session');
        $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
        $data['ivacancies'] = $this->admin_model->load_ivacancies();
        $this->load->view('includes/header');
        $this->load->view('includes/menu' ,$data);
        $this->load->view('student/internshipvacancies',$data);
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');
        

  }

  function fellowshipvacancies(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['fvacancies'] = $this->admin_model->load_fvacancies();
      $this->load->view('includes/header');
      $this->load->view('includes/menu' ,$data);
      $this->load->view('student/fellowshipvacancies',$data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
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
            $this->student_model->changeuseravatar();
           
            echo "1";
      }
      else{
             $error = $this->upload->display_errors();
              echo $error;
               echo "0";
      }

    }

     







}

