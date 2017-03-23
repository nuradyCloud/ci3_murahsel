<?php    
    include_once("PHPMailer_v5.1/class.phpmailer.php");
    $con=mysql_connect("10.251.93.32","apps","Cdds#2013");
    mysql_select_db("css",$con);
    
    $qmain="select a.id_campaign as id_campaign ,a.campaign_status,a.campaign_name,
		d.campaign_category_name,c.business_group_name,f.product_group_name,e.general_objective_name,b.brand_name,
                a.start_date,a.end_date,a.broadcast_time,a.submission_time,
                g.sender_name,a.wording,a.segment_name,a.target,a.segment_detail,a.seg_desc,a.adn,a.keyword,
                a.recharge_type,a.recharge_offer_eligibility,a.recharge_measurement,a.recharge_nominal,a.recharge_meet,a.recharge_notmeet,a.recharge_channel,                
                a.bonus_apps_id,a.bonus_offer_id,a.bonus_prod_type,a.bonus_desc,a.bonus_validity,a.bonus_note,                
                a.remarks,a.campaign_segment_remark,a.campaign_config_remark        
        from trx_main_campaign as a, 
            tref_campaignid_campaignbrand as b, 
            tref_campaignid_campaignbusinessgroup as c,
            tref_campaignid_campaigncategory as d, 
            tref_campaignid_campaigngeneralobjective as e, 
            tref_campaignid_campaignproductgroup as f,
            treff_sender as g
        where a.status_mail='CMP_CFG' 
            and b.id_brand=a.id_brand
            and c.id_business_group=a.id_business_group 
            and	d.id_campaign_category=a.id_campaign_category 
            and e.id_general_objective=a.id_general_objective 
            and f.id_product_group=a.id_product_group 
            and g.id_sender=a.id_sender";
//    echo $qmain;
//    die();
//    $main_header.="<html>\n<style>table, th, td {border: 1px solid black;border-collapse: collapse;}</style>\n<h4 style=color: red;>Campaign Detail Info</h4>"
    $message.="<html>\n<style>table, th, td {border: 1px solid black;border-collapse: collapse;}</style>\n<h4 style=color: red;>Campaign Detail Info</h4>"
            ."<table style=margin: 10px 10px 10px 10px; width: 98%;>"
            ."<thead><tr style=background-color:#FFDFDF>"
            ."<th><p style=font-size: 10px;>Campaign ID</p></th><th><p style=font-size: 10px;>Campaign Name</p></th>"
            . "<th><p style=font-size: 10px;>Campaign Status</p></th><th><p style=font-size: 10px;>Category</th>"
            . "<th><p style=font-size: 10px;>Business Group</p></th><th><p style=font-size: 10px;>Product Group</td>"
            . "<th><p style=font-size: 10px;>General Objective</p></th><th><p style=font-size: 10px;>Brand</th>"
            . "<th><p style=font-size: 10px;>Start Date</p></th><th><p style=font-size: 10px;>End Date</th>"
            . "<th><p style=font-size: 10px;>Broadcast Time</p></th><th><p style=font-size: 10px;>Submission Time</th>"
            . "<th><p style=font-size: 10px;>Sender</p></th><th><p style=font-size: 10px;>Wording</th>"
            . "<th><p style=font-size: 10px;>Segment Name</p></th><th><p style=font-size: 10px;>Segment Description</p></th>"
            . "<th><p style=font-size: 10px;>Target</th><th><p style=font-size: 10px;>Request Segment</th>"
            . "<th><p style=font-size: 10px;>ADN</p></th><th><p style=font-size: 10px;>Keyword</th>"
            . "<th><p style=font-size: 10px;>Recharge Type</th><th><p style=font-size: 10px;>Recharge Offer Eligibility</th>"
            . "<th><p style=font-size: 10px;>Recharge Measure</p></th><th><p style=font-size: 10px;>Recharge Nominal</th>"
            . "<th><p style=font-size: 10px;>Notification if Thresshold is meet</th><th><p style=font-size: 10px;>Notification if Thresshold is not meet</th>"
            . "<th><p style=font-size: 10px;>Recharge Channel</p></th><th><p style=font-size: 10px;>Bonus Apps ID</th>"
            . "<th><p style=font-size: 10px;>Bonus Offer ID</th><th><p style=font-size: 10px;>Bonus Product Type</th>"
            . "<th><p style=font-size: 10px;>Bonus Description</p></th><th><p style=font-size: 10px;>Bonus Validity</th>"
            . "<th><p style=font-size: 10px;>Bonus Notes</th><th><p style=font-size: 10px;>Remarks</th>"
            . "<th><p style=font-size: 10px;>Campaign Query</p></th><th><p style=font-size: 10px;>Campaign Configure</th>"
            . "</tr></thead><tbody>";
    
     $pass1=mysql_query( $qmain, $con );
     while($main = mysql_fetch_array($pass1))
    {         
             
//         $main_body="<tr>"
         $message.="<tr>"
            . "<td><p style=font-size: 9px;>".$main['id_campaign']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['campaign_name']."</p></td>"            
            . "<td><p style=font-size: 9px;>".$main['campaign_status']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['campaign_category_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['business_group_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['product_group_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['general_objective_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['brand_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['start_date']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['end_date']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['broadcast_time']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['submission_time']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['sender_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['wording']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['segment_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['seg_desc']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['target']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['segment_detail']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['adn']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['keyword']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_type']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_offer_eligibility']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_measurement']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_nominal']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_meet']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_notmeet']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['recharge_channel']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_apps_id']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_offer_id']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_prod_type']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_desc']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_validity']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['bonus_note']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['remarks']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['campaign_segment_remark']."</p></td>"
            . "<td><p style=font-size: 9px;>".$main['campaign_config_remark']."</p></td>"
            . "</tr>";       
     }
     
