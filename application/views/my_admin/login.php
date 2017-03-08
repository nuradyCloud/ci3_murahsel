<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Murahsel Administrator</title>
        <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
        <link rel="stylesheet" href="<?php base_url()?>assets/login_admin/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <?php
            if ($success_admin != NULL) {
                ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <?php echo $success_admin; ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($error_admin != NULL) {
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <?php echo $error_admin; ?>
                </div>
                <?php
            }
            ?>
            <form class="form-signin" method="POST" action="<?php echo base_url();?>mimin/login">       
                <h2 class="form-signin-heading">Please login</h2>
                <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/>                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
