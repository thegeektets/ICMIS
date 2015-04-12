<?php
class supervisor_model extends CI_Model {
    private $username;
 
 public function __construct(){
    $this->load->database();     }
 
   public function get_emails(){
    $query = $this->db->query("select email from user");
    return $query->result_array();
  }

  public function get_email(){
    $user = $this->input->post("user"); 
    $query = $this->db->query("select email from user where username = '".$user."'");
    return $query->result_array();
  }

    public function get_supervisor($username){
    $query = $this->db->query("select * from supervisor,user where user.userid = 
   supervisor.user_id and user.username = '".$username."'");
    return $query->result_array();}

   public function get_userid($username){
    $query = $this->db->query("select userid from user where user.username = '".$username."'");
     $query->result();
        foreach ($query->result() as $row)
        {
            return $row->userid;
        }
    }

    public function check_supervisor($username){
      $userid =$this->get_userid($username);


    $query = $this->db->query("select user_id from supervisor where user_id = '".$userid['0']."'");
    $query->result();

        if($query->result() != null){

          foreach ($query->result() as $row)
        {
            return $row->user_id;
        }  
        
        }
        else{
          return null;
        }
        
    }


    public function get_skills($username){
    $query = $this->db->query("select * from skills where username = '".$username."'");
    return $query->result_array(); }

  
    public function get_projectid($id ,$project){

    $query = $this->db->query("select product_id from portfolio where developer_id = '".$id."' and product_name = '".$project."'");
    $query->result();
    foreach ($query->result() as $row)
        {
            return $row->product_id;
        }
   



    }
    public function add_tool($product_id){
         $project = $this->input->post("project");
         $tool = $this->input->post("tool");
         $username = $this->session->userdata('username');
         $sql = "INSERT INTO tools (product_id,tool) " .
            "VALUES (" . $this->db->escape($product_id) . ",".$this->db->escape($tool).")";
            $this->db->query($sql);
    }
    
   //student

   public function get_supervisorfellows(){
        $this->load->library('session');
        $user =$this->session->userdata('username');
          
        $userid = $this->get_userid($user);
 
          $query = $this->db->query('select * from student_details ,supervisor_allocation,vacancy_request,user where 
            student_details.student_id = supervisor_allocation.student_id and user.userid = student_details.user_id and 
            vacancy_request.supervisor_id ="'.$userid.'" and vacancy_request.request_type="fellow" and student_details.student_state ="ongoing"');
          return $query->result_array();

   }

   public function get_supervisorinterns(){
          $this->load->library('session');
        $user =$this->session->userdata('username');
          
        $userid = $this->get_userid($user);
 
          $query = $this->db->query('select * from student_details ,supervisor_allocation,vacancy_request,user where 
            student_details.student_id = supervisor_allocation.student_id and user.userid = student_details.user_id and 
            vacancy_request.supervisor_id ="'.$userid.'" and vacancy_request.request_type="intern" and student_details.student_state ="ongoing"');
          return $query->result_array();
   }

    public function get_projects($username){
        $developer_id = $this->get_developer($username);
        $query = $this->db->query('select * from portfolio,developer_details where developer_details.username = "'.$username .'" and developer_details.developer_id = portfolio.developer_id');
    return $query->result_array();}

   public function newinternrequest() {
        $this->load->library('session');
        $user =$this->session->userdata('username');
          
        $userid = $this->get_userid($user);

        $requesttype="intern";


        $skills = $this->input->post("skills");
        $number = $this->input->post("number");
        $education = $this->input->post("education");
        $summary = $this->input->post("summary");
        $purpose = $this->input->post("purpose");
        $sd_unit = $this->input->post("sd_unit");
        $provisions = $this->input->post("provisions");
        $costcenter = $this->input->post("costcenter");
        $region = $this->input->post("region");
        $country = $this->input->post("country");
        $tors = $this->input->post("tors");
        $expected = $this->input->post("expected");
        $fullname = $this->input->post("name");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $budgetholder = $this->input->post("budgetholder");
        $budgetholderemail = $this->input->post("budgetholderemail");
       
            $sql = "INSERT INTO vacancy_request (request_user,skills_experience,number_students,degree_level,summary,researchtitle_purposeinternship
              ,cost_center,supervisor_id,country,region,tor,expectedoutput,start_date,end_date,budget_holder,email_budget_holder,sd_unit,request_type) " .
            "VALUES (" . $this->db->escape($userid) . ",". $this->db->escape($skills) . ",". $this->db->escape($number) . ","
              . $this->db->escape($education) . ",". $this->db->escape($summary) . ",". $this->db->escape($purpose) 
              . ",".$this->db->escape($costcenter) .",". $this->db->escape($userid) . ",". $this->db->escape($country) 
              .",". $this->db->escape($region) . ",". $this->db->escape($tors) . ",". $this->db->escape($expected)
              .",". $this->db->escape($startdate) . ",". $this->db->escape($enddate) . "," . $this->db->escape($budgetholder) . ","
              . $this->db->escape($budgetholderemail) . ",". $this->db->escape($sd_unit) . ",". $this->db->escape($requesttype) .")";
            $this->db->query($sql);

            
    }
     public function get_irequests($username){
      $userid = $this->get_userid($username);
     
      $query = "select * from vacancy_request where request_type = 'intern' and supervisor_id ='".$userid."'";
     
     return $this->db->query($query)->result_array();}

     public function get_frequests($username){
      $userid = $this->get_userid($username);
     
      $query = "select * from vacancy_request where request_type = 'fellow' and supervisor_id ='".$userid."'";
     
     return $this->db->query($query)->result_array();}

 public function newfellowrequest() {
        $this->load->library('session');
        $user =$this->session->userdata('username');
          
        $userid = $this->get_userid($user);

        $requesttype="fellow";


        $skills = $this->input->post("skills");
        $number = $this->input->post("number");
        $education = $this->input->post("education");
        $summary = $this->input->post("summary");
        $purpose = $this->input->post("purpose");
        $sd_unit = $this->input->post("sd_unit");
        $provisions = $this->input->post("provisions");
        $costcenter = $this->input->post("costcenter");
        $region = $this->input->post("region");
        $country = $this->input->post("country");
        $tors = $this->input->post("tors");
        $expected = $this->input->post("expected");
        $fullname = $this->input->post("name");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $budgetholder = $this->input->post("budgetholder");
        $budgetholderemail = $this->input->post("budgetholderemail");
       
            $sql = "INSERT INTO vacancy_request (request_user,skills_experience,number_students,degree_level,summary,researchtitle_purposeinternship
              ,cost_center,supervisor_id,country,region,tor,expectedoutput,start_date,end_date,budget_holder,email_budget_holder,sd_unit,request_type) " .
            "VALUES (" . $this->db->escape($userid) . ",". $this->db->escape($skills) . ",". $this->db->escape($number) . ","
              . $this->db->escape($education) . ",". $this->db->escape($summary) . ",". $this->db->escape($purpose) 
              . ",".$this->db->escape($costcenter) .",". $this->db->escape($userid) . ",". $this->db->escape($country) 
              .",". $this->db->escape($region) . ",". $this->db->escape($tors) . ",". $this->db->escape($expected)
              .",". $this->db->escape($startdate) . ",". $this->db->escape($enddate) . "," . $this->db->escape($budgetholder) . ","
              . $this->db->escape($budgetholderemail) . ",". $this->db->escape($sd_unit) . ",". $this->db->escape($requesttype) .")";
            $this->db->query($sql);

            
    }

 
   public function changeuseravatar() {
     $upload_data = $this->upload->data(); 
      $ppic =   $upload_data['file_name'];
        $this->load->helper('url');
        $pic = base_url("assets/img/users/".$ppic); 
      
        $this->load->library('session');
        $user =$this->session->userdata('username');
        
     $sql = "UPDATE user SET user_avatar = '".$pic ."' where user.username = '".$user ."'";
    
    
        $this->db->query($sql);
      }

   public function editdetails(){
        $this->load->library('session');
        $user =$this->session->userdata('username');
            $username = $this->input->post("username");
            $fullname = $this->input->post("name");
            $sd_unit = $this->input->post("sd_unit");
            $email = $this->input->post("email");
            $phone_number =$this->input->post("phone_number");
            $userid = $this->get_userid($user);
         

     $sql = "UPDATE supervisor ,user SET user.username = ". $this->db->escape($username) . ",
     supervisor_email = " . $this->db->escape($email). ",useremail = " . $this->db->escape($email) .",sd_unit = " . $this->db->escape($sd_unit) . ",
     supervisor_phone = " . $this->db->escape($phone_number) . ",
     Name = " . $this->db->escape($fullname) .", user_id = ". $this->db->escape($userid['0']) . " where user.username ='".$user ."'";
     
     if($this->check_supervisor($username) != null){

      $this->db->query($sql);
 
     }
     else{

         $this->db->query("INSERT INTO supervisor (user_id) VALUES (".$userid['0'].")");
  
         $this->db->query($sql);
      
     }

     
    }   
 


}