<?php ?>
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
    <div class="row animated fadeInUp">
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
                            <form class="form-horizontal form-stripe">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">

                                        <div class="panel">
                                            <div class="panel-content">
                                                <form id="messagebox-validation"  class="">
                                                    <div class="row">
                                                        <div class="message-container alert alert-danger">
                                                            <ul></ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="code" class=" control-label">Customer Name<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="code" name="customer_name" required placeholder="Customer Name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="cost" class=" control-label"> Company Name<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="cost" name="customer_company" required placeholder="Company Name">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="name" class=" control-label">Customer Code<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="name" name="customer_code" required placeholder="Customer Code">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="unit" class=" control-label">Email<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="unit" name="customer_email" required placeholder="Email Account">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="size" class=" control-label">Phone<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="size" name="customer_phone" required placeholder="Phone Number">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="dprice" class=" control-label">Address<span class="required">*</span></label>
                                                            <input type="text" class="form-control" id="dprice" name="customer_address" required placeholder="Customer Address">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="textareaMaxLength" class=" control-label">Note<span class="required">*</span></label>
                                                            <textarea class="form-control" name="customer_details" rows="3" id="textareaMaxLength" placeholder="Write a Customer Details" maxlength="512"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="panel-content">
                                                        <div class="row">
                                                            <div class="col-sm-offset-5 col-sm-9">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-footer">                    
                                                        <input name="id" id="id" value="" class="hideme" />      
                                                        <input name="bodytxt" id="bodytxt" value="" class="hideme" /> 
                                                        <input name="cat_id" id="cat_id" value="" class="hideme" /> 
                                                        <input name="parent_cat_id" id="parent_cat_id" value="1" class="hideme" /> 
                                                        <input name="thumbimage" id="thumbimage" value="" class="thumbimage hideme" />
                                                        <input name="bgimage" id="thumbimage" value="" class="bgimage hideme" />
                                                        <input name="iconimage" id="thumbimage" value="" class="iconimage hideme" />
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
                            </form>
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


