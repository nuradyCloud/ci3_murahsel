<div class="row">
    <div class="col-md-12">
        <h2>Admin Management</h2>   
    </div>
</div>              
<hr />
<!--admin_alert-->
<?php
if ($minuser_tambah != NULL) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?php echo $minuser_tambah; ?>
    </div>
    <?php
}
?>
<?php
if ($minuser_delete != NULL) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?php echo $minuser_delete; ?>
    </div>
    <?php
}
?>

<div class="row">
    <p><a href="<?php echo base_url(); ?>mimin/mimin_home">Beranda</a> / <a href="<?php echo base_url(); ?>mimin/admin_user/tambah">Tambah Data</a></p>
    <hr>            
    <b>DATA ADMIN</b>
    <table class="table table-striped table-bordered" id="minuser_list" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="center"><p style="font-size: 14px; text-align: center;">No<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">User Name<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">User Email<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">Password<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">Status<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">IP Location<p></th>
                <th class="center"><p style="font-size: 14px; text-align: center;">Last Login<p></th>
                <th><p style="font-size: 13px; text-align: center;" >Action<p></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($rownum_minuser == 0) {
                echo '<tr><td colspan="4">Tidak ada data!</td></tr>';
            } else {
                $no = 1;
                foreach ($minuser_list as $minuser):
                    ?>
                    <tr>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $no; ?></p></td>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["user_name"]; ?></p></td>                        
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["user_email"]; ?></p></td>                        
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["password"]; ?></p></td>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["status"]; ?></p></td>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["ip_location"]; ?></p></td>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $minuser["last_login"]; ?></p></td>
                        <td style="width: 50px; text-align: center;">                            
                            <a href="<?php echo base_url() . "mimin/admin_user/delete/" . $minuser["user_name"]; ?>">
                                <img src="<?php echo base_url(); ?>assets/ico/delete.png"/>
                            </a>
                        </td>
                    </tr>        
                    <?php
                    $no++;
                endforeach;
            }
            ?>                    
        </tbody>                
    </table>
</div>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#minuser_list').DataTable();
    });
</script>