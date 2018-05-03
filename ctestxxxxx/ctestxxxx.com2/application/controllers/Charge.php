<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 10:28
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chargeope_model');
    }

    public function read(){
        $this->load->library('pagination');
        $perPage = 15;

        $config['base_url'] = site_url('charge/read');
        $config['total_rows'] = $this->db->count_all_results('prp_charge');
        $config['per_page'] = $perPage;
        $config['first_link'] = '第一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '最后一页';
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();
        $offset = $this->uri->segment(3);

        $data['user'] = $this->chargeope_model->get_charge($offset, $perPage);
        $this->load->view('charge_display.html', $data);
    }

    public function insert_charge(){
        $chargetime = time();
        $data = array(
            'ownerid'=>$this->input->post('ownerid'),
            'chargetime'=>$chargetime,
            'charge'=>$this->input->post('charge'),
            'remark'=>$this->input->post('remark')
        );
        if($this->chargeope_model->insert_charge($data))
        {
            success('charge/read', '增加成功');
        }
        else
        {
            error('增加失败');
        }
    }

    public function charge_del(){
        $chargeid = $this->uri->segment(3);
        if($this->chargeope_model->del_charge($chargeid))
        {
            success('charge/read', '删除成功');
        }
        else
        {
            error('删除失败');
        }
    }

    public function charge_edit(){
        $data = array(
            'ownerid'=>$this->input->post('ownerid'),
            'remark'=>$this->input->post('remark'),
            'charge'=>$this->input->post('charge')
        );
        $chargeid = $this->input->post('chargeid');
        if($this->chargeope_model->update_charge($data, $chargeid))
        {
            success('charge/read', '修改成功');
        }
        else
        {
            error('修改失败');
        }
    }
}