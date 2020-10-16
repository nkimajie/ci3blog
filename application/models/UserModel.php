<?php

class UserModel extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function RegisterUser($password){
        
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $password
        );

        return $this->db->insert('users', $data);
        
    }


    public function get_users($user_id){

        $this->db->where('id', $user_id);

        $query = $this->db->get('users');

        return $query->result();
    }

    // check if user name is already taken

    public function check_email_exists($email){

        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->result_array())){
            return true;
        }else{
            return false;
        }

    }

    public function LoginUser($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else{
            return false;
        }

    }
    
}