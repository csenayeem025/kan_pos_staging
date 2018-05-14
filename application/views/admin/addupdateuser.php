<?php ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>User</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp" id="admin_users">
        <!--STRIPE-->
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="<?php base_url(); ?>users" class="btn btn-info pull-left btn-add---">User List</a>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="currentAdminForm" method="post" action="<?php echo base_url(); ?>admin/userSaveUpdate">
                                <div class="form-group">
                                    <label class="control-label">Full Name:</label>
                                    <input id="full_name" name="full_name" data-validation="required" data-validation-error-msg="Please give your full name" class="form-control placeholder-no-fix" type="text" placeholder="Enter your Full Name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <input id="email" name="email" class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your email" placeholder="Enter your email">
                                </div> 
                                <div class="form-group">
                                    <label class="control-label">User Type:</label>
                                    <select class="form-control select2 user_type" id="user_type" name="user_type" data-placeholder="User Types" style="width: 100%;">                          
                                        <option>Admin</option>
                                        <option>Manager</option>
                                        <option>Accountant</option>
                                        <option>Employee</option>
                                    </select>
                                </div>     
                                <div class="form-group">
                                    <label class="control-label">Phone:</label>
                                    <input id="phone" name="phone" class="form-control" type="text" data-validation="required" data-validation-error-msg="Please give your phone" placeholder="Enter your Phone">

                                </div> 
                                <div class="form-group">
                                    <label class="control-label">New Password:</label>
                                    <input id="newpassword" name="newpassword" class="form-control placeholder-no-fix"  data-validation-error-msg="Please give password" type="password" placeholder="Enter your new password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirm Password:</label>
                                    <input id="confirmpassword" name="confirmpassword" class="form-control placeholder-no-fix" type="password"  data-validation-error-msg="Please give confirm password" placeholder="Enter your confirm  password">
                                    <input id="token" name="token" value="<?php echo (isset($token) ? $token : ''); ?>" class="form-control" type="hidden" placeholder="Enter your confirm  password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status:</label>

                                    <label class="">
                                        <div class="iradio_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="radio" checked="" class="flat-red" name="isActive" value="1" style="position: absolute; opacity: 0;"><ins title="Enable" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                                    </label>
                                    <label class="">
                                        <div class="iradio_flat-green" style="position: relative;" aria-checked="true" aria-disabled="false"><input type="radio" class="flat-red" name="isActive" value="0" style="position: absolute; opacity: 0;"><ins title="Disable" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                                    </label>

                                </div>      
                                <div class="box-footer">                    
                                    <input name="id" id="id" value="" class="hideme" />                        
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />
                                    <button class="btn btn-info pull-right btn-form-save" type="submit">Save</button>
                                    <a href="<?php base_url(); ?>users" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" >Cancel</a>
                                </div>
                            </form>
                            <input type="hidden" id="users" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<style type="text/css">
    
    #msg{
        display:none;
    }
    .select2-container .select2-selection--single{
        height:34px !important;
    }
    .select2-selection__rendered{
        padding-left:0 !important;
    }
    .hideme{
        display:none;
    }
    
    #loader-gallery, #loader-gallery1{
        width: 36px;
        height: 36px;
        display:none;
    }
    .upload-statusbar{
        display:none;
    }
    #image-holder,#image-holder1{
        display:none;
    }
    .removeImg,.removeImg1{
        cursor:pointer;
    }
    #image-holder img.img,#image-holder1 img.img1{
        width:100px;
    }
</style>
<script type="text/javascript">
    var contentid='<?php echo (isset($_GET['contentid'])&&!empty($_GET['contentid']))?$_GET['contentid']:''?>';
</script>



