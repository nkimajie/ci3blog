<?php

class Users extends CI_Controller{


    public function login(){
        $data = [
            'head' => $this->CategoryModel->displayCat(),
            'title' => 'User Login'
        ];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
        
        $this->load->view('templetes/header', $data);
        $this->load->view('users/login_view');
        $this->load->view('templetes/footer'); 

        }else{
            //get email and encrypt password
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            //login user
            $user_id = $this->UserModel->LoginUser($email, $password);
            if($user_id){
                // start session
                $user_data = array(
                    'user_id' => $user_id,
                    'email' => $email,
                    'isLoggedIn' => true
                );
                $this->session->set_userdata($user_data);

                // flash message

                $this->session->set_flashdata('loggedIn', 'You Are Now LoggedIn');

                redirect(base_url('dashboard'));
            }else{
            $this->session->set_flashdata('invalid_login', 'Invalid Login Details');
            redirect(base_url('users/login'));
            }
        }

        
    }
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('isLoggedIn');
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('loggedOut', 'User Logged Out Successfully');
        redirect(base_url());
    }

    public function register(){
        $data = [
            'head' => $this->CategoryModel->displayCat(),
            'title' => 'Register User'
        ];
        // if($this->request->getMethod() === 'post'){
            $this->form_validation->set_rules('firstname', 'First Name', 'required|max_length[20]|min_length[3]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|max_length[20]|min_length[3]');
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[200]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templetes/header', $data);
                $this->load->view('users/register_view');
                $this->load->view('templetes/footer'); 
            }else{
                $password = md5($this->input->post('password'));
                $this->UserModel->RegisterUser($password);
                $this->session->set_flashdata('registration_successful', 'Registration Successful Please Login');
                redirect(base_url('users/login'));
            }
 
    }

    // check if user email is taken
    
    public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'This Email address is already registered');

        if($this->UserModel->check_email_exists($email)){
            return true;
        }else{
            return false;
        }
                
    }

    

}