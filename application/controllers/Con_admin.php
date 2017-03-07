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
    
    /*voucher*/
    function my_voucher(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $my_content['nominal_delete']=$this->session->flashdata('nominal_delete'); 
        $my_content['nominal_tambah']=$this->session->flashdata('nominal_tambah'); 
        $my_content['rownum_nominal'] = $this->mod_admin->numrow_nominal();
        $my_content['nominal_list'] = $this->mod_admin->select_nominal();
        $my_content['voucher_delete']=$this->session->flashdata('voucher_delete'); 
        $my_content['voucher_tambah']=$this->session->flashdata('voucher_tambah'); 
        $my_content['rownum_voucher'] = $this->mod_admin->numrow_voucher();
        $my_content['voucher_list'] = $this->mod_admin->select_voucher();
        $datacontent['my_content'] = $this->load->view('my_admin/mimin_voucher',$my_content, TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function voucher_tambah(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('my_admin/voucher_tambah','', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function save_tambah(){
        $id_voucher     = $this->input->post('id_voucher');
        $nama_voucher   = $this->input->post('nama_voucher');
        $this->mod_admin->tambah_voucher($id_voucher,$nama_voucher);
        $this->session->set_flashdata('voucher_tambah', 'Data Master Voucher Telah Berhasil Disimpan.');
        redirect('mimin/voucher');
    }
    
    function voucher_delete(){
        $id_voucher= end($this->uri->segment_array());
        $this->mod_admin->delete_voucher($id_voucher);
        $this->session->set_flashdata('voucher_delete','Data Voucher berhasil di hapus');
        redirect('mimin/voucher');
    }
    
    //nominal
    function nominal_tambah(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('my_admin/nominal_tambah','', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function save_nominal_tambah(){
        $id_nominal     = $this->input->post('id_nominal');
        $nama_nominal   = $this->input->post('nama_nominal');
        $value_nominal   = $this->input->post('value_nominal');
        $this->mod_admin->tambah_nominal($id_nominal,$nama_nominal,$value_nominal);
        $this->session->set_flashdata('nominal_tambah', 'Data Master Nominal Telah Berhasil Disimpan.');
        redirect('mimin/voucher');
    }
    
    function nominal_delete(){
        $id_nominal= end($this->uri->segment_array());
        $this->mod_admin->delete_nominal($id_nominal);
        $this->session->set_flashdata('nominal_delete','Data Nominal berhasil di hapus');
        redirect('mimin/voucher');
    }

}
