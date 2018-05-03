<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 20:22
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ownerope_model');
        $this->load->model('managerope_model');
    }

    public function index(){
        $data['owner'] = $this->ownerope_model->select_telnum();
        $this->load->view('owner_home.html', $data);
    }
}