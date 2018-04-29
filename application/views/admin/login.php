<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="ajaxloader"><img src="<?= base_url(); ?>assets/images/ajax-loader.gif"></div>
<!-- page BODY -->
<!-- ========================================================= -->
<div class="page-body animated slideInDown">
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--LOGO-->
    <div class="logo">
        <img alt="logo" src="<?php echo base_url(); ?>uploads/filemanager/logo.png?time=<?php echo time();?>" />
    </div>
    <div class="box">
        <!--SIGN IN FORM-->
        <div class="panel mb-none">
            <div class="panel-content bg-scale-0">
                <form id="login_form" class="login-form" action="<?= base_url(); ?>admin/check_userlogin" method="post">

                    <div class="form-group mt-md">
                        <span class="input-with-icon">
                            <input type="email" name="username" data-validation="required" data-validation-error-msg="Please give your email" class="form-control placeholder-no-fix" id="email" placeholder="Your Email">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <span class="input-with-icon">
                            <input type="password" name="password" data-validation="required" data-validation-error-msg="Please give your password" class="form-control placeholder-no-fix" id="password" placeholder="Password">
                            <i class="fa fa-key"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <div class="checkbox-custom checkbox-primary">
                            <input type="checkbox" id="remember-me" value="option1" checked>
                            <label class="check" for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--                                <button class="btn btn-primary btn-block">Sign in</button>-->
                        <button type="submit" class="btn btn-success uppercase pull-right">Sign in</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group text-center">
                        <a href="<?= base_url(); ?>forgot-password">Forgot password?</a>
                    </div>
                </form>
                <div class="copyright"><p class="copyright">Copyright &copy; <?php echo date('Y'); ?>. Developed by <a href="http://www.genitbd.com/" target="_blank" style="color:#b7b7b7">Nayeem, GenIT</a>.<br> All rights reserved</p> </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog loginModalWrapper" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span style="float:left;">Information</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            </div>

        </div>
    </div>
</div>
<style>
    div#myModal {
        z-index: 9999;
    }
    .modal-dialog{
        top:15%;
    }
    .modal-header{
        min-height:38px !important;
    }
    .modal-backdrop.in{
        opacity: 0;
    }
    .modal-backdrop{
        position: inherit;
    }
    .login{
        background-color: #ccc !important;
    }
    .copyright{
        text-align: center;
    }
</style> 
