<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<script src="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_resource/assets/global/plugins/icheck/skins/all.css">
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.css">
<script src="<?= base_url() ?>assets/js/jquery-ui/jquery-ui.min.js"></script>-->
<script src="<?= base_url() ?>assets/autocomplete/jquery.autocomplete.min.js"></script>
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
<!--                                <select id="currentSupplier" name="currentSupplier" class="form-control">

                                </select>-->
                                <div class="col-md-4">
                                    <label for="code" class=" control-label">Supplier Name</label>
                                    <input type="text" name="currentSupplier" id="currentSupplier" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="code" class=" control-label">Brand/ Company</label>
                                    <input type="text" name="currentBrands" id="currentBrands" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="code" class=" control-label">Product Code</label>
                                    <input type="text" name="currentProductCode" id="currentProductCode" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="code" class=" control-label">Product Category</label>
                                    <input type="text" name="productCategory" id="productCategory" class="form-control" />
                                </div>
                                <div class="col-md-12">
                                   <br />
                                    <button class="btn btn-info pull-right btn-form-generate" type="button">Generate</button>
                                </div>
                                <div class="col-md-12">
                                    <label for="code" class=" control-label">Purchase Product List</label>
                                    <div class="table-responsive">
                                        <table id="purchaseTable" class="data-table1 table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>SL#</th>
                                                    <th>Product Name</th>
                                                    <th>Expire Date</th>
                                                    <th>Current Stock</th>
                                                    <th>Quantity</th>
                                                    <th>Discount</th> 
                                                    <th>Trade Price</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                                <div class="col-md-12" style="display: none">
                                    <label class="col-lg-3 control-label">Category:</label>
                                    <div class="col-lg-7">
                                        <input id="category" name="category" value="purchases" class="form-control validate[required]" type="text" >
                                        <div id="tree" style="height:300px; overflow-x: scroll;"></div>

                                    </div>
                                </div> 
                                <div class="col-md-12">
                                   <br />
                                    <button class="btn btn-info pull-right btn-form-review" style="display:none" type="button">Review</button>
                                </div>


                                <div class="box-footer">                    
                                    
                                    <input name="sImage" id="sImage" class="hideme" value="" />
                                    <input name="action" id="action" class="hideme" value="userSaveUpdate" />

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

        var availableSuppliers = new Array();
        function onGetSuppliers() {
            $.ajax({
                url: baseUrl + 'admin/getSuppliers',
                type: 'post',
                data: {action: 'getSuppliers', type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    availableSuppliers[0] = {value: 'Select Supplier', data: 0};
                    if (zNodes.length > 0) {
                        for (i = 0, j = 2; i < zNodes.length; i++, j++) {
                            availableSuppliers[i + 1] = {value: zNodes[i]['name'], data: zNodes[i]['id']};
                        }
                    }
                    $('#currentSupplier').autocomplete({
                        lookup: availableSuppliers,
                        onSelect: function (suggestion) {
                            console.log(suggestion);
                            //alert('You selected: ' + suggestion.value );
                        }
                    });
                }
            });
        }
        onGetSuppliers();
        var availableCompanies = new Array();
        function onGetCompanies() {
            $.ajax({
                url: baseUrl + 'admin/getBrands',
                type: 'post',
                data: {action: 'getSuppliers', type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    availableCompanies[0] = {value: 'Select Brands', data: 0};
                    if (zNodes.length > 0) {
                        for (i = 0, j = 2; i < zNodes.length; i++, j++) {
                            availableCompanies[i + 1] = {value: zNodes[i]['name'], data: zNodes[i]['id']};
                        }
                    }
                    $('#currentBrands').autocomplete({
                        lookup: availableCompanies,
                        onSelect: function (suggestion) {
                            console.log(suggestion);
                            //alert('You selected: ' + suggestion.value );
                        }
                    });
                }
            });
        }
        onGetCompanies();
        var availableProducts = new Array();
        function onGetProducts() {
            $.ajax({
                url: baseUrl + 'admin/getProducts',
                type: 'post',
                data: {action: 'getProducts', type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    availableProducts[0] = {value: 'Select Product', data: 0};
                    if (zNodes.length > 0) {
                        for (i = 0, j = 2; i < zNodes.length; i++, j++) {
                            availableProducts[i + 1] = {value: zNodes[i]['name'], data: zNodes[i]['id']};
                        }
                    }
                    $('#currentProductCode').autocomplete({
                        lookup: availableProducts,
                        onSelect: function (suggestion) {
                            console.log(suggestion);
                            //alert('You selected: ' + suggestion.value );
                            //alert($('#currentSupplier').val());
                        }
                    });
                }
            });
        }
        onGetProducts();
        var productsCategory = new Array();
        function onGetProducts() {
            $.ajax({
                url: baseUrl + 'admin/getCategory',
                type: 'post',
                data: {action: 'getCategory', type: 'Product'},
                success: function (response) {
                    var zNodes = jQuery.parseJSON(response);
                    productsCategory[0] = {value: 'Select Category', data: 0};
                    if (zNodes.length > 0) {
                        for (i = 0, j = 2; i < zNodes.length; i++, j++) {
                            productsCategory[i + 1] = {value: zNodes[i]['name'], data: zNodes[i]['id']};
                        }
                    }
                    $('#productCategory').autocomplete({
                        lookup: productsCategory,
                        onSelect: function (suggestion) {
                            console.log(suggestion);
                            //alert('You selected: ' + suggestion.value );
                            //alert($('#currentSupplier').val());
                        }
                    });
                }
            });
        }
        onGetProducts();
        function onChangeSelection() {
            $('#currentSupplier').on('autocompletechange change', function (e) {
                e.preventDefault();
                //console.log('You selected: ' + this.value);
                currentSupplier = this.value;
                $.map(availableSuppliers, function (val, i) {
                    if (currentSupplier == val.value)
                        currentSupplier = val.data;
                });
                console.log('You selected: ' + currentSupplier);
            }).change();
            $('#currentBrands').on('autocompletechange change', function (e) {
                e.preventDefault();
                currentCompanies = this.value;
                $.map(availableCompanies, function (val, i) {
                    if (currentCompanies == val.value)
                        currentCompanies = val.data;
                });
                console.log('You selected: ' + currentCompanies);
            }).change();
            $('#currentProductCode').on('autocompletechange change', function (e) {
                e.preventDefault();
                currentProductCode = this.value;
                $.map(availableProducts, function (val, i) {
                    if (currentProductCode == val.value)
                        currentProductCode = val.data;
                });
                console.log('You selected: ' + currentProductCode);
            }).change();
            $('#productCategory').on('autocompletechange change', function (e) {
                e.preventDefault();
                productCategory = this.value;
                $.map(productsCategory, function (val, i) {
                    if (productCategory == val.value)
                        productCategory = val.data;
                });
                console.log('You selected: ' + productCategory);
            }).change();
            // currentSupplier & currentProductCode
            $.ajax({
                url: baseUrl + 'admin/getPurchaseTable',
                type: 'post',
                data: {currentSupplier: currentSupplier, productCategory:productCategory,currentCompanies:currentCompanies, currentProductCode: currentProductCode},
                success: function (response) {
                    response = jQuery.parseJSON(response);
                    html = '';
                    if (response.length > 0) {
                        for(i=0;i<response.length;i++){
                            //response[i]['discount']=9;
                            html+='<tr product_id="'+response[i]['master_id']+'" trade_price="'+response[i]['trade_price']+'" discount="'+response[i]['discount']+'" instock="'+response[i]['instock']+'">';
                                html+='<td>'+(i+1)+'</td>';
                                html+='<td>'+response[i]['master_p_name']+'</td>';
                                html+='<td>'+response[i]['expire_date']+'</td>';
                                html+='<td>'+response[i]['instock']+'</td>';
                                html+='<td><input type="number" name="quantity[]" class="form-control quantity" placeholder="0.00" /></td>';
                                html+='<td><span class="single_discount ">'+response[i]['discount']+'</span></td>';
                                html+='<td>'+response[i]['trade_price']+'</td>';
                                html+='<td><span class="single_amount total_amount_'+response[i]['master_id']+'" >0.00 </span></td>';
                                html+='<td></td>';
                            html+='</tr>';
                        }
                        html+='<tr>';
                                html+='<td>###</td>';
                                html+='<td></td>';
                                html+='<td></td>';
                                html+='<td></td>';  
                                html+='<td></td>';  
                                //html+='<td></td>';  
                                html+='<td colspan="2" align="right">Grand Total: </td>';
                                html+='<td><input disabled type="number" name="grand_totalamount" class="form-control grand_totalamount" placeholder="0.00" /></td>';
                                html+='<td></td>';
                            html+='</tr>';
                            html+='<tr>';
                                html+='<td>###</td>';
                                html+='<td></td>';
                                html+='<td></td>';
                                html+='<td></td>';  
                                html+='<td></td>';  
                                //html+='<td></td>';  
                                html+='<td colspan="2" align="right">Discount (<span class="grand_discount">0.00</span>): </td>';
                                html+='<td><input type="number" name="total_discount" class="form-control total_discount" placeholder="0.00" /></td>';
                                html+='<td></td>';
                            html+='</tr>';
                            html+='<tr>';
                                html+='<td>###</td>';
                                html+='<td></td>';
                                html+='<td></td>';
                                html+='<td></td>';  
                                html+='<td></td>';  
                                //html+='<td></td>';  
                                html+='<td colspan="2" align="right">Paid: </td>';
                                html+='<td><input type="number" name="paid" class="form-control paid" placeholder="0.00" /></td>';
                                html+='<td></td>';
                            html+='</tr>';
                            html+='<tr>';
                                html+='<td>###</td>';
                                html+='<td></td>';
                                html+='<td></td>';
                                html+='<td></td>';  
                                html+='<td></td>';  
                                //html+='<td></td>';  
                                html+='<td colspan="2" align="right">Due: </td>';
                                html+='<td><input disabled type="number" name="due" class="form-control due" placeholder="0.00" /></td>';
                                html+='<td></td>';
                            html+='</tr>';
                    }
                    $('#purchaseTable tbody').html(html);
                    
                }
            });
        }
        $('body').on('click', '.btn-form-generate', function () {
            onChangeSelection();
        });
        $('body').on('keyup','.quantity, .paid, .total_discount',function(){
            product_id=$(this).parent().parent().attr('product_id');
            discount=$(this).parent().parent().attr('discount');
            trade_price=$(this).parent().parent().attr('trade_price');
            instock=$(this).parent().parent().attr('instock');
            quantity=$(this).val();
            
            total_amount=trade_price*quantity;
            $('.total_amount_'+product_id).html(total_amount.toFixed(2));
            
            grand_totalamount=0;
            if($('.single_amount').length>0){
                $('.single_amount').each(function( index ) {
                    console.log( index + ": " + $( this ).text() );
                    grand_totalamount+=parseFloat($( this ).text());
                });
            }
            $('.grand_totalamount').val(grand_totalamount.toFixed(2));
            
            
            total_discount=0;
            if($('.single_discount').length>0){
                $('.single_discount').each(function( index ) {
                    console.log( index + ": " + $( this ).text() );
                    total_discount+=parseFloat($( this ).text());
                });
            }
            $('.grand_discount').html(total_discount.toFixed(2));
            total_discount=$('.total_discount').val();
            
            due=grand_totalamount-$('.paid').val()-total_discount;
            $('.due').val(due.toFixed(2));
        });
        $('body').on('keyup','.paid',function(){
            $('.btn-form-review').show();
        });
        $('body').on('click','.btn-form-review',function(){
            if($('.paid').val()<=0){
                alert('Sorry, you have to pay some money.');
                return;
            }
            if(confirm("Do you really want to review current data?")){
//                $.ajax({
//                    url: baseUrl + 'purchase/reviewPurchaseTable',
//                    type: 'post',
//                    data: {currentSupplier: currentSupplier, productCategory:productCategory,currentCompanies:currentCompanies, currentProductCode: currentProductCode},
//                    success: function (response) {
//                        response = jQuery.parseJSON(response);
//                    }
//                });
            }
        });
    });
</script>
<style type="text/css">
.btn-form-review{display:none}
</style>
<style type="text/css">
    .autocomplete-suggestions { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-no-suggestion { padding: 2px 5px;}
    .autocomplete-selected { background: #F0F0F0; }
    .autocomplete-suggestions strong { font-weight: bold; color: #000; }
    .autocomplete-group { padding: 2px 5px; font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }
</style>



