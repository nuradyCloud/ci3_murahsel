<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Con_user
 *
 * @author cloudthinkbun
 */
class Con_user extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('mod_admin');
        $this->load->model('mod_user');
    }
    
    function index(){
        $data['header'] = $this->load->view('template/header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('home', '', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function pulsa(){
        $data['header'] = $this->load->view('template/header', '', TRUE);
        $my_content['my_nominal'] = $this->mod_admin->select_nominal();
        $my_content['my_voucher'] = $this->mod_admin->select_voucher();
        $datacontent['my_content'] = $this->load->view('pulsa',$my_content, TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function save_pulsa(){
        $data['header'] = $this->load->view('template/header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('pulsa', '', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
}
