<?php
class users_model extends CI_Model {
    private $username;
 
 public function __construct(){
    $this->load->database();     }


  public function get_user($username){
    $query = $this->db->query("select * from user where user.username = '".$username."'");
    return $query->result_array();}

   public function get_emails(){
    $query = $this->db->query("select email from user");
    return $query->result_array();
  }

  public function get_email(){
    $user = $this->input->post("user"); 
    $query = $this->db->query("select useremail from user where username = '".$user."'");
    return $query->result_array();
  }

   public function registeruser() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $useremail = $this->input->post("email");

    
            $sql = "INSERT INTO user (username,useremail,password) " .
            "VALUES (" . $this->db->escape($username) . ",".$this->db->escape($useremail) .",".$this->db->escape(md5($password)) .")";
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
public function usertype() {
        $username = $this->input->post("username");
        $query = $this->db->query("select * from user where username = '".$username ."'");
                foreach ($query->result() as $row)
            {
            return $row->account_type;
            }
    }
public function changepassword(){
      $this->load->library('session');
      $user =$this->session->userdata('username');
      $password = $this->input->post("password");

      $sql= "UPDATE user set password = ".$this->db->escape(md5($password))."where username = '".$user."'";

      $this->db->query($sql);   

}
    



}