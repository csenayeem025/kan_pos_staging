<?php ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Customer</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp" id="discover">
        <!--STRIPE-->
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="<?php base_url(); ?>customers" class="btn btn-info pull-left btn-add---">Customer List</a>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-12 col-md-12">

                                    <div class="panel">
                                        <div class="panel-content">
                                            <form id="currentAdminForm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>saveUpdateAllDiscover">
                                                <div class="row">
                                                    <div class="message-container alert alert-danger">
                                                        <ul></ul>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="code" class=" control-label">Customer Name<span class="required">*</span></label>
                                                        <input type="text" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Customer Name" id="name" name="name"  placeholder="Customer Name">
                                                    </div>
                                                    <div class="col-md-6" style="display: none;">
                                                        <label for="name" class=" control-label">Customer URL<span class="required">*</span></label>
                                                        <input type="text"  class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Customer Url" id="slug" name="slug" placeholder="Customer Url">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="cost" class=" control-label"> Company Name<span class="required">*</span></label>
                                                        <input type="text" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Company Name" id="pharmacy_name" name="pharmacy_name"  placeholder="Company Name">
                                                    </div>
                                                    <div class="col-md-6" style="display:none;">
                                                        <label for="brand" class=" control-label"> Customer Type<span class="required">*</span></label>
                                                        <select name="customer_type_id" id="customer_type_id" class="form-control" style="width: 100%" >

                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="name" class=" control-label">Customer Code</label>
                                                        <input type="text" class="form-control" id="customer_code" name="customer_code"  placeholder="Customer Code" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="unit" class=" control-label">Email<span class="required">*</span></label>
                                                        <input type="text" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Email Account" id="email" name="email"  placeholder="Email Account">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="size" class=" control-label">Phone<span class="required">*</span></label>
                                                        <input type="text" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Phone Number" id="phone" name="phone"  placeholder="Phone Number">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="dprice" class=" control-label">Address<span class="required">*</span></label>
                                                        <input type="text" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Customer Address" id="address" name="address"  placeholder="Customer Address">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="textareaMaxLength" class=" control-label">Note<span class="required">*</span></label>
                                                        <textarea class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Customer Details" name="remarks" rows="3" id="remarks" placeholder="Write a Customer Details" maxlength="512"></textarea>
                                                    </div>
                                                    <div class="col-md-6" style="display: none;">
                                                        <label for="name" class=" control-label">Product Details<span class="required">*</span></label>
                                                        <textarea class="ckeditor form-control" id="body" name="body" rows="6" data-error-container="#editor2_error"></textarea>

                                                    </div>
                                                    <div class="col-md-12" style="display: none">
                                                        <label class="col-lg-3 control-label">Category:</label>
                                                        <div class="col-lg-7">
                                                            <input id="category" name="category" value="customers" class="form-control validate[required]" type="text" >
                                                            <div id="tree" style="height:300px; overflow-x: scroll;"></div>

                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12" style="clear: both;">

                                                        <label for="name" class=" control-label">Is Active?<span class="required">*</span></label>
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
                                                    <a href="<?php base_url(); ?>customers" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                        <input type="hidden" id="customers" />
                                    </div>
                                </div>
                            </div>

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
    .col-md-6{
        margin-top:10px;
    }
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
<script type="text/javascript">
    $(function () {
        function onCategoryTableUPdate() {

            $.ajax({
                url: baseUrl + 'admin/getCustomerType',
                type: 'post',
                data: {type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    console.log(zNodes);
                    if (zNodes.length > 0) {
                        html = '';
                        for (i = 0; i < zNodes.length; i++) {
                            html += '<option value="' + zNodes[i]['id'] + '">' + zNodes[i]['name'] + '</option>';

                        }
                        $('#customer_type_id').html(html);

                    } else {
                        $('#customer_type_id').html('<option value="">No</option>');
                    }
                }
            });
        }
        onCategoryTableUPdate();
    });

</script>


