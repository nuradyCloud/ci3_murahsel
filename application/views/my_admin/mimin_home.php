<div class="row">
    <div class="col-md-12">
        <h2>Admin DashBoard</h2>   
    </div>
</div>              
<hr />
<?php
if ($info_admin != NULL) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?php echo $info_admin; ?>
    </div>
    <?php
}
?>
<div class="row text-center pad-top">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>mimin/voucher" >
                <i class="fa fa-mobile fa-5x"></i>
                <h4>Management Voucher Isi Ulang</h4>
            </a>
        </div>
    </div> 

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>upload_bukti" >
                <i class="fa fa-money fa-5x"></i>
                <h4>Management Transaksi Pembayaran</h4>
            </a>
        </div>
    </div>
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>mimin/admin_user/list" >
                <i class="fa fa-user fa-5x"></i>
                <h4>Management User Admin</h4>
            </a>
        </div>
    </div>
</div>