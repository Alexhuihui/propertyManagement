<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 10:31
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge_skip extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('chargeope_model');
    }

    public function add_charge(){
        $this->load->view('add_charge.html');
    }

    public function charge_edit(){
        $chargeid = $this->uri->segment(3);
        $data['owner'] = $this->chargeope_model->select_charge($chargeid);
        $this->load->view('charge_edit.html', $data);
    }

    public function charge_register(){
        $this->load->view('add_charge.html');
    }
}