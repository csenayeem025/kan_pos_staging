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
                <li><a>Customer Types</a></li>
            </ul>
        </div>
    </div>  
    <!-- END PAGE TITLE-->   
    <section  id="admin_category" >
        <div class="row">

            <div class="form-group col-md-6" style="display:none;">
                <label class="col-lg-4 control-label visible-ie8 visible-ie9">Main Category</label>
                <div class="col-lg-8">
                    <select name="categories" id="currentCategory" class="form-control">
                        <option value="0">Brands</option>
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
                                    <label class="col-lg-5 control-label">Customer Type Name (<span class="red">*</span>):</label>
                                    <div class="col-lg-7">
                                        <input id="name" name="name" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give Type Name" type="text" placeholder="Enter Type Name">
                                    </div>
                                </div> 
                                <div class="form-group col-md-6" style="display: none;">
                                    <label class="col-lg-4 control-label">Brand URL (<span class="red">*</span>):</label>
                                    <div class="col-lg-8">
                                        <input id="slug" name="slug" class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give url" type="text" placeholder="URL">
                                    </div>
                                </div>
                                
                                <div class="form-group" style="display: none">
                                    <label class="col-lg-4 control-label">Category:</label>
                                    <div class="col-lg-8">
                                        <input id="category" name="category" value="customertype" class="form-control validate[required]" type="text" >
                                    </div>
                                </div> 
                                
                                  
                                <div class="box-footer" style="clear:both;">   
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
                                    <a href="<?php base_url(); ?>customertype" class="btn btn-default pull-right btn-form-cancel---" style="margin-right:10px;" type="submit">Cancel</a>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                            <input type="hidden" id="customertype" />
                        </div>

                    </div>
                </div>
            </div>

            <table class="table my_cat_table">
                <thead class="thead-dark">
                    <tr data-id="0">
                        <th scope="col">#</th>
                        <th scope="col">Customer Type Name</th>
<!--                        <th scope="col">Logo</th>-->
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
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
                            url: baseUrl + 'admin/getCustomerTypeSingle',
                            type: 'post',
                            data: {id:cat_id},
                            success: function (response) {

                                response = $.parseJSON(response);

                                if (response.success == 1) {
                                    //console.log(response.full_name);
                                    $('#currentAdminForm input[name=id]').val(response.id);
                                    $('input[name=name]').val(response.name);
                                    $('input[name=slug]').val(response.slug);
                                    
                                } else {
                                    onModalAlert('Sorry, server processing error.');
                                }
                            }
                        });
                    }
                    
                    function onCategoryUPdate() {
                        
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
                        //alert(1);
                        $('#currentAdminForm input[name=id]').val('');
                        $('#currentAdminForm input[name=name]').val('');
                        $('#currentAdminForm input[name=slug]').val('');
                        $('#currentAdminForm .thumbimage .sImage').attr('src', 'http://www.placehold.it/1024X600/EFEFEF/AAAAAA&text=no+image');
                        $('#currentAdminForm .thumbimage').val('');
                                        
                        currentCategoryList=$('#currentCategory').val();
                        if(currentCategoryList&&currentCategoryList.length>0)
                            currentCategoryList=currentCategoryList[0];
                        $.ajax({
                            url: baseUrl + 'admin/getCustomerTypeTableUPdate',
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
                                            
                                            //html += '<td>' + zNodes[i]['sOrder'] + '</td>';
                                            html += '<td>';  
                                                if(zNodes[i]['isActive']==1){
                                                    html+='<img class="isEnable" data-isactive="' + zNodes[i]['isActive'] + '" data-id="' + zNodes[i]['id'] + '" src="'+baseUrl+'assets/images/active-btn.png?time=<?php echo time();?>" />';
                                                }else{
                                                    html+='<img class="isEnable" data-isactive="' + zNodes[i]['isActive'] + '" data-id="' + zNodes[i]['id'] + '" src="'+baseUrl+'assets/images/inactive-btn.png?time=<?php echo time();?>" />';
                                                }
                                                html +='</td>';
                                                html +='<td>';
                                                html+='<button class="btn btn-danger btn-sm isDelete" data-id="' + zNodes[i]['id'] + '"><i class="fa fa-trash"></i> Delete</button>';
                                                
                                            html +='</td>';
                                        html += '</tr>';
                                    }
                                    $('.my_cat_table tbody').html(html);
                                    // Sorting
                                    $( "table.my_cat_table tbody tr" ).sortable({
                                       
       
    });
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
                                url: baseUrl + 'discover/setisactiveBrand',
                                type: 'post',
                                data: {action: 'isactiveCategory',type:$('#category').val(), id: id,isactive:isActive},
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
                                url: baseUrl + 'discover/deleteDiscover',
                                type: 'post',
                                data: {action: 'deleteCategory',type:$('#category').val(), id: id},
                                success: function (response) {
                                    alert('Successfully updated.');
                                    window.location = baseUrl + 'admin/customertype';
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