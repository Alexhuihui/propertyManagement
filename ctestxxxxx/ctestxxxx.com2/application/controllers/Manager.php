<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/4
 * Time: 19:02
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function read(){
        $this->load->library('pagination');
        $perPage = 15;

        $config['base_url'] = site_url('manager/read');
        $config['total_rows'] = $this->db->count_all_results('prp_owner');
        $config['per_page'] = $perPage;
        $config['first_link'] = '第一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '最后一页';
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $offset = $this->uri->segment(3);

        $data['user'] = $this->ownerope_model->get_owner($offset, $perPage);
        $this->load->view('owner_display.html', $data);
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
        if($this->ownerope_model->insert_owner($data)) {
            success('manager/read', '增加成功');
        }
        else
        {
            $this->load->view('user_register.html');
        }
    }

    public function owner_del(){
        $ownerid = $this->uri->segment(3);
        if($this->ownerope_model->del_owner($ownerid))
        {
            success('manager/read', '删除成功');
        }
        else
        {
            error('删除失败');
        }
    }

    public function owner_edit(){
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
            success('manager/read', '修改成功');
        }
        else
        {
            error('修改失败');
        }
    }
}