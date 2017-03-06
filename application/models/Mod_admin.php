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
    
    function numrow_voucher(){
        return $this->db->count_all('tm_voucher');         
    }
    
    function select_voucher(){
        return $this->db->get('tm_voucher')->result_array();
    }
}