//    $main_footer="</tbody></table>";
    $message.="</tbody></table>";
     
    //Main Offer
//    $offer_header="<br><br><h4 style=color: red;>Offer Campaign</h4>"
    $message.="<br><br><h4 style=color: red;>Offer Campaign</h4>"
            . "<table style=margin: 10px 10px 10px 10px; width: 98%;>"
            . "<thead><tr style=background-color:#FFDFDF>"
            . "<th><p style=font-size: 10px; text-align: center;>Campaign ID</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Service Name</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Service API</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Vas Code</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Tarif Code</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>L1</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>L2</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>L3</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>CP Name</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Content ID</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Type Offer</p></th>"
            . "</tr></thead><tbody><tr>"; 
    $qoffer="select * from trx_main_offer where status_mail='CMP_CFG'";
    $pass2=mysql_query( $qoffer, $con );
     while($offer = mysql_fetch_array($pass2))
    {
//         $offer_body="<tr>"
         $message .="<tr>"
            . "<td><p style=font-size: 9px;>".$offer['id_campaign']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['service_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['service_api']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['vas_code']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['tarif_code']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['l1']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['l2']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['l3']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['cp_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['content_id']."</p></td>"
            . "<td><p style=font-size: 9px;>".$offer['type_offer']."</p></td>"
            . "</tr>";
            
    }
//    $offer_footer="</tbody></table>";
    $message .="</tbody></table>";
    
    //main support file
//    $support_header ="<br><br><h4 style=color: red;>Suppport File</h4><table style=margin: 10px 10px 10px 10px; width: 98%;><thead><tr style=background-color:#FFDFDF>"
    $message .="<br><br><h4 style=color: red;>Suppport File</h4><table style=margin: 10px 10px 10px 10px; width: 98%;><thead><tr style=background-color:#FFDFDF>"
            . "<th><p style=font-size: 10px; text-align: center;>Campaign ID</p></th>"           
            . "<th><p style=font-size: 10px; text-align: center;>File Name</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Original File Name</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Upload Date</p></th>"
            . "<th><p style=font-size: 10px; text-align: center;>Download</p></th>"
            . "</tr></thead><tbody>";
    
    $qsupport="select * from trx_main_support_file where status_mail='CMP_CFG'";
    $pass3=mysql_query( $qsupport, $con );
     while($support_mail = mysql_fetch_array($pass3))
    {
//            $support_body="<tr>"
            $message .="<tr>"
            . "<td><p style=font-size: 9px;>".$support['id_campaign']."</p></td>"
            . "<td><p style=font-size: 9px;>".$support['file_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$support['file_orig_name']."</p></td>"
            . "<td><p style=font-size: 9px;>".$support['upload_date']."</p></td>"
            . "<td><p style=font-size: 9px; text-align: center><a href=$support[file_dir]>Download File</a></p></td>"
            . "</tr>";
            
    }
//    $support_footer="</tbody></table></body>\n";
    $message .="</tbody></table></body>\n";

       
    $recipientsCC=array(
        'ady.xcloud7@gmail.com'=>'Nur Ady',
        'hendisantika@gmail.com'=>'Hendi Santika'
    );
    
    $mail=new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPAuth=FALSE;
    $mail->Host="smtprelay.telkomsel.co.id";
    $mail->Username="Campaign.Submission.Tools@cddsuipdb1.telkomsel.co.id";
    $mail->Password="";
    $mail->Port=25;
    
    $mail->From="Campaign.Submission.Tools@cddsuipdb1.telkomsel.co.id";
    $mail->FromName="CST-App";
    $mail->AddAddress("imam_w_priyanto@telkomsel.co.id","Imam W Priyanto");
    foreach ($recipientsCC as $email=>$name){
        $mail->AddCC($email,$name);
    }
    $mail->IsHTML(TRUE);
    $mail->Subject="CST-Apps Configure";
    $mail->Body=$message;  
    if($mail->Send()){
        //update CMP_CFG to CFG_CDDS
//        $upmain="update trx_main_campaign set status_mail='CMP_CFG' where status_mail='CFG_CDDS'";
//        mysql_query($upmain,$con);
//        $upoffer="update trx_main_offer set status_mail='CMP_CFG' where status_mail='CFG_CDDS'";
//        mysql_query($upoffer,$con);
//        $upsupport="update trx_main_support_file set status_mail='CMP_CFG' where status_mail='CFG_CDDS'";
//        mysql_query($upsupport,$con);
        echo 'Email Sent';
    }  else {
        echo 'Email Not Sent';
    }    
?>
