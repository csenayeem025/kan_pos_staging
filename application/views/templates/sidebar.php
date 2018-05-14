                <!-- LEFT SIDEBAR -->
                <!-- ========================================================= -->
                <div class="left-sidebar">
                    <!-- left sidebar HEADER -->
                    <div class="left-sidebar-header">
                        <div class="left-sidebar-title">Navigation</div>
                        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                            <span></span>
                        </div>
                    </div>
                    <!-- NAVIGATION -->
                    <!-- ========================================================= -->
                    <div id="left-nav" class="nano">
                        <div class="nano-content">
                            <nav>
                                <ul class="nav nav-left-lines" id="main-nav">
                                    <!--Dashboard-->
                                    <li class=""><a href="<?=base_url();?>banglaadmin"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
<!--                                    <li class=""><a href="<?=base_url();?>" target="_blank"><i class="fa fa-home" aria-hidden="true"></i><span>View Site</span></a></li>-->
                                    <!--Product-->
                                    <!--Product-->
                                    <li class="has-child-item close-item">
                                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Products</span></a>
                                        <ul class="nav child-nav level-1">
                                            <li><a href="<?=base_url();?>admin/addupdateproduct">Add Product</a></li>
                                            <li><a href="<?=base_url();?>admin/products">Product List</a></li>
                                            <li class="">
                                                <a href="<?=base_url();?>admin/category">Categories</a>
                                            </li>
                                            <li class="">
                                                <a href="<?=base_url();?>admin/brands">Brands</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
<!--                                    <li class="has-child-item close-item">
                                        <a><i class="fa fa-users" aria-hidden="true"></i><span>Customers</span></a>
                                        <ul class="nav child-nav level-1">
                                            <li><a href="<?=base_url();?>admin/addupdatecustomer">Add Customer</a></li>
                                            <li><a href="<?=base_url();?>admin/customers">Customer List</a></li>
                                        </ul>
                                    </li>-->
                                    <li class="has-child-item close-item">
                                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Suppliers</span></a>
                                        <ul class="nav child-nav level-1">
                                            <li><a href="<?=base_url();?>admin/addupdatesupplier">Add Supplier</a></li>
                                            <li><a href="<?=base_url();?>admin/suppliers">Supplier List</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-child-item close-item">
                                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Warehouses</span></a>
                                        <ul class="nav child-nav level-1">
                                            <li><a href="<?=base_url();?>admin/addupdatestore">Add Warehouse</a></li>
                                            <li><a href="<?=base_url();?>admin/stores">Warehouse List</a></li>
                                        </ul>
                                    </li>
                                    <!--EMPLOYEE-->
                                    <li class=" has-child-item close-item">
                                        <a>
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <span>Users</span>
                                        </a>
                                        <ul class="nav child-nav level-1">
                                            <li><a href="<?=base_url();?>admin/addupdateuser">Add User </a></li>
                                            <li><a href="<?=base_url();?>admin/users">User List</a></li>
                                        </ul>
                                    </li>
                                    <!--Settings-->
                                    <li class=""><a href="<?=base_url();?>admin/settings"><i class="fa fa-cogs" aria-hidden="true"></i><span>Settings</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- CONTENT -->