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
        $my_content['info_pulsa']=$this->session->flashdata('success_pulsa');
        $datacontent['my_content'] = $this->load->view('home',$my_content, TRUE);
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
        $email= $this->input->post('my_email');
        $id_voucher= $this->input->post('my_voucher');
        $id_nominal= $this->input->post('my_nominal');
        $id_pulsa= 'TP'.$id_voucher.$id_nominal;
        $unique_code= $this->mod_user->generate_codetrx();
        $dataNominal= $this->mod_user->get_nominal($id_nominal);
        $nomer_hp= $this->input->post('my_nominal');
        $total_bayar=$dataNominal["value_nominal"]+2000;
        $status='Menunggu Pembayaran';
        $last_update= date("Y-m-d H:i:s");        
        $id_trx=$this->mod_user->insert_trxPulsa($id_pulsa,$unique_code,$email,$id_voucher,$id_nominal,$nomer_hp,
                            $total_bayar,$status,$last_update);
        $this->session->set_flashdata('success_pulsa', 'Silahkan check inbox email anda untuk melanjutkan pembayaran!');
        redirect(base_url());
    }
}
