<?php
class student_model extends CI_Model {
    private $username;
    private $vacancyid;
 
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

    public function get_student($username){
    $query = $this->db->query("select * from student_details,user where user.userid = 
   student_details.user_id and user.username = '".$username."'");
    return $query->result_array();}

    public function get_studentprofile($userid){
    $query = $this->db->query("select * from student_details,user where user.userid = 
   student_details.user_id and user.userid = '".$userid."'");
    return $query->result_array();}

    public function get_userid($username){
    $query = $this->db->query("select userid from user where user.username = '".$username."'");
     $query->result();
        foreach ($query->result() as $row)
        {
            return $row->userid;
        }
    }

     public function get_studentid($username){
    $query = $this->db->query("select student_id from student_details ,
      user where student_details.user_id =user.userid and user.username = '".$username."'");
    
    $query->result();
    
        foreach ($query->result() as $row)
        {
            return $row->student_id;
        }
    }

     public function check_student($username){
      $userid =$this->get_userid($username);


    $query = $this->db->query("select user_id from student_details where user_id = '".$userid['0']."'");
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
   public function check_application($vacancyid){
        $this->load->library('session');
   
        $user_id =$this->get_userid($this->session->userdata('username'));
    

    $query = $this->db->query("select * from internship_application where user_id = '".$user_id."' and vacancy_id = '".$vacancyid."'");
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
      public function check_fapplication($vacancyid){
        $this->load->library('session');
   
        $user_id =$this->get_userid($this->session->userdata('username'));
    

    $query = $this->db->query("select * from fellowship_application where user_id = '".$user_id."' and vacancy_id = '".$vacancyid."'");
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

       public function apply_fellowship($vacancyid) {

      $this->load->library('session');
      $this->load->helper('url');
   
        $result = $this->check_fapplication($vacancyid);
        $application_status ="pending";
        $user_id =$this->get_userid($this->session->userdata('username'));
        $applicant_skills = $this->input->post("applicant_skills");
        $relevantinformation = $this->input->post("relevantinformation");
        $internshiprequirements = $this->input->post("applicant_requirements");
        $research_title = $this->input->post("research_title");
        $sponsor = $this->input->post("sponsor");
        $sponsor_contact = $this->input->post("sponsor_contact");

        
          if(count($result)>0){


            
           $sqll = "UPDATE  fellowship_application SET applicant_skills = '$applicant_skills',relevantinformation = '$relevantinformation'
            ,research_title ='$research_title'
            ,sponsor ='$sponsor',sponsor_contact ='$sponsor_contact' WHERE user_id = '$user_id'
              AND vacancy_id = '$vacancyid'";
                   $this->db->query($sqll);
                   }
          else{


            
           $sqll = "INSERT INTO fellowship_application (vacancy_id,applicant_skills,relevantinformation,
            application_status,user_id,research_title,sponsor,sponsor_contact) " .
            "VALUES (" . $this->db->escape($vacancyid) . ",".$this->db->escape($applicant_skills) .",".$this->db->escape($relevantinformation).
              ",".$this->db->escape($application_status).",".$this->db->escape($user_id).",".$this->db->escape($research_title).",".$this->db->escape($sponsor).","
              .$this->db->escape($sponsor_contact).");";
            $this->db->query($sqll);
          }
                


    }
       public function apply_internship($vacancyid) {

      $this->load->library('session');
      $this->load->helper('url');
   
        $result = $this->check_application($vacancyid);
        $application_status ="pending";
        $user_id =$this->get_userid($this->session->userdata('username'));
        $applicant_skills = $this->input->post("applicant_skills");
        $relevantinformation = $this->input->post("relevantinformation");
       $internshiprequirements = $this->input->post("applicant_requirements");
        
        
          if(count($result)>0){


            
           $sqll = "UPDATE  internship_application SET applicant_skills = '$applicant_skills',relevantinformation = '$relevantinformation'
            WHERE user_id = '$user_id'
              AND vacancy_id = '$vacancyid'";
                   $this->db->query($sqll);
                   }
          else{


            
           $sqll = "INSERT INTO internship_application (vacancy_id,applicant_skills,relevantinformation,
            application_status,user_id) " .
            "VALUES (" . $this->db->escape($vacancyid) . ",".$this->db->escape($applicant_skills) .",".$this->db->escape($relevantinformation).
              ",".$this->db->escape($application_status).",".$this->db->escape($user_id).");";
            $this->db->query($sqll);
          }
                


    }

    public function editstudentdetails(){

        $this->load->library('session');
        $this->load->helper('url');
        $application_status ="pending";
        $user_id =$this->get_userid($this->session->userdata('username'));
        $student_id = $this->input->post("student_id");
        $student_name = $this->input->post("student_name");
        $student_gender = $this->input->post("student_gender");
        $student_dob = $this->input->post("student_dob");
        $student_email = $this->input->post("student_email");
        $student_phone = $this->input->post("student_phone");
        $student_nationality = $this->input->post("student_nationality");
        $student_nextofkin = $this->input->post("student_nextofkin");
        $student_nextofkincontact = $this->input->post("student_nextofkincontact");
        $student_institution = $this->input->post("student_institution");
        $student_fieldofstudy = $this->input->post("student_fieldofstudy");
      
              

            $sql = "UPDATE student_details set student_id ='$student_id',
            student_name ='$student_name',
            student_gender ='$student_gender' ,student_dob ='$student_dob',
            student_email='$student_email',student_phone='$student_phone',
            student_nationality='$student_nationality',student_nextofkin='$student_nextofkin',
            student_nextofkincontact='$student_nextofkincontact',student_institution='$student_institution',
            student_fieldofstudy='$student_fieldofstudy' WHERE user_id =".$user_id."";

            $this->db->query($sql);

    }
       public function iuploadcover($vacancyid){
       $upload_data = $this->upload->data(); 
        $applicant_coverletter =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlapplicant_coverletter = base_url("assets/coverletter/".$applicant_coverletter); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE internship_application SET applicant_coverletter = '".$urlapplicant_coverletter ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
        $this->db->query($sql);
    

   }
     public function iuploadcv($vacancyid){
       $upload_data = $this->upload->data(); 
        $applicant_curriculumvitae =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlapplicant_curriculumvitae = base_url("assets/cv/".$applicant_curriculumvitae); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE internship_application SET  curriculumvitae = '".$urlapplicant_curriculumvitae ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
        $this->db->query($sql);
    

   }
    public function iuploadil($vacancyid){
       $upload_data = $this->upload->data(); 
        $introductionletter =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlintroductionletter = base_url("assets/cv/".$introductionletter); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE internship_application SET  introductionletter = '".$urlintroductionletter ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
        $this->db->query($sql);
    

   }

   public function uploadcover($vacancyid){
       $upload_data = $this->upload->data(); 
        $applicant_coverletter =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlapplicant_coverletter = base_url("assets/coverletter/".$applicant_coverletter); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE fellowship_application SET applicant_coverletter = '".$urlapplicant_coverletter ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
        $this->db->query($sql);
    

   }
     public function uploadcv($vacancyid){
       $upload_data = $this->upload->data(); 
        $applicant_curriculumvitae =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlapplicant_curriculumvitae = base_url("assets/cv/".$applicant_curriculumvitae); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE fellowship_application SET  curriculumvitae = '".$urlapplicant_curriculumvitae ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
        $this->db->query($sql);
    

   }
    public function uploadil($vacancyid){
       $upload_data = $this->upload->data(); 
        $introductionletter =   $upload_data['file_name'];
        $this->load->helper('url');
        $urlintroductionletter = base_url("assets/cv/".$introductionletter); 
      
        $this->load->library('session');
        $userid =$this->get_userid($this->session->userdata('username'));
        
     $sql = "UPDATE fellowship_application SET  introductionletter = '".$urlintroductionletter ."' where user_id = '".$userid ."' and vacancy_id ='".$vacancyid."'";
    
    
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
            $student_id = $this->input->post("student_id");
            $username = $this->input->post("username");
            $fullname = $this->input->post("name");
            $sex = $this->input->post("gender");
            $email = $this->input->post("email");
            $about = $this->input->post("about");
            $country = $this->input->post("country");
            $bday = $this->input->post("DOB");
            $institution =$this->input->post("institution");
            $phone_number =$this->input->post("phone_number");
            $userid = $this->get_userid($user);
         

     $sql = "UPDATE student_details ,user SET user.username = ". $this->db->escape($username) . ",
     student_biography = " . $this->db->escape($about) . ",student_id = " . $this->db->escape($student_id) . ",student_email = " . $this->db->escape($email). ",useremail = " . $this->db->escape($email) .",student_gender = " . $this->db->escape($sex) . ",
     student_nationality = " . $this->db->escape($country) . ",
     student_dob = " . $this->db->escape($bday) ." ,student_phone = " . $this->db->escape($phone_number)  . ",student_institution = " . $this->db->escape($institution) . ",
     student_name = " . $this->db->escape($fullname) ." where user.username ='".$user ."' and  student_details.user_id =". $this->db->escape($userid['0']);
     
     if($this->check_student($user) == null){

        $id = $this->get_userid($user);
       
         $this->db->query("INSERT INTO student_details (user_id) VALUES (".$id['0'].")");
  
         $this->db->query($sql);
      
 
     }
     else{
      $this->db->query($sql);
      
     }

     
    } 

    //projects 

    public function get_projectid($project){
        $this->load->library('session');
        $username = $this->session->userdata('username');
        $student_id = $this->get_studentid($username);
     
         $query = $this->db->query("select project_id from project where student_id = '".$student_id."' 
          and project_name = '".$project."'");
        
         $query->result();
      
      foreach ($query->result() as $row)
        {
            return $row->project_id;
        }
   
      }
    public function get_projects($username){
        $student_id = $this->get_studentid($username);
        $query = $this->db->query('select * from project,user,student_details
         where user.username = "'.$username .'" and user.userid = student_details.user_id and 
         project.student_id = student_details.student_id');
    return $query->result_array();}

    public function get_studentprojects(){
        $query = $this->db->query('select * from project,user,student_details
         where user.userid = student_details.user_id and 
         project.student_id = student_details.student_id');
    return $query->result_array();}

    public function get_project($project_id){
        $query = $this->db->query('select * from project,user,student_details
         where project.project_id = "'.$project_id .'"');
    return $query->result_array();}

    public function get_projecttasks($project_id){
        $query = $this->db->query('select * from project_tasks where project_tasks.project_id = "'.$project_id.'"');
        echo ('select * from project_tasks where project_tasks.project_id = "'.$project_id.'"');
    return $query->result_array();}


    public function addproject() {
        $this->load->library('session');
        $username = $this->session->userdata('username');
    
        $category = $this->input->post("category");
        $desc = $this->input->post("desc");
        $name = $this->input->post("name");
         
        $user =$this->session->userdata('username');
          $student_id = $this->get_studentid($username);
   
        $sql = "INSERT INTO project (project_name,project_description,project_category,student_id) " .
        "VALUES (" . $this->db->escape($name) . ",".$this->db->escape($desc) .",
           ".$this->db->escape($category) .
         ",".$this->db->escape($student_id) .
         ")";

          $this->db->query($sql);
      }
    public function editproject( ) {
        $this->load->library('session');
     
        $product =  $this->input->post("selectproject");
        $category = $this->input->post("category");
        $desc = $this->input->post("desc");
        $name = $this->input->post("name");
       
        $user =$this->session->userdata('username');
        $student_id = $this->get_studentid($user);
   
      $sql = "UPDATE project SET project_name = ".$this->db->escape($name)  . ",
     project_description = " . $this->db->escape($desc)  . ",project_category = " . $this->db->escape($category) 
     . 
     " where project_name = '".$product ."' and student_id = " . $this->db->escape($student_id);
   $this->db->query($sql);

        
      }
     public function deleteproject( ) {
        $this->load->library('session');
     
        $product =  $this->input->post("project");
        $user =$this->session->userdata('username');
        $student_id = $this->get_studentid($user);
   
      $sql = "delete from project where student_id = " . $this->db->escape($student_id)  . "
       and project_name = '".$product ."'";
      $this->db->query($sql);

        
      }

      
      public function add_tool($product_id){
         $s_date = $this->input->post("s_date");
         $e_date = $this->input->post("e_date");
         $tasks = $this->input->post("tasks");
         
         $sql = "INSERT INTO project_tasks (project_id,tasks,s_date,e_date) " .
            "VALUES (" . $this->db->escape($product_id) . ",".$this->db->escape($tasks). ",".$this->db->escape($s_date)
              . ",".$this->db->escape($e_date).")";
            $this->db->query($sql);
       }   

    



}