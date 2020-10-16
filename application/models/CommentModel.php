<?php

class CommentModel extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function CreateComment($post_id){
        $data = array(
            'post_id' => $post_id,
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body')
        );
        return $this->db->insert('comments', $data);
         

    }

    public function GetComment($post_id){
        // $this->db->order_by('comments', 'DESC');
        $query = $this->db->get_where('comments', array('post_id' => $post_id ));
        return $query->result_array();
    }


}