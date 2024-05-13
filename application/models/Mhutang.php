<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mhutang extends CI_Model
{
    public function del_hutang($id)
    {
        $this->db->delete('hutang', ['hutang_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function edithutang($data, $where)
    {
        $this->db->update('hutang', $data, $where);
    }
}
