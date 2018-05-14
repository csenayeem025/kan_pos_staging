<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en" class="fixed margin-padding">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php echo (isset($title)?$title:'KAN Admin Portal');?></title>
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?><?php echo (isset($favicon)?$favicon:'favicon-96x96.png');?>?time=<?php echo time();?>">
    <!--load progress bar-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/vendor/pace/pace.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/pace/pace.min.js">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/pace/pace-theme-minimal.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/animate.css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/css/style.css?time=<?php echo time();?>">
<!--    <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery-1.12.3.min.js"></script>-->
    <script src="<?=base_url()?>assets/js/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url() ?>assets/select2group/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
    var baseUrl='<?php echo base_url(); ?>';
    </script>
</head>

<body>
    <div class="wrap">
            <!-- page HEADER -->
            <!-- ========================================================= -->
            <div class="page-header">
                <!-- LEFTSIDE header -->
                <div class="leftside-header">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>admin/banglaadmin" class="on-click">
                            <img alt="logo" src="<?php echo base_url(); ?>uploads/filemanager/logo.png?time=<?php echo time();?>" />
                        </a>
                    </div>
                    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <!-- RIGHTSIDE header -->
                <div class="rightside-header">
                    <div class="header-middle"></div>
                    <!--NOCITE HEADERBOX-->
                    <div class="header-section hidden-xs" id="notice-headerbox">
                        <!--alerts notices-->
                        <div class="notice" id="alerts-notice">
                            <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                            <div class="dropdown-box basic">
                                <div class="drop-header">
                                    <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                    <span class="badge x-danger b-rounded">7</span>

                                </div>
                                <div class="drop-content">
                                    <div class="widget-list list-left-element list-sm">
                                        <ul>
                                            <li>
                                                <a href="<?=base_url();?>">
                                                    <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                    <div class="text">
                                                        <span class="title">8 Bugs</span>
                                                        <span class="subtitle">reported today</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url();?>">
                                                    <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                    <div class="text">
                                                        <span class="title">Error</span>
                                                        <span class="subtitle">sevidor C down</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url();?>">
                                                    <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                    <div class="text">
                                                        <span class="title">New Configuration</span>
                                                        <span class="subtitle"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url();?>">
                                                    <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                    <div class="text">
                                                        <span class="title">14 Task</span>
                                                        <span class="subtitle">completed</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=base_url();?>">
                                                    <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                    <div class="text">
                                                        <span class="title">21 Menssage</span>
                                                        <span class="subtitle"> (see more)</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="drop-footer">
                                    <a>See all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-separator"></div>
                    </div>
                    
                    <!--USER HEADERBOX -->
                    <div class="header-section" id="user-headerbox">
                        <div class="user-header-wrap">
                            <div class="user-photo">
                                <img alt="profile photo" class="img-circle" src="<?php echo base_url(); ?>uploads/avatars/<?php echo (isset($_SESSION['MusicUsers_sImage'])&&!empty($_SESSION['MusicUsers_sImage']))?$_SESSION['MusicUsers_sImage']:'anonyme.png';?>" />
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?php echo $_SESSION['MusicUsers_full_name'];?></span>
                                <span class="user-profile"><?php echo $_SESSION['MusicUsers_user_type'];?></span>
                            </div>
                            <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                            <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                        </div>
                        <div class="user-options dropdown-box">
                            <div class="drop-content basic">
                                <ul>
                                    <li> <a href="<?=base_url()?>admin/myprofile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                    <li> <a href="<?=base_url()?>admin/logout"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                    <!--Log out -->
                    <div class="header-section">
                        <a href="<?=base_url()?>admin/logout" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body">