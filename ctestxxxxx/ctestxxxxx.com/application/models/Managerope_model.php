<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/4
 * Time: 11:04
 */
class Managerope_model extends CI_Model
{
    //插入模型
    public function insert_manager($data){
        if($this->db->insert('prp_manager', $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //删除模型
    public function del_manager($managerid){
        if($this->db->delete('prp_manager', array('managerid'=>$managerid)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //更改模型
    public function update_manager($data, $managerid){
        if($this->db->update('prp_manager', $data, array('managerid'=>$managerid)))
        {
            return true;
        }
        else{
            return false;
        }
    }

    //查找模型
    public function select_manager(){
        $query = $this->db->query('select * from prp_manager');
        $result = $query->result_array();
        return $result;
    }
}