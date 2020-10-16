<?php

class CategoryModel extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    public function displayCat($id = FALSE){
        if($id === FALSE){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('Categories');
        return $query->result_array();
        }

        $query = $this->db->get_where('categories', array('id'=> $id));
        return $query->row_array();


        // $this->db->order_by('name');
        // $query = $this->db->get('categories');

        // return $query->result_array();
    }

    public function headerCat(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    // public function showCat($id){
    //     if($id){
    //     $query = $this->db->get('categories');
    //     return $query->result_array();
    //     }
    // }

    public function createCat(){
        $data = array(
            'name' => $this->input->post('name'),
        );

        return $this->db->insert('categories', $data);
    }

    public function deleteCat($id){
        $this->db->where('id', $id);
        $this->db->delete('categories');
        return true;

    }

    public function editCat(){
        $data = array(
            'name' => $this->input->post('name'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('categories', $data);
    }

    public function get_category($id){
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }

    
}

?>