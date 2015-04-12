<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
private $username;

    public function __construct()
    {
    parent::__construct();
    $this->load->model('users_model');
    
    }

	public function index()
	{
	     
	    $this->load->library('session');
    if($this->session->userdata('logged_in') == "TRUE") {
      $this->dashboard();
 
    }
    else{
      $data['success']=("") ;
  	  $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'Username ', 'required'); 
      $this->form_validation->set_rules('password', 'Password  ', 'required'); 
                      

    if ($this->form_validation->run() == FALSE){
 
       $this->load->view('includes/header');
       $this->load->view('login',$data);
       $this->load->view('includes/footer');   
     
    }
    else {
       $passw = $this->users_model->logindetails();
       $usertype = $this->users_model-> usertype();
       if(md5($this->input->post("password")) == $passw){
          $this->load->library('session');
          $newdata = array(
                'username'  => $this->input->post("username"),
                'logged_in' => TRUE,
                'usertype' => $usertype
               );

        $this->session->set_userdata($newdata);
        $users = $this->session->all_userdata();
        $this->dashboard();
        }

    else{
       $data['success']= ("Login Failed !") ;
       $this->load->view('includes/header');
       $this->load->view('login' ,$data);
	   $this->load->view('includes/footer');   
      }
        
      }
    }		
  }

  	public function dashboard(){
    $this->load->library('session');
    
    $this->load->helper('url');
    
   $data['profile'] = $this->users_model->get_user($this->session->userdata('username'));

   if($data['profile']['0']['account_type'] == "admin"){


  	  header('Location:'.base_url('index.php/admin'));

   }
   else if ($data['profile']['account_type'] == "supervisor") {

   		
  	  header('Location:'.base_url('index.php/supervisor'));

   }
   else{
		header('Location:'.base_url('index.php/student'));  
   }
    	}

  	public function logout(){
  		$this->load->library('session');
        $newdata = array(
        'logged_in' => FALSE);

        $this->session->set_userdata($newdata);
   		
   		$this->index();
   		
  	}




	public function register()
	{
		 $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username ', 'required'); 
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password  ', 'required'); 
			$this->form_validation->set_rules('cpassword', 'C Password  ', 'required'); 
                            

    if ($this->form_validation->run() == FALSE){
     $data['success']=("") ;
 
    $this->load->view('includes/header');
    $this->load->view('register' , $data);
    $this->load->view('includes/footer');
	
    }
    else {
    	if(set_value('password') === set_value('cpassword')){

    			$data['success']= ("Registration success") ;
     $this->users_model->registeruser();
     $this->load->view('includes/header');
     $this->load->view('login' ,$data);
     $this->load->view('includes/footer');
		
    	}
    	else{

    		$data['success'] =('Password and Confirmation password do not match ');

    			$this->load->view('includes/header');
    			$this->load->view('register' , $data);
    			$this->load->view('includes/footer');
			

    	}
     	
    }
	
}

  
  public function changepassword()
  {
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password  ', 'required'); 
      $this->form_validation->set_rules('cpassword', 'C Password  ', 'required'); 
                            

    if ($this->form_validation->run() == FALSE){
     $data['success']=("") ;
 
          echo "3";  
    }
    else {
      if(set_value('password') === set_value('cpassword')){

           $this->users_model->changepassword();
              echo "1";          
      }
      else{
            
            echo "0";      

      }
      
    }
  
}

}

