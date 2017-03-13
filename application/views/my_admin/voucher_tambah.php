<div class="row">
    <div class="col-md-12">
        <h2>Voucher Isi Ulang DashBoard</h2>   
    </div>
</div>              
<hr />
<div class="row">
    <p><a href="<?php echo base_url(); ?>mimin">Beranda</a> / <a href="<?php echo base_url(); ?>mimin/voucher/tambah">Tambah Data</a></p>
    <hr>
    <b>TAMBAH DATA VOUCHER</b>
    <form method="POST" action="<?php echo base_url()?>mimin/voucher/save_tambah">
        <table>
            <tr>
                <td>ID Voucher</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="1" required="" size="1" name="id_voucher" style="text-transform: uppercase"/></td>
            </tr>
            <tr>
                <td>Nama Voucher</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="10" required="" size="10" name="nama_voucher" style="text-transform: uppercase"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>    
</div>