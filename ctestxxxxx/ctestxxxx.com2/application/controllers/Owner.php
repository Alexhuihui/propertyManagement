<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 20:43
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function edit_owner(){
        $data = array(
            'telnum'=>$this->input->post('telnum'),
            'passwd'=>$this->input->post('passwd'),
            'username'=>$this->input->post('username'),
            'profession'=>$this->input->post('profession'),
            'genderid'=>$this->input->post('genderid'),
            'acreage'=>$this->input->post('acreage'),
            'population'=>$this->input->post('population'),
            'location'=>$this->input->post('location')
        );
        $ownerid = $this->input->post('ownerid');
        if($this->ownerope_model->update_owner($data, $ownerid))
        {
            success('owner_home', '修改成功');
        }
        else
        {
            error('修改失败');
        }
    }
}