<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_admin
 *
 * @author cloudthinkbun
 */
class Mod_admin extends CI_Model{
    //voucher
    function numrow_voucher(){
        return $this->db->count_all('tm_voucher');         
    }
    
    function select_voucher(){
        $this->db->order_by('id_voucher','ASC');
        return $this->db->get('tm_voucher')->result_array();
    }
    
    function tambah_voucher($id_voucher,$nama_voucher){
        $dataVoucher= array(
            'id_voucher'    =>$id_voucher,
            'nama_voucher'  =>$nama_voucher
        );
        $this->db->insert('tm_voucher',$dataVoucher);
    }
    
    function delete_voucher($id_voucher){
        return $this->db->delete('tm_voucher',array('id_voucher'=>$id_voucher));
    }
    
    //nominal
    function numrow_nominal(){
        return $this->db->count_all('tm_nominal');         
    }
    
    function select_nominal(){
        $this->db->order_by('id_nominal','ASC');
        return $this->db->get('tm_nominal')->result_array();
    }
    
    function tambah_nominal($id_nominal,$nama_nominal,$value_nominal){
        $dataNominal= array(
            'id_nominal'      =>$id_nominal,
            'name_nominal'    =>$nama_nominal,
            'value_nominal'   =>$value_nominal
        );
        $this->db->insert('tm_nominal',$dataNominal);
    }
    
    function delete_nominal($id_nominal){
        return $this->db->delete('tm_nominal',array('id_nominal'=>$id_nominal));
    }
    
    //admin_user
    function numrow_minuser(){
        return $this->db->count_all('tm_minuser');         
    }
    
    function select_minuser(){
        $this->db->order_by('user_email','ASC');
        return $this->db->get('tm_minuser')->result_array();
    }
    
    function tambah_minuser($user_name,$user_email,$password,$status){
        $encpass= md5($password);
        $dataMinuser= array(
            'user_email'    =>$user_email,
            'user_name'     =>$user_name,
            'password'      =>$encpass,
            'status'        =>$status
        );
        $this->db->insert('tm_minuser',$dataMinuser);
    }
    
    function update_minuser($user_name){
        $ipLocation= $this->input->ip_address();
        $lastLogin= date("Y-m-d H:i:s");
        $dataMinuser= array(
            'ip_location'   =>$ipLocation,
            'last_login'    =>$lastLogin
        );
        $this->db->where('user_name',$user_name);
        $this->db->update('tm_minuser',$dataMinuser);
    }
    
    function delete_minuser($user_name){
        return $this->db->delete('tm_minuser',array('user_name'=>$user_name));
    }
    
    function getMinuser($email,$pass){
        $dataUser=array(
            'user_email'    =>$email,
            'password'      => md5($pass)
        );
        $this->db->where($dataUser);
        return $this->db->get('tm_minuser')->row_array();
    }
}
