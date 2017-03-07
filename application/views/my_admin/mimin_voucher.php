<div class="row">
    <div class="col-md-12">
        <h2>Voucher Isi Ulang DashBoard</h2>   
    </div>
</div>              
<hr />
<div class="row text-center pad-top">
    <div class="easyui-tabs">
        <div title="Master Voucher" style="padding:10px">
            <p><a href="<?php echo base_url();?>mimin/mimin_home">Beranda</a> / <a href="<?php echo base_url();?>mimin/voucher/tambah">Tambah Data</a></p>
            <hr>
            <?php
                if($voucher_tambah != NULL) {
            ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <?php echo $voucher_tambah; ?>
                </div>
            <?php
                }
            ?>
            <?php
                if($voucher_delete != NULL) {
            ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <?php echo $voucher_delete; ?>
                </div>
            <?php
                }
            ?>
            <b>DATA MASTER VOUCHER</b>
            <table class="table table-striped table-bordered" id="voucher_list" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="center"><p style="font-size: 14px; text-align: center;">No<p></th>
                        <th class="center"><p style="font-size: 14px; text-align: center;">ID Voucher<p></th>                        
                        <th class="center"><p style="font-size: 14px; text-align: center;">Nama Voucher<p></th>
                        <th><p style="font-size: 13px; text-align: center;" >Action<p></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($rownum_voucher == 0) {
                        echo '<tr><td colspan="4">Tidak ada data!</td></tr>';
                    } else {
                        $no=1;
                        foreach ($voucher_list as $voucher):
                    ?>
                    <tr>
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $no;?></p></td>                        
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $voucher["id_voucher"];?></p></td>                        
                        <td class="center"><p style="font-size: 12px; text-align: center;" ><?php echo $voucher["nama_voucher"];?></p></td>
                        <td style="width: 50px; text-align: center;">                            
                            <a href="<?php echo base_url()."mimin/voucher/delete/".$voucher["id_voucher"];?>">
                                <img src="<?php echo base_url();?>assets/ico/delete.png"/>
                            </a>
                        </td>
                    </tr>        
                    <?php
                    $no++;
                    endforeach; }
                    ?>                    
                </tbody>                
            </table>
        </div>
        <div title="Master Nominal Voucher">
            
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    $('#voucher_list').DataTable();
} );
</script>