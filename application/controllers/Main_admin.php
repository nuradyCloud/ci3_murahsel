<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_admin
 *
 * @author cloudthinkbun
 */
class Main_admin extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function admin_home(){
        if ($this->session->userdata('logged_in')){
            $data['header'] = $this->load->view('template/cst_admin/header', '', TRUE);
            $datacontent['content1']=  $this->load->view('home','',TRUE);
            $data['content'] = $this->load->view('template/cst_admin/content', $datacontent,  TRUE);
            $data['footer'] = $this->load->view('template/cst_admin/footer', '',TRUE);
            $this->load-> view('template', $data);
        }  else {
            $mycontent['message2']=$this->session->flashdata('message2');
            $this->load->view('login',$mycontent);
        }
    }
    
    function admin_login(){
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $pass_input = md5($pass);
        
	$data = $this->mod_homepage->getPasswordAndRole($email,$pass_input);
            if(!empty($data)){
                $this->session->set_userdata('logged_in', TRUE);
		$this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_userdata('role', $data['role']);
					
		redirect('home');
            
            } else {
                $this->session->set_flashdata('message2','Email and Password is wrong.');                
		redirect('home');
           
            }
    }    
    
    function admin_logout(){
        if($this->session->userdata('logged_in')){
            $this->session->sess_destroy();
            redirect('home');
        } else {
                echo "you must log in! ";
        }
    }
}
