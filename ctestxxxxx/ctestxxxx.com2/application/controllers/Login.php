<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/4
 * Time: 10:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function index(){
        $this->load->view('manager_login.html');
    }

    public function login(){
        if($this->input->post('select') == 1)
        {
            $this->form_validation->set_rules('managername', '用户名', 'required');
            $this->form_validation->set_rules('managerpass', '密码', 'required');
            $flag = $this->form_validation->run();
            $telnum = $this->input->post('managername');
            $passwd = $this->input->post('managerpass');
            $result = $this->ownerope_model->selectall_owner();
            $data = array(
                'telnum'=>$telnum,
                'passwd'=>$passwd
            );
            $flag2 = true;
            if($flag)
            {
                foreach ($result as $row => $v)
                {
                    if($v['telnum'] == $data['telnum'] && $v['passwd'] == $data['passwd'] && $flag)
                    {
                        //$data['owner'] = $row;
                        //$data = $row;
                        //$this->load->view('owner_home.html', $data);
                        $_SESSION['telnum'] =  $telnum;
                        $flag2 = false;
                        success('owner_home', '登录成功');
                    }
                }
                if($flag2)
                {
                    error('登录失败');
                }
            }
            else
            {
                $this->load->view('manager_login.html');
            }
        }
        else
        {
            $this->form_validation->set_rules('managername', '用户名', 'required');
            $this->form_validation->set_rules('managerpass', '密码', 'required');
            $flag = $this->form_validation->run();
            $result = $this->managerope_model->select_manager();
            $data = array(
                'managername'=>$this->input->post('managername'),
                'managerpass'=>$this->input->post('managerpass')
            );
            if($flag)
            {
                foreach ($result as $row)
                {
                    if($row['managername'] == $data['managername'] && $row['managerpass'] == $data['managerpass'])
                    {
                        success('manager_home', '登录成功');
                    }
                    else
                    {
                        error('登录失败');
                    }
                }
            }
            else
            {
                $this->load->view('manager_login.html');
            }
        }
    }
}