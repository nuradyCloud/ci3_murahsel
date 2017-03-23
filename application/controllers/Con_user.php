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
        $this->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'nurady.pamungkas@gmail.com',
            'smtp_pass' => 'nurady@099603',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
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
        /*send mail to recipient*/
        $message="Transaksi ID : ".$id_trx."\nKode Unik : ".$unique_code."\nSilahkan melakukan pembayaran untuk tahap selanjutnya ke rekening ini :";
        $this->email->set_newline("\r\n");
        $this->email->from('nurady.pamungkas@gmail','Fast Transaction Murah Selular');
//        $recipient= array('ady.xcloud7@gmail.com');
        $this->email->to($email);// change it to yours
//        $this->email->cc($recipient);
        $this->email->subject('Fast Transaction Murah Selular['.$id_trx.']');
        $this->email->message($message);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        } else {
            $this->session->set_flashdata('success_pulsa', 'Silahkan check inbox email anda untuk melanjutkan pembayaran!');
        }
        redirect(base_url());
    }
}
