<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 	  private $request_id;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    
    $this->load->model('admin_model');

    $this->load->model('student_model');
    
    }

    

//function loads the user page on admin dashboard

	public function index()
	{
	
   $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   	$this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/index' , $data);
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

  
  //function registers new supervisor and assigns default password ..
        
    function add_supervisor(){
     $this->load->library('session');
    
     $this->load->helper(array('form', 'url'));

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
                       

    if ($this->form_validation->run() == FALSE){

    $data['success']= ("") ;
 
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_supervisor');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("Registration success") ;
     $this->admin_model->registersupervisor();
    
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_supervisor');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
  }
  function deletesupervisor($userid){
    $this->admin_model->deletesupervisor($userid);
    
    $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['supervisors'] = $this->admin_model->get_supervisors();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/edit_supervisor');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
 
  }
 
   function edit_supervisor(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['supervisors'] = $this->admin_model->get_supervisors();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/edit_supervisor');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   //contracts

    function new_contract(){
      $this->load->library('session');
    
     $this->load->helper(array('form', 'url'));

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id', 'Student Id ', 'required'); 
            $this->form_validation->set_rules('tor', 'TOR ', 'required'); 
            $this->form_validation->set_rules('startdate', 'Start date', 'required');
            $this->form_validation->set_rules('enddate', 'End date ', 'required');
                       
    $student = $this->admin_model->check_student($this->input->post("student_id"));
    $data['student']= $this->admin_model->check_student($this->input->post("student_id"));

    if ($this->form_validation->run() == FALSE){

  
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else if(count($student) <= 0){
     
     $data['warning']= ("The student id does not exist on the database") ;
     $data['error']= ("Validation error ") ;


    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

  else if($this->input->post("enddate") == $this->input->post("startdate")|| $this->input->post("enddate") < $this->input->post("startdate") || $this->input->post("startdate") < date('Y-m-d') ){

     $data['error']= ("End Date should be greater than Start Date and Start Date greater than the Current Date") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("Registration success") ;
   
    $this->admin_model->add_contract();
    
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/add_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    }
  }

  

   function renew_contract(){
      $this->load->library('session');
    
     $this->load->helper(array('form', 'url'));

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

     $data['contracts'] = $this->admin_model->get_contracts();

    
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/edit_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
  function editcontract($contract_id){
      $this->load->library('session');
    
     $this->load->helper(array('form', 'url'));

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    
     $data['contract'] = $this->admin_model->load_contract($contract_id);


     $this->load->library('form_validation');

            $this->form_validation->set_rules('tor', 'TOR ', 'required'); 
            $this->form_validation->set_rules('startdate', 'Start date', 'required');
            $this->form_validation->set_rules('enddate', 'End date ', 'required');

                       
    $student = $this->admin_model->check_student($this->input->post("student_id"));
    $data['student']= $this->admin_model->check_student($this->input->post("student_id"));

    if ($this->form_validation->run() == FALSE){

    $data['error']= ("") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/renew_contract' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

  else if($this->input->post("enddate") == $this->input->post("startdate")|| $this->input->post("enddate") < $this->input->post("startdate") ){

     $data['error']= ("End Date should be greater than Start Date and Start Date greater than the Current Date") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/renew_contract' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("Registration success") ;
   
    $this->admin_model->renew_contract($contract_id);
    
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/renew_contract' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    }

  }

    function generate_contracts(){
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    

     $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id', 'Student Id ', 'required'); 

    $student = $this->admin_model->check_student($this->input->post("student_id"));
    $data['student']= $this->admin_model->check_student($this->input->post("student_id"));

    if ($this->form_validation->run() == FALSE){

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/generate_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else if(count($student) <= 0){

     $data['error']= ("The student id does not exist on the database") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/generate_contract');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

    else {

    $this->view_contract($this->input->post("student_id"));
    

    }

    }

    function view_contract($student_id){

      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['contract'] = $this->admin_model->get_contractdetails($student_id);
      
      $contract = $this->admin_model->get_contractdetails($student_id);

      if(count($contract) == 0){
        
      $contract['0']['request_type'] = "";

      }

      if($contract['0']['request_type']=='intern'){

         $this->load->view('includes/header');
         $this->load->view('includes/menu' , $data);
        $this->load->view('admin/intern_contract' ,$data);
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');
     
        }
        else if ($contract['0']['request_type']=='fellow'){

        $this->load->view('includes/header');
        $this->load->view('includes/menu' , $data);
        $this->load->view('admin/fellow_contract' ,$data);
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');
      
        }
        else{

        $data['error']= ("The student has no successfull application") ;

        $this->load->view('includes/header');
        $this->load->view('includes/menu' , $data);
        $this->load->view('admin/generate_contract');
        $this->load->view('includes/footer');
        $this->load->view('includes/datatables');    

      }

         

    }
  //clearance 

    function clear_student(){
      $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
    

     $this->load->library('form_validation');

            $this->form_validation->set_rules('student_id', 'Student Id ', 'required'); 
            $this->form_validation->set_rules('cdate', 'Clearance Date ', 'required'); 

    $student = $this->admin_model->check_student($this->input->post("student_id"));
    $contract = $this->admin_model->check_contractdates($this->input->post("student_id"));
    $alumni = $this->admin_model->check_alumni($this->input->post("student_id"));
    
    $data['student']= $this->admin_model->check_student($this->input->post("student_id"));

    if ($this->form_validation->run() == FALSE){

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/clear_student');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else if(count($student) <= 0){

     $data['error']= ("The student id does not exist on the database") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/clear_student');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

   else if(count($alumni) > 0){

     $data['success']= ("This student has already been cleared on the system") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/clear_student');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

   else if($contract['0']['bdate'] > $this->input->post("cdate")){

     $data['error']= ("Clearance Date Should Not Be Less Than The Contract Start Date") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/clear_student');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }


    else {

    $this->admin_model->clear_student();

    $data['success']= ("The student has been cleared and the data saved to student alumni data ") ;

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/clear_student');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    

    }

  //charts
    function intern_demographics(){

      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['maledistribution'] =$this->admin_model->get_maleinterndistribution();
      $data['femaledistribution'] =$this->admin_model->get_femaleinterndistribution();

      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/intern_demographics');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');

    }
    function fellow_demographics(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['maledistribution'] =$this->admin_model->get_malefellowdistribution();
      $data['femaledistribution'] =$this->admin_model->get_femalefellowdistribution();

      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/fellow_demographics');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');

      
    }

    function application_charts(){
     
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['fapplications'] =$this->admin_model->get_fapplications();
      $data['iapplications'] =$this->admin_model->get_iapplications();

      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/application_charts');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function request_charts(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['frequests'] =$this->admin_model->get_frequests();
      $data['irequests'] =$this->admin_model->get_irequests();

      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/request_charts');
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   //alumni

    function alumni_interns(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['alumni'] =$this->admin_model->alumni_interns();
     
       $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/alumni_interns',$data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


    function alumni_fellows(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['alumni'] =$this->admin_model->alumni_fellows();
     
       $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/alumni_fellows',$data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   //student

    function student_profile($userid){
       $this->load->library('session');
    
   $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
   $data['student'] = $this->student_model->get_studentprofile($userid);

    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/student_profile' , $data);
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    }
   
   //applications ...
    function fellowship_application($application_id){

      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_fellowshipapplication($application_id);
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/fellowship_application' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
  

    }
    function internship_application($application_id){

      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_internshipapplication($application_id);
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/internship_application' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
  

    }

    function shortlist_fapplication($application_id){

      $this->load->library('session');
      $this->admin_model->shortlist_fapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_pendingfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   
   function reject_fapplication($application_id){

      $this->load->library('session');
      $this->admin_model->reject_fapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_pendingfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


    function shortlist_iapplication($application_id){

      $this->load->library('session');
      $this->admin_model->shortlist_iapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_pendinginternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   
   function reject_iapplication($application_id){

      $this->load->library('session');
      $this->admin_model->reject_iapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_pendinginternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function pending_internship_applications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_pendinginternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function pending_fellowship_applications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_pendingfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


   
   function ongoing_internship_applications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_ongoinginternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

  function accept_iapplication($application_id ,$supervisor_id,$student_id){

      $this->load->library('session');
      $this->admin_model->accept_iapplication($application_id,$supervisor_id,$student_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_ongoinginternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

  function delete_iapplication($application_id){

      $this->load->library('session');
      $this->admin_model->delete_iapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

      $data['application'] = $this->admin_model->get_processedinternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   
   function ongoing_fellowship_applications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_ongoingfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

    function accept_fapplication($application_id ,$supervisor_id,$student_id){

      $this->load->library('session');
      $this->admin_model->accept_fapplication($application_id ,$supervisor_id,$student_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_ongoingfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   
   function delete_fapplication($application_id){

      $this->load->library('session');
      $this->admin_model->delete_fapplication($application_id);

      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_processedfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function processed_internship_applications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_processedinternshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_internship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function processed_fellowship_applications(){
        $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['application'] = $this->admin_model->get_processedfellowshipapplications();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_fellowship_applications' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }
   


   //requests
   function pending_internrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_pendinginternrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_internrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

    //load pending intern requests
   function ongoing_internrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_ongoinginternrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_internrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


      //load pending fellow requests
   function pending_fellowrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_pendingfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/pending_fellowrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

         //load pending fellow requests
   function ongoing_fellowrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_ongoingfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/ongoing_fellowrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


         //load processed fellow requests
   function processed_fellowrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_fellowrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }



         //load processed intern requests
   function processed_internrequests(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedinternrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_internrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


           //load processed fellowship applications
   function pending_fellowshipapplications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_fellowrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }



         //load processed internship applications
   function pending_internshipapplications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_internrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }


           //load processed fellowship applications
   function processed_fellowshipapplications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_fellowrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }



         //load processed internship applications
   function processed_internshipapplications(){
      $this->load->library('session');
      $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));
      $data['request'] = $this->admin_model->get_processedfellowrequests();
     
      $this->load->view('includes/header');
      $this->load->view('includes/menu' , $data);
      $this->load->view('admin/processed_internrequests' , $data);
      $this->load->view('includes/footer');
      $this->load->view('includes/datatables');
   }

   function openvacancy($request_id){       
      $this->load->library('session');
 
    $newdata = array(
          
                'id'  => $request_id
            
               );

    $this->session->set_userdata($newdata);
 
     $this->load->library('session');
    
     $this->load->helper(array('form', 'url'));

     $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

    if(count($this->admin_model->check_vacancy($this->session->userdata('id')))>0){

      $data['error']= ("Vacancy Exists") ;
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/open_vacancy');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
     
     }
     else{


     $this->load->library('form_validation');

            $this->form_validation->set_rules('vacancy_title', 'Vacancy Title ', 'required'); 
            $this->form_validation->set_rules('vacancy_description', 'Vacancy Description ', 'required'); 
            $this->form_validation->set_rules('application_deadline', 'Application Deadline ', 'required'); 
            $this->form_validation->set_rules('position_startdate', 'Position Start Date ', 'required'); 
            $this->form_validation->set_rules('position_enddate', 'Position End Date ', 'required'); 
            

    if ($this->form_validation->run() == FALSE){

    $data['success']= ("") ;
 
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/open_vacancy');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }
    else {
     $data['success']= ("New Vacancy Added") ;
     $this->admin_model->open_vacancy($this->session->userdata('id'));
    
    $newdata = array(
          
                'id'  => ""
            
               );

    $this->session->set_userdata($newdata);
    $this->load->view('includes/header');
    $this->load->view('includes/menu' , $data);
    $this->load->view('admin/open_vacancy');
    $this->load->view('includes/footer');
    $this->load->view('includes/datatables');
    
    }

    }
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
 function editadmin(){
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
                    
                       

    if ($this->form_validation->run() == FALSE){
        echo "0";
    }
    else {
     $this->load->library('session');
     $this->admin_model->editdetails();
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
      $this->admin_model->changeuseravatar();
     
      echo "1";
}
else{
       $error = $this->upload->display_errors();
        echo $error;
         echo "0";
}



}

function uploadprojectpics(){
 $this->load->library('session');
 
 $this->load->helper(array('form', 'url'));

 
 $config['upload_path'] = './assets/img/projects/';
 $config['allowed_types'] = 'gif|jpg|png';
 $config['max_size'] = '10000';
 $config['max_width']  = '10240';
 $config['max_height']  = '7680';
 $config['overwrite'] = FALSE; 
 $this->load->library('upload', $config);
 $this->upload->initialize($config);
 $productpic  = 'productpic';
 $productpic1 = 'productpic1';
 $productpic2 = 'productpic2';
 $productpic3 = 'productpic3';
 $productpic4 = 'productpic4';
 
 if ( ! $this->upload->do_upload($productpic) &&  ! $this->upload->do_upload($productpic1) &&  ! $this->upload->do_upload($productpic2) 
  &&  ! $this->upload->do_upload($productpic3) &&  ! $this->upload->do_upload($productpic4))
    {
      $error = $this->upload->display_errors();
      echo "0";
      echo $error;
     
    }
if($this->upload->do_upload($productpic)){

     $this->load->library('session');
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
    
     $this->users_model->changefirstavatar($projectid);
     
      echo "1";
  }
  
if($this->upload->do_upload($productpic1)){

     $this->load->library('session');
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
    
     $this->users_model->changesecondavatar($projectid);
     
      echo "1";
  }

if($this->upload->do_upload($productpic2)){

     $this->load->library('session');
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
    
     $this->users_model->changethirdavatar($projectid);
     
      echo "1";
  }

if($this->upload->do_upload($productpic3)){

     $this->load->library('session');
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
    
     $this->users_model->changefourthavatar($projectid);
     
      echo "1";
  }

if($this->upload->do_upload($productpic4)){

     $this->load->library('session');
     $project = $this->input->post("project");
     $username = $this->session->userdata('username');
     $id = $this->users_model->get_developer($username);
     $projectid = $this->users_model->get_projectid($id ,$project);
    
     $this->users_model->changefifthavatar($projectid);
     
      echo "1";
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
