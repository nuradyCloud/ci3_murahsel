<div class="row">
    <div class="col-md-12">
        <h2>Admin Management</h2>   
    </div>
</div>              
<hr />
<div class="row">
    <p><a href="<?php echo base_url(); ?>mimin">Beranda</a> / <a href="<?php echo base_url(); ?>mimin/admin_user/tambah">Tambah Data</a></p>
    <hr>
    <b>TAMBAH DATA ADMIN</b>
    <form method="POST" action="<?php echo base_url()?>mimin/admin_user/save_tambah">
        <table>
            <tr>
                <td>Email</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="30" required="" size="30" name="user_email"/></td>
            </tr>
            <tr>
                <td>Nama Admin</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="text" maxlength="10" required="" size="10" name="user_name"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>&nbsp;:&nbsp;</td>
                <td><input type="password" maxlength="25" required="" size="25" name="password"/></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>&nbsp;:&nbsp;</td>
                <td>
                    <select name="status" required="">
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>
                </td>
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