<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Con_admin
 *
 * @author cloudthinkbun
 */
class Con_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mod_admin');
    }

    public function admin_home() {
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('my_admin/mimin_home', '', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
//        if ($this->session->userdata('logged_in')) {
//            $data['header'] = $this->load->view('template/cst_admin/header', '', TRUE);
//            $datacontent['content1'] = $this->load->view('home', '', TRUE);
//            $data['content'] = $this->load->view('template/cst_admin/content', $datacontent, TRUE);
//            $data['footer'] = $this->load->view('template/cst_admin/footer', '', TRUE);
//            $this->load->view('template', $data);
//        } else {
//            $mycontent['message2'] = $this->session->flashdata('message2');
//            $this->load->view('login', $mycontent);
//        }
        
    }

    function admin_login() {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $pass_input = md5($pass);

        $data = $this->mod_homepage->getPasswordAndRole($email, $pass_input);
        if (!empty($data)) {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('email', $data['email']);
            $this->session->set_userdata('username', $data['username']);
            $this->session->set_userdata('role', $data['role']);

            redirect('home');
        } else {
            $this->session->set_flashdata('message2', 'Email and Password is wrong.');
            redirect('home');
        }
    }

    function admin_logout() {
        if ($this->session->userdata('logged_in')) {
            $this->session->sess_destroy();
            redirect('mimin/mimin_home');
        } else {
            $this->session->set_flashdata('message2', 'Email and Password is wrong.');
        }
    }
    
    /*pulsa*/
    function my_pulsa(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $my_content['rownum_voucher'] = $this->mod_admin->numrow_voucher();
        $my_content['voucher_list'] = $this->mod_admin->select_voucher();
        $datacontent['my_content'] = $this->load->view('my_admin/mimin_pulsa',$my_content, TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }

}
