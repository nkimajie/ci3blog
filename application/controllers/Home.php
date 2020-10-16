<?php


class Home extends CI_Controller{

    public function index(){
        // $data['title'] = 'Latest Post';
        // $data['posts'] = $this->NewsModel->get_posts();

        // $this->load->view('templetes/header');
        // $this->load->view('pages/home', $data);
        // $this->load->view('templetes/footer');
    }

    public function view($page = 'home'){
         if(! file_exists(APPPATH. 'views/pages/' .$page. '.php')){
             show_404();
         }
         $data['title'] = ucfirst($page);

        $this->load->view('templetes/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templetes/footer');

    }

    // public function create(){

    // }

    // public function login(){

    //     $data = [
    //         'main_view' => 'home'
    //     ];
    //     $this->load->view('templetes/header', $data);
    //     $this->load->view('users/login_view');
    //     $this->load->view('templetes/footer');
    // }

}