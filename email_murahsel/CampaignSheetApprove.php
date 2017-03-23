<html>
<meta http-equiv="pragma" content="no-cache" />
<? 
$message .= "<html>\n";
$message .= "<style>
table { 
  border: 0; 
  font-family: arial; 
  font-size:11px; 
} 
th { 
  background-color:yellow; 
  text-align:center     
} 
td { 
  border-bottom:1 solid #000000;
  text-align:center 
} 
.fail { 
  color:#FF0000; 
} 

</style>\n";
?>
<body>

<?
include_once("retention/PHPMailer_v5.1/class.phpmailer.php");
require_once("retention/include/f_include.php");
$con=mysql_connect("127.0.0.1","apps","Cdds#2013");
mysql_select_db("broadband",$con);

$SQL="SELECT * FROM cmp_trans WHERE status='3'";	

$hasil=mysql_query($SQL,$con);

$no=1;
$message .= "Berikut Campaign Baru yang telah di setujui, mohon dicari jumlah target untuk setiap campaign<p>";
$message .= "<table width=110% border=1 align=center style=border-collapse:collapse bordercolor=#CCCCCC>";
$message .=  "<tr>
    <td width=19 bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>No</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Campaign ID</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Campaign Type</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Sender</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Start Periode</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>End Periode</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Broadcast Date</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Campaign Name</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Segment Name</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Notification</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Trigger</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Apps Id</span></strong></p>
    </div></td>
     <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Target</span></strong></p>
    </div></td>
    <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Flagging</span></strong></p>
    </div></td>
<td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>User</span></strong></p>
    </div></td>
<td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>PIC</span></strong></p>
    </div></td>
 <td bgcolor=#FFCC00><div align=center>
      <p><strong><span class=style5>Threshold</span></strong></p>
    </div></td>
  </tr>" ;
  WHILE ($rs=mysql_fetch_array($hasil)) {
   if ($rs[2]=="C") { 
  	$type="Non Real Time - Provisioning";
				if ($rs[19]<>"") {
  				$apps="http://10.2.224.148:10080/reflex/driver.jsp?adn=5115&msg=$rs[19]&msisdn=&lt;msisdn&gt";
  				$trigger=$rs['inputan_trigger'];
  				}
  				if ($rs[20]<>"") {
  				$apps=$rs[27];
  				$trigger="Recharge ".$rs[20].$rs[21].$rs[22];
  				}
	} 
	else if  ($rs[2]=="A") { 
  	$type="Real Time - Provisioning";
  				if ($rs[19]<>"") {
  				$apps="http://10.2.224.148:10080/reflex/driver.jsp?adn=5115&msg=$rs[19]&msisdn=&lt;msisdn&gt";
  				$trigger=$rs['inputan_trigger'];
  				}
  				if ($rs[20]<>"") {
  				$apps=$rs[27];
  				$trigger="Recharge ".$rs[20].$rs[21].$rs[22];
  				}
  	}
	else if  ($rs[2]=="E") { 
  	$type="DUMP"; 
	}else { $type="NON CORE"; }

  $notification=str_replace("&","&amp;",$rs[16]);
  $notification=str_replace(">","&gt;",$notification);
  $notification=str_replace("<","&lt;",$notification);  
  $message .= "<tr><td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$no</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[0]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$type</td>	
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[14]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[8]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[9]</td>
  	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[12]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[1]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px><textarea cols=30 rows=6>$rs[15]</textarea></td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$notification</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$trigger</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$apps</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[26]</td>
  	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[30]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[25]</td>
	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[23]</td>
 	<td style=font-family:Arial, Helvetica, sans-serif style=font-size:12px>$rs[31]</td>
</tr>"; 
  $trigger="";$type="";$apps="";
  $sql_u="UPDATE cmp_trans SET status='4' WHERE id_trans='$rs[0]'";
  $hasil2=mysql_query($sql_u,$con);
  
  $no=$no+1;
}
$message .= "</table>";

$message .= "<br>\n";
$message .= "</body>\n";
echo "$message";

if ($notification<>"") {

$subject = 'Campaign Sheet - Approved ';
$tujuan = 'danang_andrianto@telkomsel.co.id';
$tujuan1 = 'satria@magkna.com';
$tujuan2 = 'aji@magkna.com';
$tujuan3 = 'putri@magkna.com';
$tujuan4 = 'rio@magkna.com';
$tujuan5 = 'okti@magkna.com';
$tujuan6 = 'trisna@magkna.com';
$tujuan7 = 'amar@magkna.com';
$tujuan8 = 'hendra@magkna.com';
$tujuan9 = 'ronald@magkna.com';
$tujuan10= 'rolin@magkna.com';
$tujuan11= 'langit@magkna.com';
$tujuan12= 'fathur@magkna.com';
$tujuan13= 'ulin@magkna.com';
$tujuan14= 'charysa@magkna.com';
$tujuan15= 'wenny@magkna.com';
$tujuan16= 'gedeagus@magkna.com';
$tujuan17= 'inggrit@magkna.com';
$tujuan18= 'fanny@magkna.com';
$tujuan19= 'syam@magkna.com';
$tujuan20= 'anissa@magkna.com';
$tujuan21= 'susanto@magkna.com';
$tujuan22= 'indra.jaya@magkna.com';
$tujuan23= 'dewi.wahyuni@magkna.com';
$tujuan24= 'mariam@magkna.com';

/*$tujuan1 = 'cdds08@telkomsel.co.id';
$tujuan2 = 'cdds12@telkomsel.co.id';
$tujuan3 = 'cdds05@telkomsel.co.id';
$tujuan4 = 'Arif_Firmansyah@telkomsel.co.id';
$tujuan5 = 'Nanda_P_Taswanda@telkomsel.co.id'; */
}
$hasil          = send_email($tujuan, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan1, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan2, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan3, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan4, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan5, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan6, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan7, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan8, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan9, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan10, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan11, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan12, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan13, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan14, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan15, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan16, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan17, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan18, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan19, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan20, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan21, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan22, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan23, $nama, $msisdn, $nama_file, $message, $subject);
$hasil          = send_email($tujuan24, $nama, $msisdn, $nama_file, $message, $subject);


function send_email($tujuan, $nama, $msisdn, $nama_file, $message, $subject)
{

$name_pengirim = "ISC Group";
$pengirim = "ISC-Team@telkomsel.co.id";
//$letak_file = "/var/www/html/retention/uploads/".$nama_file;
//$letak_file_ttd = "/var/www/html/retention/uploads/ttdbn.jpg";
	
$mail = new PHPMailer;
$mail->ClearAddresses();

$mail->IsSMTP();                                      // set mailer to use SMTP
//$mail->Host = "smtprelay.telkomsel.co.id";  // specify main and backup server
$mail->Host = "10.2.121.96";
$mail->SMTPAuth = false;     // turn on SMTP authentication
$mail->Username = "";  // SMTP username
$mail->Password = ""; // SMTP password


$mail->AddAddress($tujuan, $tujuan);
$mail->From = $pengirim;
$mail->FromName = $name_pengirim;
$mail->Subject = $subject;
$mail->Body = $message;
//$mail->AddAttachment($letak_file, $nama_file);
$mail->AddEmbeddedImage($letak_file, 'logo', $letak_file);
$mail->AddEmbeddedImage($letak_file_ttd, 'ttd', $letak_file_ttd);
$mail->IsHTML(true);

if ($mail->Send())
{
print "Email dan File Attachment Sudah di kirim\n";
        return 1;
}
else
{
        echo $mail->ErrorInfo;
        return 0;
}
} //end function
?>
