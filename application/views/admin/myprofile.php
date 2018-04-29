<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>User profile</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--PROFILE-->
            <div>
                <div class="profile-photo">
                    
                    <?php if(!empty($_SESSION['MusicUsers_sImage'])): ?>
                        <img alt="" class="img-responsive sImage sImage2" src="<?php echo base_url(); ?>uploads/avatars/<?php echo $_SESSION['MusicUsers_sImage'];?>" />
                        <?php else: ?>
                        <img alt="" class="img-responsive sImage sImage2" src="<?php echo base_url(); ?>assets/admin/images/avatar/avatar_user.jpg" />
                        <?php endif; ?>
                </div>
                <div class="user-header-info">
                    <h3 class="user-name"><?php echo $_SESSION['MusicUsers_full_name'];?></h3>
                    <h5 class="user-position"><?php echo $_SESSION['MusicUsers_user_type'];?></h5>
                    
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--CONTACT INFO-->
            <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                <div class="panel-content">
                    <h4 class=""><b>Contact Information</b></h4>
                    <ul class="user-contact-info ph-sm">
                        <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b> <?php echo $_SESSION['MusicUsers_email'];?></li>
<!--                        <li><b><i class="color-primary mr-sm fa fa-phone"></i></b><?php echo $_SESSION['MusicUsers_email'];?></li>-->
                        
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
        <div class="col-md-6 col-lg-8">
            <div class="tabs">
                <!-- Tabs Header -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                    <li><a href="#messages" data-toggle="tab">Avater</a></li>
                    <li><a href="#password" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i> Change Password</a></li>
                </ul>
                <!-- Tabs Content -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="profile">
                        <div class="panel-content">
                            <form id="info_profile" method="post" action="<?php echo base_url(); ?>admin/updateMyprofile">
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                                    <input class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your full name" placeholder="Full Name" name="full_name" /> </div>
                                <div class="form-group">
                                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                                    <input disabled class="form-control placeholder-no-fix" type="text" data-validation="email required" data-validation-error-msg="Please give valid Email" placeholder="Email" name="email" /> </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Mobile</label>
                                    <input class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your Mobile number" placeholder="Mobile number" name="phone" /> </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Address</label>
                                    <input class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give your address" type="text" placeholder="Address" name="address" /> </div>

                                <div class="margiv-top-10">

                                    <button type="submit"  class="btn green"> Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="messages">
                        <div class="panel-content">
                            <form action="#" role="form">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img id="my-file-selector1" class="sImage sImage2" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                        <label class="btn btn-primary btn-upload">
                                            <input id="my-file-selector" name="image" style="display:none;">                     
                                        </label>				
                                        <div id="image-holder" class="img-responsive" style="max-width:150px;"></div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="password">
                        <div class="panel-content">
                            <form id="change_password" method="post" action="<?php echo base_url(); ?>admin/updateSettings">
                                <div class="form-group">
                                    <label class="control-label1">Current Password</label>
                                    <input name="password" data-validation="required" placeholder="Password" data-validation-error-msg="Please give current password" type="password" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label1">New Password</label>
                                    <input name="newpassword" data-validation="required" placeholder="New Password" data-validation-error-msg="Please give valid password" type="password" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label1">Re-type New Password</label>
                                    <input name="re_newpassword" data-validation="required" placeholder="Re-type New Password" data-validation-error-msg="Please give valid password" type="password" class="form-control" /> </div>
                                <div class="margin-top-10">

                                    <button type="submit"  class="btn green"> Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
