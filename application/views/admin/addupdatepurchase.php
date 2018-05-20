<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/gh/atatanasov/gijgo@1.8.0/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Purchase</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp isProductForm" id="discover">
        <!--STRIPE-->
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="<?php base_url(); ?>purchases" class="btn btn-info pull-left btn-add---">Purchase List</a>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="currentAdminForm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>saveUpdateAllDiscover">
                                <div class="col-md-6">
                                    <label for="name" class=" control-label">Product Name<span class="required">*</span></label>
                                    <input type="text"  class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Product Name" id="name" name="name" placeholder="Product Name">
                                </div>
                                <div class="col-md-6" style="display: none;">
                                    <label for="name" class=" control-label">Product URL<span class="required">*</span></label>
                                    <input type="text"  class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Product Url" id="slug" name="slug" placeholder="Product Url">
                                </div>
                                
                                

                                <div class="col-md-12" style="display: none">
                                    <label class="col-lg-3 control-label">Category:</label>
                                    <div class="col-lg-7">
                                        <input id="category" name="category" value="purchases" class="form-control validate[required]" type="text" >
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
                                <div class="box-footer">                    
                                    <input name="id" id="id" value="" class="hideme" />      
                                    <input name="bodytxt" id="bodytxt" value="" class="hideme" /> 
                                    <input name="cat_id" id="cat_id" value="" class="hideme" /> 
                                    <input name="parent_cat_id" id="parent_cat_id" value="1" class="hideme" /> 
                                    <input name="isAd" id="isAd" value="1" class="hideme" />
                                    <input name="sImage" id="sImage" class="hideme" value="" />
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />
                                    <button class="btn btn-info pull-right btn-form-save" type="submit">Save</button>
                                    <a href="<?php base_url(); ?>purchases" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                </div>
                            </form>
                            <input type="hidden" id="purchases" />
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
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";

        var tree = $('#tree').tree({
            primaryKey: 'id',
            uiLibrary: 'bootstrap',
            checkboxes: true,
            cascadeCheck: false,
            dataSource:<?php echo $getCategoryCheckTree; ?>
        });
        var getCheckedNotesArray = new Array();
        var edit =<?php echo $edit; ?>;
        if (edit == 1) {
            $('#cat_id').val('<?php echo $cat_id; ?>');
            cat_id = '<?php echo $cat_id; ?>';
            cat_id = cat_id.replace(/##/g, ',')
            cat_id = cat_id.replace(/#/g, "");
            getCheckedNotesArray = cat_id.split(",");
            getCheckedNotesArray = $.map(cat_id.split(','), Number);
        }
        $('#tree input[type=checkbox]').on('click', function () {
            var checkedIds = tree.getCheckedNodes();

            node = $(this).closest("li").data('id');
            if ($(this).prop("checked")) {
                var i = getCheckedNotesArray.indexOf(node);
                if (i != -1) {
                    getCheckedNotesArray.splice(i, 1);
                }
                getCheckedNotesArray.push(node);
            } else {
                var i = getCheckedNotesArray.indexOf(node);
                if (i != -1) {
                    getCheckedNotesArray.splice(i, 1);
                }
            }

            getCheckedNotesArray = getCheckedNotesArray.sort(function (a, b) {
                return a - b
            });// asending
            console.log(getCheckedNotesArray);

            var catidstr = '';
            $.each(getCheckedNotesArray, function (key2, val2) {
                catidstr += "#" + val2 + "#";
            });
            $('#cat_id').val(catidstr);
            console.log(catidstr);
            //console.log(checkedIds);
        });
        function getSuppliers() {
            
            $.ajax({
                url: baseUrl + 'admin/getSuppliers',
                type: 'post',
                data: { type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    console.log(zNodes);
                    if (zNodes.length > 0) {
                        html = '<option value="S00000">No</option>';
                        for (i = 0; i < zNodes.length; i++) {
                            html+='<option value="' + zNodes[i]['supplier_code'] + '">' + zNodes[i]['name'] + '</option>';
                            
                        }
                        $('#supplier_code').html(html);
                        
                    } else {
                        $('#supplier_code').html('<option value="S00000">No</option>');
                    }
                }
            });
        }
        getSuppliers();
        function onCategoryTableUPdate() {
            
            $.ajax({
                url: baseUrl + 'admin/getBrands',
                type: 'post',
                data: { type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    console.log(zNodes);
                    if (zNodes.length > 0) {
                        html = '';
                        for (i = 0; i < zNodes.length; i++) {
                            html+='<option value="' + zNodes[i]['id'] + '">' + zNodes[i]['name'] + '</option>';
                            
                        }
                        $('#type_id').html(html);
                        
                    } else {
                        $('#type_id').html('<option value="">No</option>');
                    }
                }
            });
        }
        onCategoryTableUPdate();
    });
</script>



