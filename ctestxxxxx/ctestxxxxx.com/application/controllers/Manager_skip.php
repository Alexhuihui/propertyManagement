<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/4
 * Time: 20:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_skip extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function owner_register(){
        $this->load->view('user_register.html');
    }

    public function owner_edit(){
        $ownerid = $this->uri->segment(3);
        $data['owner'] = $this->ownerope_model->select_owner($ownerid);
        $this->load->view('owner_edit.html',$data);
    }
}