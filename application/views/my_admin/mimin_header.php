<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Murah Selular</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="<?php echo base_url(); ?>assets/simple_admin/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="<?php echo base_url(); ?>assets/simple_admin/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="<?php echo base_url(); ?>assets/simple_admin/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        
        <!--ADD JEASYUI-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui_1.5.1/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui_1.5.1/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui_1.5.1/demo.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui_1.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui_1.5.1/jquery.easyui.min.js"></script>
        
        <!--datatables-->
        <!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables_1.10.13/css/dataTables.bootstrap.min.css">
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/js_css/jquery-1.12.4.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/datatables_1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>assets/datatables_1.10.13/js/dataTables.bootstrap.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">    
                <div class="adjust-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo base_url(); ?>assets/simple_admin/img/logo_header.png" />

                        </a>

                    </div>
                    <span class="logout-spn" >
                        <a href="<?php echo base_url();?>mimin/logout" style="color:#fff;">LOGOUT</a>  
                    </span>
                </div>
            </div>
            <!-- /. NAV TOP  -->  