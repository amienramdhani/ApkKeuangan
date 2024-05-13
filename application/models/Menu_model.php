<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
        FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";

        return $this->db->query($query)->result_array();
    }
    public function del_submenu($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
    }
    public function getSubId($id)
    {
        $sql    = "SELECT * from `user_sub_menu` where id=$id";
        $query    = $this->db->query($sql);
        $rows    = $query->row_array();
        return $rows;
    }
    public function editSubMenu($data, $where)
    {
        $this->db->update('user_sub_menu', $data, $where);
    }
}
