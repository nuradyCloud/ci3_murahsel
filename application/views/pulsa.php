<div class="row">
    <div class="col-md-12">
        <h2>Voucher Isi Ulang</h2>   
    </div>
</div>              
<hr />
<form name="my_form" action="#" method="POST">
    <table>
        <tr>
            <td>Email</td>
            <td>&nbsp;:&nbsp;</td>
            <td>
                <input type="text" name="my_email" id="email" maxlength="30" size="30" required=""/>
            </td>
        </tr>
        <tr>
            <td>Jenis Voucher</td>
            <td>&nbsp;:&nbsp;</td>
            <td>
                <input type="text" name="my_voucher" id="voucher"/>
            </td>
        </tr>
        <tr>
            <td>Nomer Tujuan</td>
            <td>&nbsp;:&nbsp;</td>
            <td>
                <input type="text" name="my_number" id="number" onkeypress="return isNumber(event);" maxlength="15" size="15" required=""/>
            </td>
        </tr>
        <tr>
            <td>Nominal Voucher</td>
            <td>&nbsp;:&nbsp;</td>
            <td>
                
            </td>
        </tr>        
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td>
                <input type="submit" name="save" value="Simpan" onclick="ValidateEmail(email)"/>
            </td>
        </tr>
    </table>    
</form>
<script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function ValidateEmail(inputText)
    {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (inputText.value.match(mailformat))
        {
            $('#email').focus();
            return true;
        } else
        {
            alert("You have entered an invalid email address!");
            $('#email').focus();
            return false;
        }
    }
</script>