<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 22:32
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_skip extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
        $this->load->model('chargeope_model');
    }

    public function edit_owner(){
        $data['owner'] = $this->ownerope_model->select_telnum();
        $this->load->view('ownerself_edit.html', $data);
    }


    public function owner_display(){
        $data['owner'] = $this->ownerope_model->select_telnum();
        $this->load->view('ownerself_display.html', $data);
    }

    public function ownercharge_display(){
        $data['owner'] = $this->ownerope_model->select_telnum();
        $ownerid = $data['owner'][0]['ownerid'];
        $data['charge'] = $this->chargeope_model->selectall_charge($ownerid);
        $this->load->view('ownercharge_display.html', $data);
    }
}