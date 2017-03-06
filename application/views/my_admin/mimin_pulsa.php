<div class="row">
    <div class="col-md-12">
        <h2>Voucher Isi Ulang DashBoard</h2>   
    </div>
</div>              
<hr />
<div class="row text-center pad-top">
    <div class="easyui-tabs">
        <div title="Master Voucher" style="padding:10px">
            <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
            <hr>
            <b>DATA MASTER VOUCHER</b>
            <table class="display" id="voucher_list">
                <thead>
                    <tr>
                        <th class="center"><p style="font-size: 13px; text-align: center;">No<p></th>
                        <th class="center"><p style="font-size: 13px; text-align: center;">ID Voucher<p></th>                        
                        <th class="center"><p style="font-size: 13px; text-align: center;">Nama Voucher<p></th>
                        <th><p style="font-size: 13px; text-align: center;" >Action<p></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($voucher_list as $voucher):
                    ?>
                    <tr>
                        <td class="center"><p style="font-size: 11px; text-align: center;" ><?php echo $voucher["id_voucher"];?></p></td>                        
                        <td class="center"><p style="font-size: 11px; text-align: center;" ><?php echo $voucher["nama_voucher"];?></p></td>
                        <td style="width: 50px; text-align: center;">                            
                            <a href="<?php echo base_url()."mimin/pulsa/edit/".$voucher["id_voucher"];?>">
                                <img src="<?php echo base_url();?>assets/ico/edit.png"/>
                            </a>&nbsp;&nbsp;                            
                            <a href="<?php echo base_url()."mimin/pulsa/delete/".$voucher["id_voucher"];?>">
                                <img src="<?php echo base_url();?>assets/ico/delete.png"/>
                            </a>&nbsp;&nbsp;                            
                        </td>
                    </tr>        
                    <?php
                        endforeach;
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