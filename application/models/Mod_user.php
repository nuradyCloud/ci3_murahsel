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
    
    function get_nominal($id_nominal){
        return $this->db->get_where('tm_nominal',array('id_nominal'=>$id_nominal))->row_array();
    }
    
    function insert_trxPulsa($id_pulsa,$unique_code,$email,$id_voucher,$id_nominal,$nomer_hp,
                            $total_bayar,$status,$last_update){
        $qCodecount="SELECT code_count FROM trx_kode WHERE id_code='$id_pulsa'";
        $getCodecount= $this->db->query($qCodecount)->row_array();
        $qCode="SELECT id_code FROM trx_kode WHERE id_code='$id_pulsa'";
        $getCode= $this->db->query($qCode)->row_array();
        
        if($getCodecount==NULL){
            $getCodecount["code_count"]=0;
        }else{
            $getCodecount["code_count"]=$getCodecount["code_count"];
        }
        
        if($getCode==NULL){
            $jmlKode=$getCodecount["code_count"]+1;
            $idTrx=$id_pulsa.$jmlKode;
            $dataPulsa=array(
                'id_pulsa'          =>$idTrx,
                'unique_code'       =>$unique_code,
                'email_user'        =>$email,
                'id_voucher'        =>$id_voucher,
                'id_nominal'        =>$id_nominal,
                'nomer_tujuan'      =>$nomer_hp,
                'total_pembayaran'  =>$total_bayar,
                'status'            =>$status,
                'last_update'       =>$last_update
            );
            $this->db->insert('trx_pulsa',$dataPulsa);
            //insert table trx_kode
            $dataKode=array(
                'id_code'       =>$id_pulsa,
                'code_count'    =>$jmlKode
            );
            $this->db->insert('trx_kode',$dataKode);
        }else{
            $jmlKode2=$getCodecount["code_count"]+1;
            $idTrx=$id_pulsa.$jmlKode2;
            $dataPulsa2=array(
                'id_pulsa'          =>$idTrx,
                'unique_code'       =>$unique_code,
                'email_user'        =>$email,
                'id_voucher'        =>$id_voucher,
                'id_nominal'        =>$id_nominal,
                'nomer_tujuan'      =>$nomer_hp,
                'total_pembayaran'  =>$total_bayar,
                'status'            =>$status,
                'last_update'       =>$last_update
            );
            $this->db->insert('trx_pulsa',$dataPulsa2);
            //update table trx_kode
            $this->db->set('code_count',$jmlKode2);
            $this->db->where('id_code',$getCode["id_code"]);
            $this->db->update('trx_kode');
        }
//        return $idTrx;
    }
}
