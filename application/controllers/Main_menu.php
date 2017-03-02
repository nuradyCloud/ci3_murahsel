<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_menu
 *
 * @author cloudthinkbun
 */
class Main_menu extends CI_Controller{
    public function __construct() {
        parent::__construct();
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
        $datacontent['my_content'] = $this->load->view('pulsa', '', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
}
