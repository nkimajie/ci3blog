<?php

class Dashboard extends CI_Controller {
    public function index(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'Dashboard',
            'post' => $this->NewsModel->get_posts(),
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->load->view('templetes/header', $data);
        $this->load->view('pages/dashboard');
        $this->load->view('templetes/footer');
    }

    public function allPost(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'All Post',
            'post' => $this->NewsModel->get_posts(),
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->load->view('templetes/header', $data);
        $this->load->view('pages/allpost');
        $this->load->view('templetes/footer');
    }
}