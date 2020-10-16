<?php

 class Comments extends CI_Controller{

    public function create($post_id){
        $slug = $this->input->post('slug');
        $data = [
            'head' => $this->CategoryModel->displayCat(),
            'post' => $this->NewsModel->get_posts($slug)
        ];

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('body', 'Body', 'required|max_length[255]');

        if($this->form_validation->run() === FALSE){
        
        $this->load->view('templetes/header.php', $data);
        $this->load->view('pages/blog_view');
        $this->load->view('templetes/footer');

        }else{
            $this->CommentModel->CreateComment($post_id);
            redirect(base_url('posts/'.$slug.'?comment_submitted'));

        }
    }


}




?>