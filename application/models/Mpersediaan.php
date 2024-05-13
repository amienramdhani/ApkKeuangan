<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpersediaan extends CI_Model
{
    public function del_persediaan($id)
    {
        $this->db->delete('persediaan_bbm', ['persediaan_id' => $id]);
    }
    // public function getAhliId($id)
    // {
    //     $sql = "SELECT * from `mitra` where id=$id";
    //     $query = $this->db->query($sql);
    //     $rows = $query->row_array();
    //     return $rows;
    // }
    public function editpersediaan($data, $where)
    {
        $this->db->update('persediaan_bbm', $data, $where);
    }
}
