<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-copy" aria-hidden="true"></i><a href="<?php echo base_url(); ?>admin/banglaadmin">Dashboard</a></li>
                <li><a>Settings</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12 col-md-12 ">
            <div class="panel">
                <div class="panel-content">
                    <form id="info_settings" method="post" action="<?php echo base_url(); ?>admin/updateMySettings">
                        <div class="form-group">
                            <label class="control-label">Site Name</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your site name" placeholder="Site Name" name="sitename" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Top Slogan</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your slogan" placeholder="topslogan" name="topslogan" /> </div>

                        <div class="form-group">
                            <label class="control-label ">Hotline</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your Hotline number" placeholder="Hotline number" name="hotline" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Phone</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give your Phone number" placeholder="Phone number" name="phone" /> </div>
                        <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <label class="control-label ">Email</label>
                            <input  class="form-control placeholder-no-fix" type="text" data-validation="required" data-validation-error-msg="Please give valid Email" placeholder="Email" name="email" /> </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea class="form-control placeholder-no-fix" data-validation="required" data-validation-error-msg="Please give your address" id="address" name="address" rows="6"></textarea>
                        </div>
<!--                        <div class="form-group">
                            <label class="control-label">Opening Hour</label>
                            <textarea class="form-control placeholder-no-fix" data-validation="" data-validation-error-msg="Please give your openinghour" id="openinghour" name="openinghour" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label ">Facebook</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your facebook" placeholder="facebook" name="facebook" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Twitter</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your twitter" placeholder="twitter" name="twitter" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Linkedin</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your linkedin" placeholder="linkedin" name="linkedin" /> </div>
                        <div class="form-group">
                            <label class="control-label ">YouTube</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your youtube" placeholder="youtube" name="youtube" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Gplus</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your gplus" placeholder="gplus" name="gplus" /> </div>
                        <div class="form-group">
                            <label class="control-label">Footer Facebook page code</label>
                            <textarea class="form-control placeholder-no-fix" data-validation="" data-validation-error-msg="Please give your footerfblink" id="footerfblink" name="footerfblink" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label ">FB app_id</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your FB app_id" placeholder="fb_app_id" name="fb_app_id" /> </div>
                        <div class="form-group">
                            <label class="control-label ">FB pages</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your FB pages" placeholder="fb_pages" name="fb_pages" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Twitter Site</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your Twitter Site" placeholder="twitter_site" name="twitter_site" /> </div>
                        --><div class="form-group">
                            <label class="control-label ">Google Analytics</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your Google Analytics ID" placeholder="GA_ID" name="GA_ID" /> </div>
                        <div class="form-group">
                            <label class="control-label ">Copyright</label>
                            <input class="form-control placeholder-no-fix" type="text" data-validation="" data-validation-error-msg="Please give your copyright" placeholder="copyright" name="copyright" /> </div>
                        <div class="form-group">
                            <label class="control-label ">keywords</label>
                            <textarea class="form-control placeholder-no-fix" data-validation="" data-validation-error-msg="Please give your keywords" id="keywords" name="keywords" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label ">Descriptions</label>
                            <textarea class="form-control placeholder-no-fix" data-validation="" data-validation-error-msg="Please give your keywords" id="descriptions" name="descriptions" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            200X60
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="padding: 0">
                                    <img style="margin-left:0" id="my-file-selector3" class="sImage" src="<?php echo base_url(); ?>uploads/logo.png" alt="" /> 
                                </div>
                                <div id="image-holder" class="img-responsive" style="max-width:150px;"></div>
                                <label class="btn btn-primary btn-upload">
                                    <input id="my-file-selector" name="image" style="display:none;">                     
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            Favicon (png/ico)
                            <div class="fileinput fileinput-new1" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="padding: 0">
                                    <img style="margin-left:0" id="my-file-selector3" class="sImage1" src="<?php echo base_url(); ?>uploads/magazine-logo.png" alt="" /> 
                                </div>
                                <label class="btn btn-primary btn-upload">
                                    <input id="my-file-selector1" name="image" style="display:none;">                     
                                </label>				
                                <div id="image-holder1" class="img-responsive" style="max-width:150px;"></div>
                            </div>
                        </div>
                        <div class="margiv-top-10">

                            <button type="submit"  class="btn green"> Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
