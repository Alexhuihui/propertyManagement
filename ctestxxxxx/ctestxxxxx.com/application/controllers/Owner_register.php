<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 20:01
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_register extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function insert_owner(){
        $time = time();
        $data =array(
            'time'=>$time,
            'telnum'=>$this->input->post('telnum'),
            'passwd'=>$this->input->post('passwd'),
            'username'=>$this->input->post('username'),
            'profession'=>$this->input->post('profession'),
            'genderid'=>$this->input->post('genderid'),
            'acreage'=>$this->input->post('acreage'),
            'population'=>$this->input->post('population'),
            'location'=>$this->input->post('location')
        );
        $this->form_validation->set_rules('telnum', '电话号码', 'required');
        $this->form_validation->set_rules('passwd', '密码', 'required');
        $this->form_validation->set_rules('username', '用户名', 'required');
        $this->form_validation->set_rules('location', '地址', 'required');
        $flag = $this->form_validation->run();
        if($flag)
        {
            if($this->ownerope_model->insert_owner($data)) {
                success('login', '注册成功');
            }
            else
            {
                $this->load->view('owner_register.html');
            }
        }
        else
        {
            $this->load->view('owner_register.html');
        }
    }

    public function owner_register(){
        $this->load->view('owner_register.html');
    }
}