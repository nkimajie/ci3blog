<?php

class Posts extends CI_Controller{
    public function index(){
        $data['title'] = 'Latest Post';
        $data['posts'] = $this->NewsModel->get_posts();
        $data['head'] = $this->CategoryModel->headerCat();

      

        $this->load->view('templetes/header', $data);
        $this->load->view('pages/blog');
        $this->load->view('templetes/footer');
    
    }

    public function view($slug = NULL){
        $data = [
            'post' => $this->NewsModel->get_posts($slug),
            'head' => $this->CategoryModel->displayCat(),

        ];
        $post_id = $data['post']['id'];
        $data['comment'] = $this->CommentModel->GetComment($post_id);
        if(empty($data['post'])){
            show_404();
        }
        $data['title'] = $data['post']['title'];

        $this->load->view('templetes/header', $data);
        $this->load->view('pages/blog_view');
        $this->load->view('templetes/footer');
    }

    public function create(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'Add Post',
            'categories' => $this->NewsModel->get_categories(),
            'head' => $this->CategoryModel->displayCat(),
        ];

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
        
        $this->load->view('templetes/header', $data);
        $this->load->view('pages/create_post');
        $this->load->view('templetes/footer');

        }else{
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $postimage = 'noimage.jpg';

            }else{
                $data = array('upload_data' => $this->upload->data());
                $postimage = $_FILES['userfile']['name'];

            }
           $this->NewsModel->CreatePost($postimage);

        //    if($this->NewsModel->CreatePost()){
            redirect(base_url('/?post_created'));
        //    } 
        } 

    
    }

    public function delete($id){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $this->NewsModel->DeletePost($id);
        redirect(base_url('dashboard?deleted'));
    }

    public function edit($slug){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $data = [
            'title' => 'Edit Post',
            'post' => $this->NewsModel->get_posts($slug),
            'head' => $this->CategoryModel->displayCat(),
            'categories' => $this->NewsModel->get_categories()
        ];

        if(empty($data['post'])){
            show_404();
        }

        $this->load->view('templetes/header', $data);
        $this->load->view('pages/edit_view');
        $this->load->view('templetes/footer');
    }

    public function update(){
        if(!$this->session->userdata('isLoggedIn')){
            redirect(base_url('users/login'));
        }
        $this->NewsModel->updatePost();
       redirect(base_url('dashboard/post?edited'));

    }
}