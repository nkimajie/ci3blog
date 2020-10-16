<?php

class NewsModel extends CI_Model{
    public function __construct(){

        $this->load->database();
    }
  
    public function get_posts($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function CreatePost($postimage){ 
        $slug = url_title($this->input->post('title'));

        $data = array(

            
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'postimage' => $postimage

        );
        

        return $this->db->insert('posts', $data);
    }

    public function DeletePost($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function updatePost(){
        
        $slug = url_title($this->input->post('title'));

        $data = array(
            // 'category_id' => $this->input->post('categoy_id'),
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function get_categories(){
        $this->db->order_by('name');
        $query = $this->db->get('categories');

        return $query->result_array();
    }

    public function display_post_by_cat_id($category_id){
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('category_id' => $category_id));
        return $query->result_array();
    }
}