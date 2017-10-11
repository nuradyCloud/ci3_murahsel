<div class="row">
    <div class="col-md-12">
        <h2>Dashboard</h2>   
    </div>
</div>              
<hr />
<!--admin_alert-->
<?php
if ($info_pulsa != NULL) {
    ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?php echo $info_pulsa; ?>
    </div>
    <?php
}
?>
<div class="row text-center pad-top">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>pulsa_prabayar" >
                <i class="fa fa-mobile fa-5x"></i>
                <h4>Voucher Isi Ulang</h4>
            </a>
        </div>
    </div> 

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>upload_bukti" >
                <i class="fa fa-upload fa-5x"></i>
                <h4>Upload Bukti Pembayaran</h4>
            </a>
        </div>
    </div>
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
        <div class="div-square">
            <a href="<?php echo base_url()?>cari_status" >
                <i class="fa fa-search fa-5x"></i>
                <h4>Status Transaksi</h4>
            </a>
        </div>
    </div>
</div>