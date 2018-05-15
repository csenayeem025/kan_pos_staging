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
                <li><a>Category</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp" id="discover">
        <!--STRIPE-->
        <div class="col-md-12" id="admin_category">
            <div class="row">
                <div class="col-xs-12" style="margin-bottom: 10px;">
                    <a href="<?php base_url(); ?>category" class="btn btn-info pull-left btn-add---">Category List</a>
                </div>
            </div>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="currentAdminForm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>saveUpdateAllDiscover">
                                <div class="form-group col-md-12">
                                    <label class="col-lg-2 control-label">Main Category (<span class="red">*</span>):</label>
                                    <div class="col-lg-10">
                                        <select name="parent_id" multiple='multiple' id="currentCategory" data-validation-error-msg="Please give your category" class="form-control">
                                            <optgroup label="Default"></optgroup>
                                            <?php if (isset($categories) && !empty($categories)): ?>
                                                <?php foreach ($categories as $key => $val): ?>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option><?php echo $val['name']; ?></option>
                                                    </optgroup>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-md-6" style="display:none;">
                                    <label class="col-lg-4 control-label">Category Type:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" id="type" name="type">
                                            <option>Product</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group col-md-12">
                                    <label class="col-lg-2 control-label">Category Name (<span class="red">*</span>):</label>
                                    <div class="col-lg-10">
                                        <input id="name" name="name" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Category Name" type="text" placeholder="Enter Category Name">
                                    </div>
                                </div> 
                                <div class="form-group col-md-12" style="display: none;">
                                    <label class="col-lg-4 control-label">Category URL (<span class="red">*</span>):</label>
                                    <div class="col-lg-8">
                                        <input id="slug" name="slug" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give url" type="text" placeholder="URL">
                                    </div>
                                </div>

                                <div class="form-group" style="display: none">
                                    <label class="col-lg-4 control-label">Category:</label>
                                    <div class="col-lg-8">
                                        <input id="category" name="category" value="category" class="form-control validate[required]" type="text" >
                                    </div>
                                </div> 
                                <div class="form-group col-md-6 thumbimage" style="clear:both;">
                                    <label class="col-lg-4 control-label">Thumb Image (<span class="red">*</span>):</label>
                                    <div class="col-lg-8 pleft">
                                        Proposed Size: 512X300
                                        <div class="form-group1">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"  style="float:left">
                                                    <img  id="my-file-selector1" class="sImage" src="http://www.placehold.it/1024X600/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                <div class="form-group col-md-6 iconimage" >
                                    <label class="col-lg-4 control-label">Icon Image:</label>
                                    <div class="col-lg-8 pleft">
                                        Proposed Size: 128X128
                                        <div class="form-group1">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"  style="float:left">
                                                    <img id="my-file-selector" class="sImage_icon" src="http://www.placehold.it/1024X600/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                <div class="clearfix"></div>
                                                <label class="btn btn-primary btn-upload">
                                                    <input id="my-file-selector3" name="image" style="display:none;">                     
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
                                    <input name="thumbimage" id="thumbimage" value="" class="thumbimage hideme" />
                                    <input name="bgimage" id="thumbimage" value="" class="bgimage hideme" />
                                    <input name="iconimage" id="thumbimage" value="" class="iconimage hideme" />
                                    <input name="isAd" id="isAd" value="1" class="hideme" />
                                    <input name="sImage" id="sImage" class="hideme" value="" />
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />
                                    <button class="btn btn-info pull-right btn-form-save" type="submit">Save</button>
                                    <a href="<?php base_url(); ?>category" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                </div>
                            </form>
                            <input type="hidden" id="category" />
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
<script type="text/javascript">
    function onModalAlert(str) {
                $('#myModal .modal-body').html(str);
                $('#myModal').modal('show');
            }
    $(document).ready(function () {
        if ($('#admin_category').length > 0) {
            

            $('body').on('click', '.my_cat_table tr', function () {
                id = $(this).data('id');
                //onGetCategory(id);
            });
            
            
            function initUpload_audio(localData) {

                if (localData == 1)
                    str = '';
                else if (localData == 2)
                    str = 'Upload Background';
                else
                    str = 'Upload Feature Image';

                allowedType = 'jpg,png,gif,jpeg';

                var settings = "settings_" + localData;
                settings = {
                    url: baseUrl + 'admin/fileupload?action=featurefileupload',
                    method: "POST",
                    allowedTypes: allowedType,
                    fileName: "image",
                    multiple: false,
                    cache: false,
                    dragDropStr: '<span>' + str + '</span>',
                    onSubmit: function () {
                        this.url = baseUrl + 'admin/fileupload?action=featurefileupload';
                        $('#loader-gallery' + localData).show();
                    },
                    onSuccess: function (files, data, xhr)
                    {
                        response = $.parseJSON(data);
                        console.log(response);
                        if (response.status == 1) {
                            //alert(localData);

                            $('.bgimage .sImage').attr('src', baseUrl + response.imgurl);
                            $('.bgimage').val(response.imgurl);

                            onModalAlert('Successully uploaded.');
                        } else {
                            onModalAlert(response.error);

                        }
                    },
                    afterUploadAll: function ()
                    {

                    },
                    onError: function (files, status, errMsg)
                    {
                        $('#myModal .modal-body').html('There are uploading problem.');
                        $('#myModal').modal('show');
                    }
                }

                $("#my-file-selector" + localData).uploadFile(settings);
            }
            function initUpload_icon(localData) {

                if (localData == 1)
                    str = '';
                else if (localData == 2)
                    str = 'Upload File';
                else
                    str = 'Upload Icon';

                allowedType = 'jpg,png,gif,jpeg,ico';

                var settings = "settings_" + localData;
                settings = {
                    url: baseUrl + 'admin/fileupload?action=featurefileupload',
                    method: "POST",
                    allowedTypes: allowedType,
                    fileName: "image",
                    multiple: false,
                    cache: false,
                    dragDropStr: '<span>' + str + '</span>',
                    onSubmit: function () {
                        this.url = baseUrl + 'admin/fileupload?action=featurefileupload';
                        $('#loader-gallery' + localData).show();
                    },
                    onSuccess: function (files, data, xhr)
                    {
                        response = $.parseJSON(data);
                        console.log(response);
                        if (response.status == 1) {
                            $('.iconimage .sImage_icon').attr('src', baseUrl + response.imgurl);
                            $('.iconimage').val(response.imgurl);

                            onModalAlert('Successully uploaded.');
                        } else {
                            onModalAlert(response.error);

                        }
                    },
                    afterUploadAll: function ()
                    {

                    },
                    onError: function (files, status, errMsg)
                    {
                        $('#myModal .modal-body').html('There are uploading problem.');
                        $('#myModal').modal('show');
                    }
                }

                $("#my-file-selector" + localData).uploadFile(settings);
            }

            initUpload_icon(3);
            initUpload_audio(2);
            //initUpload('');
            function onCategoryUPdate() {
                $.ajax({
                    url: baseUrl + 'admin/getCategory',
                    type: 'post',
                    data: {action: 'getCategory', type: 'Product'},
                    success: function (response) {
                        var zNodes = jQuery.parseJSON(response);
                        //console.log(zNodes);
                        html = '<option value="0">Default</option>';

                        if (zNodes.length > 0) {
                            for (i = 0, j = 2; i < zNodes.length; i++, j++) {
                                //ids=zNodes[i]['idlist'].split(',');
                                //names=zNodes[i]['namelist'].split(',');
                                //console.log(zNodes[i]['parent_id']);
                                //console.log(zNodes[i]['name']);
                                //console.log(ids);
                                //console.log(names);
                                //html += '<optgroup label="Group-'+j+'"><option value="' + zNodes[i]['parent_id'] + '">' +zNodes[i]['name']+ '</option>';
                                //for (k = 0; k < ids.length; k++) {
                                html += '<option value="' + zNodes[i]['id'] + '">' + zNodes[i]['name'] + '</option>';
                                //}
                                //html += '<optgroup>'; 

                            }
                            //alert(html);
                            $('#currentCategory').html(html);
                        } else {
                            html = '<option value="0">Default</option>';
                            $('#currentCategory').html(html);
                        }
                    }
                });
            }
            onCategoryUPdate();
            

           
            
            
        }




    });

</SCRIPT>
<script>
    $(function () {
        $('#currentCategory').select2({
            //dataAdapter: OptgroupData,
            // resultsAdapter: OptgroupResults,
            closeOnSelect: true,
            //maximumSelectionSize: 1,
            multiple: false,
            placeholder: "Category Search"
        });

    });
</script>
<style type="text/css">
    .isEnable, .isDelete{
        cursor:pointer;
    }
    #currentAdminForm{
        background: #fff;
        padding-top:15px;
    }
    #admin_category{
        margin-top:15px;
    }
    /*==New==*/
    .content{
        margin-top: 15px !important;
    }

    .onEdit{
        display: none;
    }.onEdit .form-control{
        border: none;
    }
    /*==New==*/
    #adminForm,.inputSuccess,.inputError{
        display:none;
    }
    .dataTables_scrollBody{
        overflow: hidden !important;
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
    table.dataTable, table.dataTable thead,.table.table-bordered, .dataTables_scrollHeadInner{
        width:100% !important
    }
    tr.selected{
        background:#1ABC9C !important;                
        color:#FFF;
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
    .radio{
        padding-top: 0 !important;
        margin-top: 0 !important;
    }
    .thumbnail{
        border:none;
    }
</style>



