<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Customers</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight" id="discover">
        <div class="col-sm-12">
            <?php if(isset($_SESSION['MusicUsers_user_type']) && !empty($_SESSION['MusicUsers_user_type'])&& $_SESSION['MusicUsers_user_type']=='Admin'): ?>
        <div class="row">
            <div class="col-xs-12" style="margin-bottom: 10px;">
                <a href="<?php base_url();?>addupdatecustomer" class="btn btn-info pull-left btn-add---">Add Customer</a>
            </div>
        </div>
        <?php endif;?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="adminTable" class="data-table1 table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Serial Id</th>
                                    <th>SL#</th>
                                    <th>Customer Name</th>
                                    <th></th>
                                    <th>Customer Code</th>  
                                    <th>Contact No</th>
                                    <th>Email Address</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="form-group" style="display: none">
                            <label class="col-lg-3 control-label">Category:</label>
                            <div class="col-lg-7">
                                <input id="category" name="category" value="customers" class="form-control " type="text" >
                            </div>
                        </div> 
                        <input type="hidden" id="customers" name="addupdatecustomer" value="addupdatecustomer" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- RIGHT SIDEBAR -->
<script type="text/javascript">
    var contentid='';
</script>
