<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpiutang extends CI_Model
{
    public function del_piutang($id)
    {
        $this->db->delete('piutang', ['piutang_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function editpiutang($data, $where)
    {
        $this->db->update('piutang', $data, $where);
    }
}
