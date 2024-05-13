<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{
    public function Selecttransaksi()
    {
        $sql = "SELECT `transaksi`.*,`kategori`.`kategori`,`bank`.`bank_nama`
                    FROM `transaksi` INNER JOIN `kategori` ON `transaksi`.`transaksi_kategori` = `kategori`.`kategori_id` 
                    INNER JOIN  `bank` ON `transaksi`.`transaksi_bank` = `bank`.`bank_id` ORDER BY `transaksi`.`transaksi_id`";
        $query = $this->db->query($sql);
        $rows = $query->result_array();
        return $rows;
    }

    public function del_transaksi($id)
    {
        $this->db->delete('transaksi', ['transaksi_id' => $id]);
    }

    public function edittransaksi($data, $where)
    {
        $this->db->update('transaksi', $data, $where);
    }
}
