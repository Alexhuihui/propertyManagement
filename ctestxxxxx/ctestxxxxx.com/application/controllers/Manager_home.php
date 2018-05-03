<?php
/**
 * Created by PhpStorm.
 * User: 29308
 * Date: 2017/9/5
 * Time: 10:20
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager_home extends CI_Controller{
    public function index(){
        $this->load->view('home.html');
    }
}