<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/4
 * Time: 10:56
 */
class Ownerope_model extends CI_Model
{
    //插入模型
    public function insert_owner($data){
        $flag = $this->db->insert('prp_owner', $data);
        if($flag)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //删除模型
    public function del_owner($ownerid){
        if($this->db->delete('prp_owner', array('ownerid'=>$ownerid)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //更改模型
    public function update_owner($data, $ownerid){
        if($this->db->update('prp_owner', $data, array('ownerid'=>$ownerid)))
        {
            return true;
        }
        else{
            return false;
        }
    }

    //查找模型
    public function get_owner($offset, $perPage){
        if($offset == "")
        {
            $query = $this->db->limit($perPage)->get('prp_owner');
            $row = $query->result_array();
            return $row;
        }
        else
        {
            $query = $this->db->limit($perPage , ($offset - 1) * $perPage)->get('prp_owner');
            $row = $query->result_array();
            return $row;
        }
    }

    //查找某一个业主
    public function select_owner($ownerid){
        $query = $this->db->get_where('prp_owner', array('ownerid'=>$ownerid));
        $result = $query->result_array();
        return $result;
    }

    //查找所有业主
    public function selectall_owner(){
        $query = $this->db->query('select * from prp_owner');
        $result = $query->result_array();
        return $result;
    }

    //根据手机号码查找某一个业主
    public function select_telnum(){
        $query = $this->db->get_where('prp_owner', array('telnum'=>$_SESSION['telnum']));
        $result = $query->result_array();
        return $result;
    }
}