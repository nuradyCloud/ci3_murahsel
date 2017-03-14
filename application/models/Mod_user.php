<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_user
 *
 * @author cloudthinkbun
 */
class Mod_user extends CI_Model{
    
    function generate_codetrx(){
        $chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $code_random=  substr( str_shuffle( $chars ), 0,10 );       
        return $code_random;
    }
    
    function insert_trxPulsa($id_pulsa,$id_nominal,$id_voucher,$email,$nomer_hp,
                                $unique_code,$total_bayar,$status,$last_update){
//        $this->
    }
}
