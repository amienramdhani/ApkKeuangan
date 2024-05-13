<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mbank extends CI_Model
{
    public function del_bank($id)
    {
        $this->db->delete('bank', ['bank_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function editbank($data, $where)
    {
        $this->db->update('bank', $data, $where);
    }
}
