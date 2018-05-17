<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Supplier</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp" id="discover">
        <!--STRIPE-->
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="<?php base_url();?>suppliers" class="btn btn-info pull-left btn-add---">Supplier List</a>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="currentAdminForm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>saveUpdateAllDiscover">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Supplier Name (<span class="red">*</span>):</label>
                                    <div class="col-lg-7">
                                        <input id="name" name="name" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Supplier Name" type="text" placeholder="Enter Supplier Name">
                                    </div>
                                </div> 
                                <div class="form-group" style="display:none;">
                                    <label class="col-lg-3 control-label">Profile URL (<span class="red">*</span>):</label>
                                    <div class="col-lg-7">
                                        <input id="slug" name="slug" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give url" type="text" placeholder="URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-7">
                                        <input id="email" name="email" class="form-control " type="text" placeholder="Enter Email">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Phone:</label>
                                    <div class="col-lg-7">
                                        <input id="phone" name="phone" class="form-control " type="text" placeholder="Enter Phone">
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Address:</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" id="address" name="address" rows="6"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Supplier Details (<span class="red">*</span>):</label>
                                    <div class="col-lg-7">
                                        <textarea class="ckeditor form-control" id="body" name="body" rows="6" data-error-container="#editor2_error"></textarea>
                                    </div>
                                </div> 
                                <div class="form-group" style="display: none">
                                    <label class="col-lg-3 control-label">Category:</label>
                                    <div class="col-lg-7">
                                        <input id="category" name="category" value="suppliers" class="form-control validate[required]" type="text" >
                                    </div>
                                </div> 
                                <div class="form-group" >
                                    <label class="col-lg-3 control-label">Feature Image (<span class="red">*</span>):</label>
                                    <div class="col-lg-7 pleft">
                                        Proposed Size: 1024X600 or 512X300
                                        <div class="form-group1">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"  style="float:left">
                                                    <img id="my-file-selector1" class="sImage" src="http://www.placehold.it/1024X600/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                <div class="clearfix"></div>
                                                <label class="btn btn-primary btn-upload">
                                                    <input id="my-file-selector" name="image" style="display:none;">                     
                                                </label>				
                                                <div id="image-holder" class="img-responsive" style="max-width:150px;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-7">
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="radio" checked="" class="flat-red" name="isActive" value="1" style="position: absolute; opacity: 0;"><ins title="Enable" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                                        </label>
                                        <label class="">
                                            <div class="iradio_flat-green" style="position: relative;" aria-checked="true" aria-disabled="false"><input type="radio" class="flat-red" name="isActive" value="0" style="position: absolute; opacity: 0;"><ins title="Disable" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                                        </label>
                                    </div>
                                </div>   
                                <div class="box-footer">                    
                                    <input name="id" id="id" value="" class="hideme" />      
                                    <input name="bodytxt" id="bodytxt" value="" class="hideme" /> 
                                    <input name="cat_id" id="cat_id" value="" class="hideme" /> 
                                    <input name="parent_cat_id" id="parent_cat_id" value="1" class="hideme" /> 
                                    <input name="isAd" id="isAd" value="1" class="hideme" />
                                    <input name="sImage" id="sImage" class="hideme" value="" />
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />
                                    <button class="btn btn-info pull-right btn-form-save" type="submit">Save</button>
                                    <a href="<?php base_url();?>suppliers" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                </div>
                            </form>
                            <input type="hidden" id="suppliers" />
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
    var contentid = '<?php echo (isset($_GET['contentid']) && !empty($_GET['contentid'])) ? $_GET['contentid'] : '' ?>';
</script>



