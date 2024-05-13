<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpenjualan extends CI_Model
{
    public function del_penjualan($id)
    {
        $this->db->delete('penjualan_bbm', ['penjualan_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function editpenjualan($data, $where)
    {
        $this->db->update('penjualan_bbm', $data, $where);
    }
}
