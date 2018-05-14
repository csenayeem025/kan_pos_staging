<link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2group/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2group/select2.optgroupSelect.css">
<script src="<?= base_url() ?>assets/select2group/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/select2group/select2.optgroupSelect.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Categories</a></li>
            </ul>
        </div>
    </div>  
    <!-- END PAGE TITLE-->   
    <section  id="admin_category" >
        <div class="row">
<!--            multiple='multiple'-->
<!--<select multiple='multiple' style="width:200px" id='currentCategory2'>
        <optgroup label="All Brooklyn">
            <option value='1'>Crown Heights</option>
            <option value='2'>Park Slope</option>
			<option value='9'>Bed Stuy</option>
        </optgroup>
        <optgroup label="All Manhattan">
            <option value='3'>Flatiron</option>
            <option value='4'>Upper West Side</option>
			<option value='10'>Manhattanville</option>
        </optgroup>
        <optgroup label="All Queens">
            <option value='5'>Long Island City</option>
            <option value='6'>Astoria</option>
        </optgroup>
    </select>-->
	
            <!--            <div class="col-xs-12" >
                            <button class="btn btn-info pull-right btn-generate-page">Generate as Page</button>
                        </div>-->
            <div class="form-group col-md-6">
                <label class="col-lg-4 control-label visible-ie8 visible-ie9">Main Category</label>
                <div class="col-lg-8">
                    <select name="categories" multiple='multiple' id="currentCategory" data-validation-error-msg="Please give your category" class="form-control">
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
            <div class="panel1">
                <div class="panel-content1">
                    <div class="row">
                        <div class="col-sm-12">
                            <form id="currentAdminForm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>saveUpdateAllDiscover">
                                <div class="form-group col-md-6">
                                    <label class="col-lg-4 control-label">Category Name (<span class="red">*</span>):</label>
                                    <div class="col-lg-8">
                                        <input id="name" name="name" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Category Name" type="text" placeholder="Enter Category Name">
                                    </div>
                                </div> 
                                <div class="form-group col-md-6">
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
                                                    <img id="my-file-selector" class="sImage" src="http://www.placehold.it/1024X600/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                    <input name="parent_id" id="parent_id" value="" class="parent_id hideme" />      
                                    <input name="type" id="type" value="" class="type hideme" /> 
                                    
                                    <input name="id" id="id" value="" class="hideme" />      
                                    <input name="bodytxt" id="bodytxt" value="" class="hideme" /> 
                                    <input name="cat_id" id="cat_id" value="" class="hideme" /> 
                                    <input name="parent_cat_id" id="parent_cat_id" value="1" class="hideme" /> 
                                    <input name="thumbimage" id="thumbimage" value="" class="thumbimage hideme" />
                                    <input name="bgimage" id="thumbimage" value="" class="bgimage hideme" />
                                    <input name="iconimage" id="thumbimage" value="" class="iconimage hideme" />
                                    <input name="sImage" id="sImage" class="hideme" value="" />
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />
                                    <button class="btn btn-info pull-right btn-form-save" style="margin-right:10px;" type="submit">Save</button>
                                    <a href="<?php base_url(); ?>category" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                            <input type="hidden" id="category" />
                        </div>

                    </div>
                </div>
            </div>

            <table class="table my_cat_table">
                <thead class="thead-dark">
                    <tr data-id="0">
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Sort Order</th>
                        <th scope="col">Is Active</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <script>
            function onModalAlert(str) {
                $('#myModal .modal-body').html(str);
                $('#myModal').modal('show');
            }
            function addEditNode(id, pId, name) {
                $.ajax({
                    url: baseUrl + 'admin/setAddEditCategory',
                    type: 'post',
                    data: {action: 'setAddEditCategory', id: id, pId: pId, name: name},
                    success: function (response) {
                        if (id == -1)
                            window.location = baseUrl + 'admin/category';
                        else
                            alert('Successfully updated.');
                    }
                });
            }

            function removeNode(id, pId, name) {
                $.ajax({
                    url: baseUrl + 'admin/removeCategory',
                    type: 'post',
                    data: {action: 'removeCategory', id: id, pId: pId, name: name},
                    success: function (response) {
                        alert('Successfully removed.');
                    }
                });
            }

            function showCode(str) {
                var code = $("#code");
                code.empty();
                for (var i = 0, l = str.length; i < l; i++) {
                    code.append("<li>" + str[i] + "</li>");
                }
            }

            $(document).ready(function () {
                if ($('#admin_category').length > 0) {
                    $.validate({
                        form: '#currentAdminForm',
                        modules: 'location, date, security, file',
                        onSuccess: function (valid, $el, $form, errorMess) {
                            //onSuccess: function ($form) {
                            $('.parent_id').val($('#currentCategory').val());
                            $('.type').val($('#type').val());
                            
                            $.ajax({
                                url: baseUrl + 'saveUpdateAllDiscover',
                                type: 'post',
                                data: $('#currentAdminForm').serialize(),
                                success: function (response) {
                                    if (response == 2) {
                                        alert('There is some required empty data.');
                                    } else if (response == 1) {
                                        alert('Successfully Updated');
                                        $('#adminForm').hide();
                                        $('#adminTableBox').show();
                                        $('.btn-add').show();
                                        window.location = baseUrl + 'admin/' + $('#category').val();
                                        oTable.fnDraw();
                                    } else
                                        alert('There is server processing error;');
                                }
                            });
                            return false; // Will stop the submission of the form
                        },
                        onModulesLoaded: function () {
                            $('#country').suggestCountry();
                        }
                    });
                    
                    $('body').on('click','.my_cat_table tr',function(){
                       id=$(this).data('id');
                       onGetCategory(id);
                    });
                    function onGetCategory(cat_id){
                        $.ajax({
                            url: baseUrl + 'admin/getCategorySingle',
                            type: 'post',
                            data: {id:cat_id},
                            success: function (response) {

                                response = $.parseJSON(response);

                                if (response.success == 1) {
                                    //console.log(response.full_name);
                                    $('#currentAdminForm input[name=id]').val(response.id);
                                    $('input[name=name]').val(response.name);
                                    $('input[name=slug]').val(response.slug);
                                    $('textarea[name=keywords]').val(response.meta_keyword);
                                    $('textarea[name=meta_description]').val(response.meta_description);
                                    
                                    if (response.thumb_image){
                                        $('.thumbimage .sImage').attr('src', baseUrl + response.thumb_image);
                                        $('.thumbimage').val(response.thumb_image);
                                    }else
                                        $('.thumbimage .sImage').attr('src', baseUrl + 'uploads/avatars/anonyme.png');
                                    if (response.backgound_image){
                                        $('.bgimage .sImage').attr('src', baseUrl +  response.backgound_image);
                                        $('.bgimage').val(response.backgound_image);
                                    }else
                                        $('.bgimage .sImage').attr('src', baseUrl + 'uploads/avatars/anonyme.png');
                                    if (response.icon_image){
                                        $('.iconimage .sImage').attr('src', baseUrl +  response.icon_image);
                                        $('.iconimage').val(response.icon_image);
                                    }else
                                        $('.iconimage .sImage').attr('src', baseUrl + 'uploads/avatars/anonyme.png');
                                    
                                } else {
                                    onModalAlert('Sorry, server processing error.');
                                }
                            }
                        });
                    }
                    function initUpload(localData) {

                        if (localData == 1)
                            str = '';
                        else if (localData == 2)
                            str = 'Upload File';
                        else
                            str = 'Upload Thumb Image';

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
                                    if (localData == 2) {
                                        $('#currentAdminForm2 #sImage').val(response.imgurl);
                                    } else {
                                        $('.thumbimage .sImage').attr('src', baseUrl + response.imgurl);
                                        $('.thumbimage').val(response.imgurl);
                                    }
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
                                    $('.iconimage .sImage').attr('src', baseUrl + response.imgurl);
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
                    initUpload('');
                    function onCategoryUPdate() {
                        $.ajax({
                            url: baseUrl + 'admin/getCategory',
                            type: 'post',
                            data: {action: 'getCategory', type: $('#type').val()},
                            success: function (response) {
                                var zNodes = jQuery.parseJSON(response);
                                //console.log(zNodes);
                                html = '<option value="0">Default</option>';

                                if (zNodes.length > 0) {
                                    for (i = 0,j=2; i < zNodes.length; i++,j++) {
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
                                    html = '<option>Default</option>';
                                    $('#currentCategory').html(html);
                                }
                            }
                        });
                    }
                    onCategoryUPdate();
                    $('body').on('change', '#type', function () {
                        onCategoryUPdate();
                        onCategoryTableUPdate();
                    });
                    $('body').on('change', '#currentCategory', function () {
                        onCategoryTableUPdate();
                    })

                    function onCategoryTableUPdate() {
                        currentCategoryList=$('#currentCategory').val();
                        if(currentCategoryList&&currentCategoryList.length>0)
                            currentCategoryList=currentCategoryList[0];
                        $.ajax({
                            url: baseUrl + 'admin/getCategoryTableUPdate',
                            type: 'post',
                            data: {parent_id: currentCategoryList, type: $('#type').val()},
                            success: function (response) {
                                var zNodes = jQuery.parseJSON(response);
                                console.log(zNodes);
                                if (zNodes.length > 0) {
                                    html = '';
                                    for (i = 0; i < zNodes.length; i++) {
                                        html += '<tr class="sort_order" data-id="' + zNodes[i]['id'] + '">';
                                            html += '<td scope="row">' + (i + 1) + '</td>';
                                            html += '<td>' + zNodes[i]['name'] + '</td>';
                                            html += '<td>' + zNodes[i]['type'] + '</td>';
                                            html += '<td>' + zNodes[i]['sOrder'] + '</td>';
                                            html += '<td>';  
                                                if(zNodes[i]['isActive']==1){
                                                    html +='<span class="isEnable" data-isactive="' + zNodes[i]['isActive'] + '" data-id="' + zNodes[i]['id'] + '">Disable</span>';
                                                }else{
                                                    html +='<span class="isEnable" data-isactive="' + zNodes[i]['isActive'] + '" data-id="' + zNodes[i]['id'] + '">Enable</span>';
                                                }
                                                html +='&nbsp;/&nbsp;';
                                                html +='<span class="isDelete" data-id="' + zNodes[i]['id'] + '">Delete</span>';
                                            html +='</td>';
                                        html += '</tr>';
                                    }
                                    $('.my_cat_table tbody').html(html);
                                    // Sorting
//                                    $( "table.my_cat_table tbody tr" ).sortable({
//                                       
//       
//    });
                                } else {
                                    html = '<tr><td rowspan="4">No data found.</td></tr>';
                                    $('.my_cat_table tbody').html(html);
                                }
                            }
                        });
                    }
                    onCategoryTableUPdate();
                    $('body').on('click','.isEnable',function(){
                        id=$(this).data('id');
                        isActive=$(this).data('isactive');
                        if (confirm("Do you really want to change Record?")) {
                            $.ajax({
                                url: baseUrl + 'admin/setisactiveCategory',
                                type: 'post',
                                data: {action: 'isactiveCategory', id: id,isactive:isActive},
                                success: function (response) {
                                    alert('Successfully updated.');
                                    onCategoryTableUPdate();
                                }
                            });
                        }
                    });
                    $('body').on('click','.isDelete',function(){
                        id=$(this).data('id');
                        if (confirm("Do you really want to delete Record?")) {
                            $.ajax({
                                url: baseUrl + 'admin/deleteCategory',
                                type: 'post',
                                data: {action: 'deleteCategory', id: id},
                                success: function (response) {
                                    alert('Successfully updated.');
                                    window.location = baseUrl + 'admin/category';
                                }
                            });
                        }
                    });
                }
                
               
                     

            });

        </SCRIPT>
<script>
	$(function(){
            $('#currentCategory').select2({
	            //dataAdapter: OptgroupData,
	           // resultsAdapter: OptgroupResults,
	            closeOnSelect: true,
                    //maximumSelectionSize: 1,
                    multiple: false,
                    placeholder: "Category Search"
	        }); 
//	    $.fn.select2.amd.require(["optgroup-data", "optgroup-results"], 
//	        function (OptgroupData, OptgroupResults) {
//	        $('#currentCategory').select2({
//	            dataAdapter: OptgroupData,
//	            resultsAdapter: OptgroupResults,
//	            closeOnSelect: true,
//                    //maximumSelectionSize: 1,
//                    //multiple: false,
//                    placeholder: "Category Search"
//	        }); 
//	    });
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

    </section>

</div>