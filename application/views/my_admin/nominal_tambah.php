<div class="row">
    <div class="col-md-12">
        <h2>Voucher Isi Ulang DashBoard</h2>   
    </div>
</div>              
<hr />
<div class="row">
    <p><a href="<?php echo base_url(); ?>mimin/mimin_home">Beranda</a> / <a href="<?php echo base_url(); ?>mimin/nominal/tambah">Tambah Data</a></p>
    <hr>
    <b>TAMBAH DATA NOMINAL</b>
    <form method="POST" action="<?php echo base_url()?>mimin/nominal/save_tambah">
        <table>
            <tr>
                <td>ID Nominal</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="1" required="" size="1" name="id_nominal"/></td>
            </tr>
            <tr>
                <td>Nama Nominal</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="25" required="" size="25" name="nama_nominal"/></td>
            </tr>
            <tr>
                <td>Value Nominal</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="12" required="" size="12" name="value_nominal" onkeypress="return isNumber(event);"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>    
</div>

<script type="text/javascript">                  
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
           return false;
        }
           return true;
    }
</script>