<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('user');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user');
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        return $this->db->update('user');
    }

    
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
}