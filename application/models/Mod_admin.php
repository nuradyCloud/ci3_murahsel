<?php

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
}
