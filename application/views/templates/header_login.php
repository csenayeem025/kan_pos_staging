<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php echo (isset($title)?$title:'KAN Admin Portal');?></title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/css/style.css">
    <script type="text/javascript">
    var baseUrl='<?php echo base_url(); ?>';
    </script>
</head>

<body>
<div class="wrap">
    <!-- page BODY -->