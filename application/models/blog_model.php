<?php

class blog_model extends CI_Model{
    public function getblogs($limit, $offset)
    {
    $filter = $this->input->get('find');
    $this->db->like('title', $filter);
    $this->db->limit($limit, $offset);
    $this->db->order_by('date', 'desc');
    return $this->db->get("blog");
    }

     public function gettotalblogs()
    {
    $filter = $this->input->get('find');
    $this->db->like('title', $filter);
    return $this->db->count_all_results("blog");
    }

    public function getsingleblog($field, $value)
    {
    $this->db->where($field, $value);
    return $this->db->get('blog');
    }

    public function insertblog($data)
    {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }
    
    public function updateblog($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }

    public function deleteblog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
        //affected_rows(); itu untuk hapus 1 data
    }

}