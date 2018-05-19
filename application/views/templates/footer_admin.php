</div>

</div>
<div class="page-footer">
    <center> <p class="copyright">Copyright &copy; <?php echo date('Y'); ?>. Developed by <a href="http://www.genitbd.com/" target="_blank" style="color:#b7b7b7">Nayeem, GenIT</a>. All rights reserved</p> </center>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->

<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="<?= base_url() ?>assets/admin/js/template-script.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--dataTable-->
<script src="<?= base_url() ?>assets/admin/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
<script src="<?= base_url() ?>assets/admin/js/examples/tables/data-tables.js"></script>
<!--Notification msj-->
<script src="<?= base_url() ?>assets/admin/vendor/toastr/toastr.min.js"></script>
<!--morris chart-->
<script src="<?= base_url() ?>assets/admin/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="<?= base_url() ?>assets/admin/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- SECTION script and examples-->
<!--Date picker-->
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js"></script>

<!-- ========================================================= -->

<script src="<?= base_url() ?>assets/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/admin_resource/assets/global/plugins/icheck/icheck.min.js"></script>

<script src="<?= base_url() ?>assets/admin/js/examples/forms/validation.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin_resource/assets/jquery.fileuploadmulti.min.js" ></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/js/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/js/bangla.site.js?time=<?php echo time(); ?>"></script>
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
    .page-footer{
        padding:10px;
        background: #202020;
        color:#fff;
        position:fixed;
        bottom:0;
        width: 100%;
        padding-bottom: 0;
    }
    .pIsActive{
        cursor:pointer;
    }
</style> 
</body>
</html>
