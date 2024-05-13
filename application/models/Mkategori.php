<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mkategori extends CI_Model
{
    public function del_kategori($id)
    {
        $this->db->delete('kategori', ['kategori_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function editkategori($data, $where)
    {
        $this->db->update('kategori', $data, $where);
    }
}
