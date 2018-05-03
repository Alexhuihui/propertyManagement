<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 10:22
 */
class Chargeope_model extends CI_Model
{
    //插入模型
    public function insert_charge($data){
        if($this->db->insert('prp_charge', $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //删除模型
    public function del_charge($chargeid){
        if($this->db->delete('prp_charge', array('chargeid'=>$chargeid)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //更改模型
    public function update_charge($data, $chargeid){
        if($this->db->update('prp_charge', $data, array('chargeid'=>$chargeid)))
        {
            return true;
        }
        else{
            return false;
        }
    }

    //查找模型
    public function get_charge($offset, $perPage){
        if($offset == "")
        {
            $query = $this->db->limit($perPage)->get('prp_charge');
            $row = $query->result_array();
            return $row;
        }
        else
        {
            $query = $this->db->limit($perPage , ($offset - 1) * $perPage)->get('prp_charge');
            $row = $query->result_array();
            return $row;
        }
    }

    //  查找一个收费情况
    public function select_charge($chargeid){
        $query = $this->db->get_where('prp_charge', array('chargeid'=>$chargeid));
        $result = $query->result_array();
        return $result;
    }

    //查找一个业主的所有缴费记录
    public function selectall_charge($ownerid){
        $query = $this->db->get_where('prp_charge', array('ownerid'=>$ownerid));
        $result = $query->result_array();
        return $result;
    }
}