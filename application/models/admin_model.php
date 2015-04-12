<?php
class admin_model extends CI_Model {
    private $username;
    private $request_id;

 
 public function __construct(){
    $this->load->database();     }


  public function get_admin($username){
    $query = $this->db->query("select * from user where user.username = '".$username."'");
    return $query->result_array();}

  public function get_supervisors(){
    $query = $this->db->query("select * from user where user.account_type = "."'supervisor'");
    return $query->result_array();}
//charts
  public function get_maleinterndistribution(){
    $query = $this->db->query("select count(*) as number , vacancy_request.sd_unit from contract,student_details,vacancy_request,supervisor_allocation,supervisor 
      where student_details.student_gender='male'and vacancy_request.`request_type`=  'intern' and vacancy_request.supervisor_id = supervisor_allocation.supervisor_id and
       supervisor_allocation.student_id = student_details.student_id and supervisor.supervisor_id = supervisor_allocation.supervisor_id GROUP BY  vacancy_request.sd_unit");
    return $query->result_array();

  }

  public function get_femaleinterndistribution(){
    $query = $this->db->query("select count(*) as number , vacancy_request.sd_unit from contract,student_details,vacancy_request,supervisor_allocation,supervisor 
      where student_details.student_gender='female'and vacancy_request.`request_type`=  'fellow' and vacancy_request.supervisor_id = supervisor_allocation.supervisor_id and
       supervisor_allocation.student_id = student_details.student_id and supervisor.supervisor_id = supervisor_allocation.supervisor_id GROUP BY  vacancy_request.sd_unit");
    return $query->result_array();

  }

  public function get_malefellowdistribution(){
    $query = $this->db->query("select count(*) as number , vacancy_request.sd_unit from contract,student_details,vacancy_request,supervisor_allocation,supervisor 
      where student_details.student_gender='male'and vacancy_request.`request_type`=  'fellow' and vacancy_request.supervisor_id = supervisor_allocation.supervisor_id and
       supervisor_allocation.student_id = student_details.student_id and supervisor.supervisor_id = supervisor_allocation.supervisor_id GROUP BY  vacancy_request.sd_unit");
    return $query->result_array();

  }

  public function get_femalefellowdistribution(){
    $query = $this->db->query("select count(*) as number , vacancy_request.sd_unit from contract,student_details,vacancy_request,supervisor_allocation,supervisor 
      where student_details.student_gender='female'and vacancy_request.`request_type`=  'intern' and vacancy_request.supervisor_id = supervisor_allocation.supervisor_id and
       supervisor_allocation.student_id = student_details.student_id and supervisor.supervisor_id = supervisor_allocation.supervisor_id GROUP BY  vacancy_request.sd_unit");
    return $query->result_array();

  }
  public function get_fapplications(){
     $query = $this->db->query(" SELECT  COUNT(*) as number , MONTH(application_date) as MONTH , YEAR(application_date) AS YEAR
      FROM `fellowship_application`  GROUP BY YEAR(application_date) , MONTH(application_date) ORDER BY YEAR(application_date) ASC ");
       return $query->result_array();
  }
   public function get_iapplications(){
     $query = $this->db->query(" SELECT  COUNT(*) as number , MONTH(application_date) as MONTH , YEAR(application_date) AS YEAR
      FROM `internship_application`  GROUP BY YEAR(application_date) , MONTH(application_date) ORDER BY YEAR(application_date) ASC ");
       return $query->result_array();
  }
 public function get_frequests(){
     $query = $this->db->query(" SELECT  COUNT(*) as number , MONTH(request_date) as MONTH , YEAR(request_date) AS YEAR
      FROM `vacancy_request` WHERE request_type ='fellow' GROUP BY YEAR(request_date) , MONTH(request_date) ORDER BY YEAR(request_date) ASC ");
       return $query->result_array();
  }
   public function get_irequests(){
     $query = $this->db->query(" SELECT  COUNT(*) as number , MONTH(request_date) as MONTH , YEAR(request_date) AS YEAR
      FROM `vacancy_request` WHERE request_type ='intern' GROUP BY YEAR(request_date) , MONTH(request_date) ORDER BY YEAR(request_date) ASC ");
       return $query->result_array();
  } 

//requests
  public function get_pendinginternrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_ongoinginternrequests(){
    $query = $this->db->query("select * from vacancy,vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'ongoing'"
      ."and vacancy_request.request_user =  user.userid and vacancy.request_id != vacancy_request.request_id");
    return $query->result_array();}

  public function get_processedinternrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'intern'"."and request_status = "."'processed'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_ongoingfellowrequests(){
    $query = $this->db->query("select * from vacancy,vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'ongoing'"
      ."and vacancy_request.request_user =  user.userid and vacancy.request_id != vacancy_request.request_id");
    return $query->result_array();}


  public function get_pendingfellowrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'pending'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

  public function get_processedfellowrequests(){
    $query = $this->db->query("select * from vacancy_request,user where vacancy_request.request_type = "."'fellow'"."and request_status = "."'processed'"
      ."and vacancy_request.request_user =  user.userid");
    return $query->result_array();}

//applications 
  public function get_fellowshipapplication($application_id){
    $query = $this->db->query("select * from vacancy,user,fellowship_application,student_details where fellowship_application.vacancy_id = vacancy.vacancy_id and application_status = "."'pending'"
      ."and fellowship_application.user_id =  user.userid and user.userid = student_details.user_id and application_id ='".$application_id."'");
    return $query->result_array();}

  public function shortlist_fapplication($application_id){
    $sql = "UPDATE fellowship_application SET application_status = 'shortlist' WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }

  public function accept_fapplication($application_id ,$supervisor_id,$student_id){
    $sql = "UPDATE fellowship_application SET application_status = 'accepted' WHERE application_id = '".$application_id."'";

    $this->db->query($sql);



    $check = $this->db->query("SELECT * from supervisor_allocation where supervisor_id = '".$supervisor_id."' and student_id = '".$student_id."'");

     if ($check->result_array() == null ){
          
 
            $query ="INSERT INTO supervisor_allocation(supervisor_id,student_id)"."VALUES (".$this->db->escape($supervisor_id).
              ",".$this->db->escape($student_id). ")" ;

            $this->db->query($query);
      
     }
  }

  public function reject_fapplication($application_id){
    $sql = "UPDATE fellowship_application SET application_status = 'reject' WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }

  public function delete_fapplication($application_id){
    $sql = "DELETE FROM fellowship_application  WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }

   public function get_pendingfellowshipapplications(){
    $query = $this->db->query("select * from vacancy,user,fellowship_application,student_details where fellowship_application.vacancy_id = vacancy.vacancy_id and application_status = "."'pending'"
      ."and fellowship_application.user_id =  user.userid and user.userid = student_details.user_id ");
    return $query->result_array();}
  
   public function get_ongoingfellowshipapplications(){
    $query = $this->db->query("select * from vacancy,user,fellowship_application,student_details,vacancy_request where fellowship_application.vacancy_id = vacancy.vacancy_id and application_status = "."'shortlist'"
      ."and fellowship_application.user_id =  user.userid and user.userid = student_details.user_id and vacancy.request_id = vacancy_request.request_id ");
    return $query->result_array();}

   public function get_processedfellowshipapplications(){
    $query = $this->db->query("select * from vacancy,user,fellowship_application,student_details where fellowship_application.vacancy_id = vacancy.vacancy_id and application_status = "."'accepted'"
      ."and fellowship_application.user_id =  user.userid and user.userid = student_details.user_id ");
    return $query->result_array();}


  public function get_internshipapplication($application_id){
    $query = $this->db->query("select * from vacancy,user,internship_application,student_details where internship_application.vacancy_id = vacancy.vacancy_id 
    and internship_application.user_id =  user.userid and user.userid = student_details.user_id and `application_id`= '".$application_id."'");
    return $query->result_array();}

  public function shortlist_iapplication($application_id){
    $sql = "UPDATE internship_application SET application_status = 'shortlist' WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }

  public function delete_iapplication($application_id){
    $sql = "DELETE FROM internship_application  WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }


  public function accept_iapplication($application_id ,$supervisor_id,$student_id){
    $sql = "UPDATE internship_application SET application_status = 'accepted' WHERE application_id = '".$application_id."'";
    $this->db->query($sql);

    $check = $this->db->query("SELECT * from supervisor_allocation where supervisor_id = '".$supervisor_id."' and student_id = '".$student_id."'");

     if ($check->result_array() == null ){
          
 
            $query ="INSERT INTO supervisor_allocation(supervisor_id,student_id)"."VALUES (".$this->db->escape($supervisor_id).
              ",".$this->db->escape($student_id). ")" ;

            $this->db->query($query);

     }
 

  }

  public function reject_iapplication($application_id){
    $sql = "UPDATE internship_application SET application_status = 'reject' WHERE application_id = '".$application_id."'";
    $this->db->query($sql);
  }
  public function get_pendinginternshipapplications(){
  $query = $this->db->query("select * from vacancy,user,internship_application,student_details where internship_application.vacancy_id = vacancy.vacancy_id 
    and internship_application.user_id =  user.userid and user.userid = student_details.user_id and `application_status`= 'pending'");
  return $query->result_array();}

   public function get_ongoinginternshipapplications(){
  $query = $this->db->query("select * from vacancy,user,internship_application,student_details,vacancy_request where internship_application.vacancy_id = vacancy.vacancy_id 
    and internship_application.user_id =  user.userid and user.userid = student_details.user_id and vacancy_request.request_id = vacancy.request_id and `application_status`= 'shortlist'");
  return $query->result_array();}


   public function get_processedinternshipapplications(){
  $query = $this->db->query("select * from vacancy,user,internship_application,student_details where internship_application.vacancy_id = vacancy.vacancy_id 
    and internship_application.user_id =  user.userid and user.userid = student_details.user_id and `application_status`= 'accepted'");
  return $query->result_array();}

   public function registersupervisor() {
        $username = $this->input->post("username");
        $useremail = $this->input->post("email");

    
            $sql = "INSERT INTO user (username,useremail,account_type,password) " .
            "VALUES (" . $this->db->escape($username) . ",".$this->db->escape($useremail) .",".$this->db->escape('supervisor') .",".$this->db->escape(md5("password")) .")";
            $this->db->query($sql);

    }
  public function deletesupervisor($userid){

            $sql = "DELETE FROM user WHERE userid = '" .$userid."'";
            $this->db->query($sql);
  }

  public function load_supervisors(){
    

    $query = $this->db->query('select * from user where account_type = '.'"supervisor"');
    return $query->result_array();
 

  }
  //add contract

   public function add_contract() {
        $student_id = $this->input->post("student_id");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $tor = $this->input->post("tor");


    
            $sql = "INSERT INTO contract (student_id,bdate,edate,tor,contract_status) " .
            "VALUES (" . $this->db->escape($student_id) . ",".$this->db->escape($startdate) 
              .",".$this->db->escape($enddate) .",".$this->db->escape($tor) .",".$this->db->escape('ongoing') .")";
            $this->db->query($sql);

            $query = "UPDATE student_details SET student_state = 'oncontract' WHERE student_id = '".$student_id."'";
            $this->db->query($query);

    }       

  public function get_contracts(){
      
    $query = $this->db->query('select * from contract,student_details where student_details.student_id = contract.student_id');
    return $query->result_array();

  }

  public function load_contract($contract_id){
    $query = 
    $this->db->query('select * from contract,student_details 
      where student_details.student_id = contract.student_id and contract_id ="'.$contract_id.'"');
      
    return $query->result_array();
    }
  public function renew_contract($contract_id){
      
        $student_id = $this->input->post("student_id");
        $startdate = $this->input->post("startdate");
        $enddate = $this->input->post("enddate");
        $tor = $this->input->post("tor");


    
            $sql = "UPDATE contract SET bdate = '".$startdate."' , edate = '".$enddate."', tor ='".$tor."' 
            where contract_id = '".$contract_id."'";
            $this->db->query($sql);    
  }


  public function get_contractdetails($student_id){
      $query = 
    $this->db->query('select * from contract,student_details,vacancy_request,supervisor_allocation,supervisor 
      where student_details.student_id="'.$student_id.'" and vacancy_request.supervisor_id = supervisor_allocation.supervisor_id and
       supervisor_allocation.student_id = student_details.student_id and supervisor.supervisor_id = supervisor_allocation.supervisor_id');
      
    return $query->result_array();
    
  }

  public function check_student($student_id){


    $query = $this->db->query('select * from student_details where student_id = "'.$student_id .'"');
    return $query->result_array();
  }

  
 //clearance

    public function clear_student(){
      
        $student_id = $this->input->post("student_id");
        $cdate = $this->input->post("cdate");
        
            $sql = "INSERT INTO alumni_student (student_id,cdate) " .
            "VALUES (" . $this->db->escape($student_id) .
             ",".$this->db->escape($cdate) .")";
            

        $this->db->query($sql);

            $query = ("UPDATE student_details SET student_state='alumni' WHERE student_id ='".$student_id."'");
            $this->db->query($query);

  }
    public function check_contractdates($student_id){
     $query = $this->db->query('select * from contract where student_id = "'.$student_id .'"');
    return $query->result_array();
  }

    public function check_alumni($student_id){
     $query = $this->db->query('select * from alumni_student where student_id = "'.$student_id .'"');
    return $query->result_array();
  }

  //alumni
   public function alumni_interns(){
  $query = $this->db->query("select * from vacancy,user,internship_application,student_details,alumni_student,contract where internship_application.vacancy_id = vacancy.vacancy_id 
    and internship_application.user_id =  user.userid and user.userid = student_details.user_id and `student_state`= 'alumni' 
    and student_details.student_id = alumni_student.student_id and contract.student_id = student_details.student_id and internship_application.application_status ='accepted'  ");
  return $query->result_array();}

     public function alumni_fellows(){
  $query = $this->db->query("select * from vacancy,user,fellowship_application,student_details,alumni_student,contract where fellowship_application.vacancy_id = vacancy.vacancy_id 
    and fellowship_application.user_id =  user.userid and user.userid = student_details.user_id and `student_state`= 'alumni' 
    and student_details.student_id = alumni_student.student_id and contract.student_id = student_details.student_id and fellowship_application.application_status ='accepted'  ");
  return $query->result_array();}

  //vacancies
  public function open_vacancy($request_id) {
        $vacancy_title = $this->input->post("vacancy_title");
        $vacancy_description = $this->input->post("vacancy_description");
        $application_deadline = $this->input->post("application_deadline");
        $position_startdate = $this->input->post("position_startdate");
        $position_enddate = $this->input->post("position_enddate");
        $vacancy_status="open";
            
    
            $sql = "INSERT INTO vacancy (request_id,vacancy_title,vacancy_status,vacancy_description,application_deadline,position_startdate,position_enddate) " .
            "VALUES (" . $this->db->escape($request_id) . ",".$this->db->escape($vacancy_title) .",".$this->db->escape($vacancy_status) .","
            .$this->db->escape($vacancy_description) .",".$this->db->escape($application_deadline) .",".$this->db->escape($position_startdate) .",".$this->db->escape($position_enddate) .")";
            $this->db->query($sql);

            $query = "UPDATE vacancy_request set request_status = 'ongoing' where request_id = '".$request_id."'";
            $this->db->query($query);


    }
  public function check_vacancy($request_id){
       $query = $this->db->query("select * from vacancy where vacancy.request_id = '".$request_id."'");
    return $query->result_array();
  }

  public function load_ivacancies(){

    $query = $this->db->query('select * from vacancy,vacancy_request where vacancy.request_id = vacancy_request.request_id and vacancy_request.request_type ='.'"intern"'.'and vacancy.vacancy_status='.'"open" and application_deadline >= CURDATE()');
    return $query->result_array();

  }

  public function load_fvacancies(){
      
    $query = $this->db->query('select * from vacancy,vacancy_request where vacancy.request_id = vacancy_request.request_id and vacancy_request.request_type ='.'"fellow"'.'and vacancy.vacancy_status='.'"open" and application_deadline >= CURDATE()');
    return $query->result_array();

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
public function changecoveravatar() {
        $upload_data = $this->upload->data(); 
        $ppic =   $upload_data['file_name'];
        $this->load->helper('url');
        $pic = base_url("assets/img/users/".$ppic); 
        $this->load->library('session');
        $user =$this->session->userdata('username');
        
     $sql = "UPDATE developer_details SET coverphoto = '".$pic ."' where developer_details.username = '".$user ."'";
    
    
        $this->db->query($sql);
      }
public function changefirstavatar($projectid){
       
       $upload_data = $this->upload->data();
       $ppic =   $upload_data['file_name'];
       $pic = base_url("assets/img/projects/".$ppic); 
        
     $sql = "UPDATE portfolio SET product_pic = '".$pic ."' where product_id = '".$projectid ."'";
    
     $this->db->query($sql);
}


public function logindetails() {
        $username = $this->input->post("username");
        $query = $this->db->query("select * from user where username = '".$username ."'");
                foreach ($query->result() as $row)
            {
            return $row->password;
            }
    }
    function editdetails(){
        $this->load->library('session');
        $user =$this->session->userdata('username');
            $username = $this->input->post("username");
            $email = $this->input->post("email");
           
     $sql = "UPDATE user SET user.username = ". $this->db->escape($username) . ",
   useremail = " . $this->db->escape($email)  . " where user.username = '".$user ."'";
     $this->db->query($sql);

    }   
    



}