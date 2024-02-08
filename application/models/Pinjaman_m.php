<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pinjaman_m extends CI_Model
{
    public function get()
    {
        $this->db->join('user', 'user.id=pinjaman.id_user');
        $this->db->join('tbuku', 'tbuku.kode_buku=pinjaman.id_buku');
        return $this->db->get('pinjaman');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pinjaman');
    }

    public function insert($data)
    {
        return $this->db->insert('pinjaman', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        return $this->db->update('pinjaman');
    }

    
    public function delete($id)
    {
        $this->db->where('id_pinjaman', $id);
        return $this->db->delete('pinjaman');
    }
}