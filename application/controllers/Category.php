<?php

class Category extends CI_Controller{
    public function create(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'Create Category',
            'display_title' => 'All Categories',
            'categories' => $this->CategoryModel->displayCat(),
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run()  === FALSE){
        
        $this->load->view('templetes/header.php', $data);
        $this->load->view('category/create_cat');
        $this->load->view('templetes/footer'); 

        }else{
            $this->CategoryModel->CreateCat();
            redirect('dashboard/category?success');
        }
        
    }
    
    public function delete($id){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $this->CategoryModel->deleteCat($id);
        redirect('dashboard/category?deleted');
    }

    public function edit($id){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'Edit Category',
            'post' => $this->CategoryModel->displayCat($id),
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->form_validation->set_rules('name', 'Name', 'required');

        if($this->form_validation->run() === FALSE){
        
        $this->load->view('templetes/header.php', $data);
        $this->load->view('category/editCat');
        $this->load->view('templetes/footer.php');
        }else{
            $this->CategoryModel->editCat();
            redirect('dashboard/category?edit_success');
        }
        
    }

    public function headerCat(){
        $data = [
            'title' => 'All Categories',
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->load->view('templetes/header.php', $data);
        $this->load->view('category/showCat');
        $this->load->view('templetes/footer.php');

    }

    public function postCat($id){
        $data = [
            'title' => $this->CategoryModel->get_category($id)->name,
            'head' => $this->CategoryModel->displayCat(),
            'posts' => $this->NewsModel->display_post_by_cat_id($id)
        ];
        $this->load->view('templetes/header.php', $data);
        $this->load->view('pages/blog');
        $this->load->view('templetes/footer.php');

    }
}