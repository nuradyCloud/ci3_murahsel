<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
        if($this->session->userdata('logged_in')){
            $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
            $my_content['info_admin']=$this->session->flashdata('success_message');
            $datacontent['my_content'] = $this->load->view('my_admin/mimin_home',$my_content, TRUE);
            $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
            $data['footer'] = $this->load->view('template/footer', '', TRUE);
            $this->load->view('template', $data);
        }else{
            $my_content['error_admin']=$this->session->flashdata('error_message');
            $my_content['success_admin']=$this->session->flashdata('success_message');
            $this->load->view('my_admin/login',$my_content);
        }       
        
    }

    function admin_login() {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $dataMinuser = $this->mod_admin->getMinuser($email,$pass);
        if (!empty($dataMinuser)) {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('email', $dataMinuser['user_email']);
            $this->session->set_userdata('username', $dataMinuser['user_name']);
            $this->session->set_userdata('role', $dataMinuser['status']);
            $this->session->set_flashdata('success_message', 'Success Login. Welcome '.$this->session->userdata('username').' as '.$this->session->userdata('role'));
            redirect('mimin');
        } else {
            $this->session->set_flashdata('error_message', 'Email and Password is wrong.');
            redirect('mimin');
        }
    }

    function admin_logout() {
        if ($this->session->userdata('logged_in')) {
            $this->mod_admin->update_minuser($this->session->userdata('username'));
            $this->session->sess_destroy();
            $this->session->set_flashdata('success_message', 'You has been logout.');
            redirect('mimin');
        } else {
            $this->session->set_flashdata('error_message', 'You must login!');
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
    
    //useradmin
    function minuser_list(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $my_content['minuser_tambah']=$this->session->flashdata('minuser_tambah'); 
        $my_content['minuser_delete']=$this->session->flashdata('minuser_delete'); 
        $my_content['rownum_minuser'] = $this->mod_admin->numrow_minuser();
        $my_content['minuser_list'] = $this->mod_admin->select_minuser();
        $datacontent['my_content'] = $this->load->view('my_admin/mimin_list',$my_content, TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function minuser_tambah(){
        $data['header'] = $this->load->view('my_admin/mimin_header', '', TRUE);
        $datacontent['my_content'] = $this->load->view('my_admin/minuser_tambah','', TRUE);
        $data['content'] = $this->load->view('template/content', $datacontent, TRUE);
        $data['footer'] = $this->load->view('template/footer', '', TRUE);
        $this->load->view('template', $data);
    }
    
    function save_minuser_tambah(){
        $user_email     = $this->input->post('user_email');
        $user_name   = $this->input->post('user_name');
        $password   = $this->input->post('password');
        $status   = $this->input->post('status');
        $this->mod_admin->tambah_minuser($user_name,$user_email,$password,$status);
        $this->session->set_flashdata('minuser_tambah', 'Data Admin Telah Berhasil Disimpan.');
        redirect('mimin/admin_user/list');
    }
    
    function minuser_delete(){
        $user_name= end($this->uri->segment_array());
        $this->mod_admin->delete_minuser($user_name);
        $this->session->set_flashdata('minuser_delete','Data Admin berhasil di hapus');
        redirect('mimin/admin_user/list');
    }

}
