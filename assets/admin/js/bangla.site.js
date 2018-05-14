/**
 * removePreloader
 * init_header
 * ResponsiveMenu
 * fixHeight
 * consIsotope
 * ajaxContactForm
 * gmap3
 * owlcarousel
 * goTop
 * http://www.formvalidator.net/#configuration_callbacks
 */

$(function () {
    function onModalAlert(str) {
        $('#myModal .modal-body').html(str);
        $('#myModal').modal('show');
    }
    // login
    $(document).on('click', '#back-btn, #register-back-btn', function () {
        $('#login_form').show();
        $('#forget_form').hide();
        $('#register_form').hide();
    });
    $(document).on('click', '#forget-password', function () {
        $('#login_form').hide();
        $('#forget_form').show();
        $('#register_form').hide();
    });
    $(document).on('click', '#register-btn', function () {
        $('#login_form').hide();
        $('#forget_form').hide();
        $('#register_form').show();
    });
    if ($('#login_form').length > 0) {
        $.validate({
            form: '#login_form',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {
                //alert(000);
                $.ajax({
                    url: baseUrl + 'admin/check_userlogin',
                    type: 'post',
                    data: $('#login_form').serialize(),
                    success: function (response) {
                        response = $.parseJSON(response);
                        if (response.success == 1) {
                            document.getElementById("login_form").reset();
                            onModalAlert('Successfully logged in.');
                            window.location = baseUrl + 'banglaadmin';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                //$('#country').suggestCountry();
            }
        });
    }
    if ($('#forget_form').length > 0) {
        $.validate({
            form: '#forget_form',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/sendForgotpassword',
                    type: 'post',
                    data: $('#forget_form').serialize(),
                    success: function (response) {
                        response = $.parseJSON(response);

                        if (response.success == 1) {
                            document.getElementById("forget_form").reset();
                            onModalAlert('Successfully sent, please check your mail.');
                            //window.location=baseUrl+'admin';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    if ($('#register_form').length > 0) {
        $.validate({
            form: '#register_form',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/user_registration',
                    type: 'post',
                    data: $('#register_form').serialize(),
                    success: function (response) {
                        response = $.parseJSON(response);
                        if (response.success == 1) {
                            document.getElementById("register_form").reset();
                            onModalAlert('Successfully sent, please check your mail.');
                            //window.location=baseUrl+'admin';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    if ($('#passwordActivationForm').length > 0) {
        $.validate({
            form: '#passwordActivationForm',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/setNewPassword',
                    type: 'post',
                    data: $('#passwordActivationForm').serialize(),
                    success: function (response) {
                        response = $.parseJSON(response);
                        if (response.success == 1) {
                            document.getElementById("passwordActivationForm").reset();
                            onModalAlert('Successfully sent, please check your mail.');
                            //window.location=baseUrl+'admin';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    // update profile
    if ($('#info_profile').length > 0) {
        $.ajax({
            url: baseUrl + 'admin/onGetMyprofile',
            type: 'post',
            data: {},
            success: function (response) {

                response = $.parseJSON(response);

                if (response.success == 1) {
                    //console.log(response.full_name);
                    $('#info_profile input[name=full_name]').val(response.full_name);
                    $('#info_profile input[name=email]').val(response.email);
                    $('#info_profile input[name=phone]').val(response.phone);
                    $('#info_profile textarea[name=address]').val(response.address);
                    $('#info_profile select[name=country]').val(response.country);
                    if (response.sImage)
                        $('.sImage2').attr('src', baseUrl + 'uploads/avatars/' + response.sImage);
                    else
                        $('.sImage2').attr('src', baseUrl + 'uploads/avatars/pesbd_avater.png');
                    //window.location=baseUrl+'admin/myprofile';
                } else {
                    onModalAlert('Sorry, server processing error.');
                }
            }
        });
        function initUpload(localData) {
            if (localData == 1)
                str = '';
            else
                str = 'Upload Avatar';

            var settings = "settings_";
            settings = {
                url: baseUrl + 'admin/fileupload?action=avatarfileupload',
                method: "POST",
                allowedTypes: "jpg,png,gif,jpeg",
                fileName: "image",
                multiple: false,
                cache: false,
                dragDropStr: '<span>' + str + '</span>',
                onSubmit: function () {
                    this.url = baseUrl + 'admin/fileupload?action=avatarfileupload';
                    $('#loader-gallery' + localData).show();
                },
                onSuccess: function (files, data, xhr)
                {
                    response = $.parseJSON(data);
                    console.log(response);
                    if (response.status == 1) {
                        //alert(baseUrl + response.imgurl);
                        $('.sImage2').attr('src', baseUrl + response.imgurl);
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
        initUpload('');
        $.validate({
            form: '#info_profile',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/updateMyprofile',
                    type: 'post',
                    data: $('#info_profile').serialize(),
                    success: function (response) {

                        response = $.parseJSON(response);

                        if (response.success == 1) {
                            document.getElementById("info_profile").reset();
                            onModalAlert('Successfully stored.');
                            window.location = baseUrl + 'admin/myprofile';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    // update settings
    if ($('#info_settings').length > 0) {
        $.ajax({
            url: baseUrl + 'admin/onGetSettings',
            type: 'post',
            data: {},
            success: function (response) {

                response = $.parseJSON(response);

                if (response.success == 1) {
                    //console.log(response.full_name);
                    $('#info_settings input[name=sitename]').val(response.sitename);
                    $('#info_settings input[name=email]').val(response.email);
                    $('#info_settings input[name=hotline]').val(response.hotline);
                    $('#info_settings input[name=phone]').val(response.phone);
                    $('#info_settings textarea[name=address]').val(response.address);
                    $('#info_settings input[name=topslogan]').val(response.topslogan);
                    $('#info_settings textarea[name=openinghour]').val(response.openinghour);
                    $('#info_settings input[name=facebook]').val(response.facebook);
                    $('#info_settings input[name=twitter]').val(response.twitter);
                    $('#info_settings input[name=linkedin]').val(response.linkedin);
                    $('#info_settings input[name=youtube]').val(response.youtube);
                    $('#info_settings input[name=gplus]').val(response.gplus);
                    $('#info_settings textarea[name=footerfblink]').val(response.footerfblink);
                    $('#info_settings textarea[name=descriptions]').val(response.descriptions);
                    $('#info_settings input[name=copyright]').val(response.copyright);
                    $('#info_settings input[name=fb_app_id]').val(response.fb_app_id);
                    $('#info_settings input[name=fb_pages]').val(response.fb_pages);
                    $('#info_settings input[name=twitter_site]').val(response.twitter_site);
                    $('#info_settings input[name=GA_ID]').val(response.GA_ID);
                    $('#info_settings textarea[name=keywords]').val(response.keywords);

                    if (response.logo)
                        $('#info_settings .sImage').attr('src', baseUrl + response.logo+'?time='+new Date());
                    else
                        $('#info_settings .sImage').attr('src', baseUrl + 'uploads/logo.png');
                    if (response.magazine_logo)
                        $('#info_settings .sImage1').attr('src', baseUrl + response.magazine_logo);
                    else
                        $('#info_settings .sImage1').attr('src', baseUrl + 'uploads/magazine-logo.png');
                    if (response.footer_logo)
                        $('#info_settings .sImage2').attr('src', baseUrl + response.footer_logo);
                    else
                        $('#info_settings .sImage2').attr('src', baseUrl + 'uploads/footer-logo.png');

                    /*
                     if (response.sImage)
                     $('.sImage').attr('src', baseUrl + 'uploads/avatars/' + response.sImage);
                     else
                     $('.sImage').attr('src', baseUrl + 'uploads/avatars/pesbd_avater.png');
                     */
                    //window.location=baseUrl+'admin/myprofile';
                } else {
                    onModalAlert('Sorry, server processing error.');
                }
            }
        });
        function initUpload(localData) {
            if (localData == 1)
                str = 'Upload Favicon';
            else if (localData == 2)
                str = 'Upload Footer Logo';
            else
                str = 'Upload Master Logo';

            var settings = "settings_";
            settings = {
                url: baseUrl + 'admin/fileupload?action=logofileupload&localData=' + localData,
                method: "POST",
                allowedTypes: "jpg,png,gif,jpeg,ico",
                fileName: "image",
                multiple: false,
                cache: false,
                dragDropStr: '<span>' + str + '</span>',
                onSubmit: function () {
                    this.url = baseUrl + 'admin/fileupload?action=logofileupload&localData=' + localData;
                    $('#loader-gallery' + localData).show();
                },
                onSuccess: function (files, data, xhr)
                {
                    response = $.parseJSON(data);
                    console.log(response);
                    if (response.status == 1) {
                        $('.fileinput-new' + localData + ' .sImage' + localData).attr('src', baseUrl + response.imgurl + '?time=' + new Date());
                        onModalAlert('Successully uploaded.');
                    } else {
                        onModalAlert(response.error);

                    }
                    //$('.fileinput-new'+localData+' .thumbnail img').hide();
                    //console.log('.fileinput-new'+localData+' .thumbnail img');
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
        initUpload('');
        initUpload(1);
        initUpload(2);
        $.validate({
            form: '#info_settings',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/updateMySettings',
                    type: 'post',
                    data: $('#info_settings').serialize(),
                    success: function (response) {

                        response = $.parseJSON(response);

                        if (response.success == 1) {
                            //document.getElementById("info_profile").reset();
                            onModalAlert('Successfully stored.');
                            //window.location = baseUrl + 'admin/myprofile';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                //$('#country').suggestCountry();
            }
        });
    }
    // change password
    if ($('#change_password').length > 0) {

        $.validate({
            form: '#change_password',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'admin/updateSettings',
                    type: 'post',
                    data: $('#change_password').serialize(),
                    success: function (response) {

                        response = $.parseJSON(response);

                        if (response.success == 1) {
                            document.getElementById("change_password").reset();
                            onModalAlert('Successfully stored.');
                            //window.location=baseUrl+'admin';
                        } else {
                            onModalAlert(response.msg);
                        }
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    // ajaxloader
    if ($('#ajaxloader').length > 0) {
        $('#ajaxloader').css({'position': 'absolute'});
        $('#ajaxloader').css({'top': ($(window).height() / 2 - 25) + 'px'});
        $('#ajaxloader').css({'left': ($(window).width() / 2 - 25) + 'px'});
        $('#ajaxloader').css({'z-index': '9999'});
    }
    $('#ajaxloader').hide();
    $(document).ajaxStart(function () {
        $('body').css({'opacity': '0.3'});
        $('#ajaxloader').show();
    });
    $(document).ajaxStop(function () {
        $('body').css({'opacity': '1'});
        $('#ajaxloader').hide();
    });
    // inquery
    if ($('#pesbd_inquery').length > 0) {
        $.validate({
            form: '#pesbd_inquery',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'server-processing?action=inquery',
                    type: 'post',
                    data: $('#pesbd_inquery').serialize(),
                    success: function (response) {
                        if (response == 1) {
                            document.getElementById("pesbd_inquery").reset();
                            onModalAlert('Successfully email sent to admin.');
                        } else
                            onModalAlert('Sorry, there is server processing error.');
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    // inquery
    if ($('#pesbd_apply_online').length > 0) {
        function initUpload(localData) {
            if (localData == 1)
                str = '';
            else
                str = 'Upload CV';

            var settings = "settings_";
            settings = {
                url: baseUrl + 'admin/fileupload?action=cvupload',
                method: "POST",
                allowedTypes: "doc,docx,pdf",
                fileName: "image",
                multiple: false,
                cache: false,
                dragDropStr: '<span>' + str + '</span>',
                onSubmit: function () {
                    this.url = baseUrl + 'admin/fileupload?action=cvupload';
                    $('#loader-gallery' + localData).show();
                },
                onSuccess: function (files, data, xhr)
                {
                    response = $.parseJSON(data);
                    console.log(response);
                    if (response.status == 1) {
                        $('.sImage').attr('src', baseUrl + response.imgurl);
                        $('#sImage').val(response.imgurl);
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
        initUpload('');
        $.validate({
            form: '#pesbd_apply_online',
            modules: 'location, date, security, file',
            onSuccess: function (valid, $el, $form, errorMess) {
                //onSuccess: function ($form) {

                $.ajax({
                    url: baseUrl + 'applyonline?action=applyonlineinquery',
                    type: 'post',
                    data: $('#pesbd_apply_online').serialize(),
                    success: function (response) {
                        if (response == -2)
                            onModalAlert("Sorry, you didn't confirm the given information.");
                        else if (response == 1) {
                            document.getElementById("pesbd_apply_online").reset();
                            onModalAlert('Successfully email sent to admin.');
                        } else
                            onModalAlert('Sorry, there is server processing error or you may not uploaded your CV.');
                    }
                });
                return false; // Will stop the submission of the form
            },
            onModulesLoaded: function () {
                $('#country').suggestCountry();
            }
        });
    }
    $('#presentation').restrictLength($('#pres-max-length'));
    /* Admin Control Panel */
    if ($('#admin_users').length > 0) {

        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {
            resetForm("currentAdminForm");
            $('#currentAdminForm #id').val('');
            $('#user_type').select2('val', 'admin');
            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
        }

        function onAddEditClick2() {
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);
            $('input[name="isAnswer"].flat-red').iCheck('uncheck');
            $('input[name="isAnswer"].flat-red:eq(0)').iCheck('check');
        }
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('#adminForm').hide();
            $('#adminTableBox').show();

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
            });

            $('.btn-form-save').on('click', function (e) {

                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {


                } else {
                    e.preventDefault();
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $.validate({
                form: '#currentAdminForm',
                modules: 'location, date, security, file',
                onSuccess: function (valid, $el, $form, errorMess) {
                    $.ajax({
                        url: baseUrl + 'admin/userSaveUpdate',
                        type: 'post',
                        data: $('#currentAdminForm').serialize(),
                        success: function (response) {
                            if (response == 1) {
                                alert('Successfully Updated');
                                window.location=baseUrl+'admin/'+$('#users').attr('id');
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
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
            });
            //alert(contentid);
            if(contentid){
                onGetCurrentFormEditData(contentid);
            }
            function onGetCurrentFormEditData(contentid) {
                formType='';
                if($('.isProductForm').length>0)
                    formType='isProductForm';
                else
                    formType='isUser';
                $.ajax({
                    "type": "POST",
                    "url": baseUrl + "admin/onGetCurrentFormEditData",
                    "data": 'action=addedit&contentid=' + contentid+'&formType='+formType,
                    "success": function (response) {
                        response=$.parseJSON(response);
                        if (response.success == 1) {
                            $('#currentAdminForm #id').val('' + response.user_id);
                            //$('#user_type').select2('val', response.user_type);
                            $('#user_type').val(response.user_type);
                            isActive = parseInt(response.isActive);
                            $('input[name="isActive"].flat-red').iCheck('uncheck');
                            if (isActive == 1) {
                                $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                            } else {
                                $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                            }
                            
                            $('#email').val(response.email);
                            $('#full_name').val(response.full_name);
                            $('#phone').val(response.phone);
                            localData = '';
                            if (response.sImage) {
                                currTime = new Date().getTime();
                                $('#image-holder img.img' + localData).attr('src', response.sImage + '?time=' + currTime);
                                $('#image-holder').show();
                                $('#file-selector' + localData).val(response.sImage);
                            } else {
                                $('#image-holder').hide();
                                $('#file-selector' + localData).val('');
                            }
                            //alert("Record has been deleted completely.");
                        } else
                            alert("Problem occured.");
                    }
                });
            }
            oTable = $('#adminTable').dataTable({
                "bFilter": true,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "admin/userProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                
                                
                                //onAddEditClick();
                                resetForm("currentAdminForm");
                                console.log(aData);

                                QuizId = aData[0];
                                
                                //
                                window.location=baseUrl+'admin/'+$('#users').val()+'?contentid='+QuizId;
                                //
                                
                                
                                
                                
                                
                                $('#currentAdminForm #id').val('' + aData[0]);
                                //$('#user_type').select2('val', aData[4]);
                                isActive = parseInt(aData[6]);
                                $('input[name="isActive"].flat-red').iCheck('uncheck');
                                if (isActive == 1) {
                                    $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                } else {
                                    $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                }
                                $('#email').val(aData[3]);
                                $('#full_name').val(aData[8]);
                                $('#phone').val(aData[9]);
                                localData = '';
                                if (aData[10]) {
                                    currTime = new Date().getTime();
                                    $('#image-holder img.img' + localData).attr('src', aData[10] + '?time=' + currTime);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[10]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#file-selector' + localData).val('');
                                }

                                $('#adminForm').show();
                                $('#adminTableBox').hide();

                                $('#adminForm2').hide();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "admin/onDeleteUser",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            alert("Record has been deleted completely.");
                                            window.location=baseUrl+'admin/'+$('#users').attr('id');
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "action",
                        "value": "getQuizData"
                    });
                    aoData.push({
                        "name": "YearMonth",
                        "value": $('#YearMonth').val()
                    });
                    aoData.push({
                        "name": "MembersId",
                        "value": $('#ExpMembersId').val()
                    });

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false

                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }]
            });


        });

        $('.btn-add-option').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            /**/
            //onAddEditClick2();
            $('#question_id').val(currentQuestionId);
        });

        $('.btn-option-save').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            isAnswer = $('input[name="isAnswer"]:checked').val();
            //if (jQuery("#currentAdminForm2").validationEngine('validate')) {
            $.ajax({
                url: baseUrl + 'admin/optionSaveUpdate',
                type: 'post',
                data: $('#currentAdminForm2').serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert('Successfully Updated');
                        $('#adminForm2').hide();
                        $('#adminTableBox2').show();
                        oTable2.fnDraw();
                    } else
                        alert('There is server processing error;');
                }
            });
            //}
        });
        $('.btn-option-cancel').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').hide();
            $('#adminTableBox2').show();
        });
        $(".select2").select2();

    }
    if ($('#admin_blogs').length > 0) {

        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {
            resetForm("currentAdminForm");
            $('#currentAdminForm #id').val('');
            //$('#user_type').select2('val', 'admin');
            $('.onEdit').hide();

            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
        }

        function onAddEditClick2() {
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);
            $('input[name="isAnswer"].flat-red').iCheck('uncheck');
            $('input[name="isAnswer"].flat-red:eq(0)').iCheck('check');
        }
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('#adminForm').hide();
            $('#adminTableBox').show();

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
                CKEDITOR.instances['body'].setData('');
                $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
                $('#sImage').val('');
                $('.btn-add').hide();
            });
            $('.btn-form-save').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {
                    //if (jQuery("#currentAdminForm").validationEngine('validate')) {
                    bodytxt = CKEDITOR.instances['body'].getData();
                    $('#bodytxt').val(bodytxt);
                    //alert(bodytxt);
                    $.ajax({
                        url: baseUrl + 'saveUpdateAll',
                        type: 'post',
                        data: $('#currentAdminForm').serialize(),
                        success: function (response) {
                            if (response == 1) {
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
                    //}
                } else {
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
                $('.btn-add').show();
            });

            oTable = $('#adminTable').dataTable({
                "bFilter": true,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "loadPageProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                onAddEditClick();
                                resetForm("currentAdminForm");
                                console.log(aData);

                                QuizId = aData[0];
                                $('#currentAdminForm #id').val('' + aData[0]);
                                $('#category').val(aData[3]);
                                //$('#user_type').select2('val', aData[4]);
                                isActive = parseInt(aData[7]);
                                $('input[name="isActive"].flat-red').iCheck('uncheck');
                                if (isActive == 1) {
                                    $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                } else {
                                    $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                }
                                $('#slug').val(aData[2]);
                                CKEDITOR.instances['body'].setData(aData[6]);
                                $('#title').val(aData[4]);
                                $('#body').val(aData[5]);
                                $('#tags').val(aData[12]);
                                onEditUrl = baseUrl + $('#category').val() + '/' + $('#slug').val();
                                $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
                                $('.onEdit').show();
                                $('.btn-add').hide();
                                localData = '';
                                if (aData[11]) {
                                    currTime = new Date().getTime();
                                    $('#my-file-selector1' + localData).attr('src', baseUrl + aData[11] + '?time=' + currTime);
                                    $('#sImage').val(aData[11]);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[11]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#file-selector' + localData).val('');
                                }

                                $('#adminForm').show();
                                $('#adminTableBox').hide();

                                $('#adminForm2').hide();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "admin/questionDeleteProcessing",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            oTable.fnDraw();
                                            alert("Record has been deleted completely.");
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "action",
                        "value": "getQuizData"
                    });
                    aoData.push({
                        "name": "page_category",
                        "value": $('#category').val()
                    });

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false

                    }, {
                        "bVisible": false

                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }]
            });
            function initUpload(localData) {
                if (localData == 1)
                    str = '';
                else
                    str = 'Upload Feature Image';

                var settings = "settings_";
                settings = {
                    url: baseUrl + 'admin/fileupload?action=featurefileupload',
                    method: "POST",
                    allowedTypes: "jpg,png,gif,jpeg",
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
                            $('.sImage').attr('src', baseUrl + response.imgurl);
                            $('#sImage').val(response.imgurl);
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

            initUpload('');
        });

        $('.btn-add-option').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            /**/
            //onAddEditClick2();
            $('#question_id').val(currentQuestionId);
        });

        $('.btn-option-save').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            isAnswer = $('input[name="isAnswer"]:checked').val();
            //if (jQuery("#currentAdminForm2").validationEngine('validate')) {
            $.ajax({
                url: baseUrl + 'admin/optionSaveUpdate',
                type: 'post',
                data: $('#currentAdminForm2').serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert('Successfully Updated');
                        $('#adminForm2').hide();
                        $('#adminTableBox2').show();
                        oTable2.fnDraw();
                    } else
                        alert('There is server processing error;');
                }
            });
            //}
        });
        $('.btn-option-cancel').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').hide();
            $('#adminTableBox2').show();
        });
        $(".select2").select2();

    }
    $(document).on('keyup', 'input[name=title],input[name=name],input[name=hl2]', function () {
        urlstring = $('input[name=title],input[name=name],input[name=hl2]').val();
        urlstring = urlstring.split(' ').join('-');
        urlstring = urlstring.split(',').join('-');
        urlstring = urlstring.split('.').join('-');
        urlstring = urlstring.split('&').join('-');
        urlstring = urlstring.split('?').join('-');
        urlstring = urlstring.split('@').join('-');
        urlstring = urlstring.split('+').join('-');
        urlstring = urlstring.split(':').join('-');
        urlstring = urlstring.split('/').join('-');
        urlstring = urlstring.split('\'').join('-');
        urlstring = urlstring.split('!').join('-');
        urlstring = urlstring.split('%').join('-');
        urlstring = urlstring.split('#').join('-');
        urlstring = urlstring.split('‘').join('-');
        urlstring = urlstring.split('’').join('-');
        urlstring = urlstring.split('$').join('-');
        urlstring = urlstring.split('*').join('-');
        urlstring = urlstring.split('(').join('-');
        urlstring = urlstring.split(')').join('-');
        urlstring = urlstring.split('^').join('-');
        urlstring = urlstring.toLowerCase();
        $('input[name=slug]').val(urlstring);
        onEditUrl = baseUrl + $('#category').val() + '/' + $('#slug').val();
        $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
        $('.onEdit').show();
    });
    $(document).on('keyup', 'input[name=slug]', function () {
        onEditUrl = baseUrl + $('#category').val() + '/' + $('#slug').val();
        $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
        $('.onEdit').show();
    });
    if ($('#admin_news').length > 0) {

        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {
            resetForm("currentAdminForm");
            $('#currentAdminForm #id').val('');
            //$('#user_type').select2('val', 'admin');
            $('.onEdit').hide();

            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
        }

        function onAddEditClick2() {
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);
            $('input[name="isAnswer"].flat-red').iCheck('uncheck');
            $('input[name="isAnswer"].flat-red:eq(0)').iCheck('check');
        }
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('#adminForm').hide();
            $('#adminTableBox').show();

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
            $('.btn-generate-page').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: baseUrl + 'admin/generatePage',
                    type: 'post',
                    data: {},
                    success: function (response) {
                        if (response == 1) {
                            alert('Successfully Updated');
                        } else
                            alert('There is server processing error;');
                    }
                });
            });
            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
                CKEDITOR.instances['body'].setData('');
                $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
                $('#sImage').val('');
                $('.btn-add').hide();
            });
            $('.btn-form-save').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {
                    //if (jQuery("#currentAdminForm").validationEngine('validate')) {
                    bodytxt = CKEDITOR.instances['body'].getData();
                    $('#bodytxt').val(bodytxt);
                    //alert(bodytxt);
                    $.ajax({
                        url: baseUrl + 'saveUpdateAll',
                        type: 'post',
                        data: $('#currentAdminForm').serialize(),
                        success: function (response) {
                            if (response == 1) {
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
                    //}
                } else {
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
                $('.btn-add').show();
            });

            oTable = $('#adminTable').dataTable({
                "bFilter": true,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "loadPageProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                onAddEditClick();
                                resetForm("currentAdminForm");
                                console.log(aData);

                                QuizId = aData[0];
                                $('#currentAdminForm #id').val('' + aData[0]);
                                $('#category').val(aData[3]);
                                //$('#user_type').select2('val', aData[4]);
                                isActive = parseInt(aData[7]);
                                $('input[name="isActive"].flat-red').iCheck('uncheck');
                                if (isActive == 1) {
                                    $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                } else {
                                    $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                }
                                $('#slug').val(aData[2]);
                                if ($('.ckeditor').length > 0) {
                                    CKEDITOR.instances['body'].setData(aData[6]);
                                } else {
                                    //alert(aData[6]);
                                    document.getElementById('body').value = aData[6];
                                    //$('#body').val(aData[6]);
                                }
                                $('#title').val(aData[4]);
                                $('#body').val(aData[5]);
                                $('#tags').val(aData[12]);
                                if ($('#excerpt').length > 0) {
                                    $('#excerpt').val(aData[13]);
                                }
                                if ($('#reviewtype').length > 0) {
                                    $('#reviewtype').val(aData[14]);
                                }
                                if ($('#biography').length > 0) {
                                    $('#biography').val(aData[15]);
                                }
                                onEditUrl = baseUrl + $('#category').val() + '/' + $('#slug').val();
                                $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
                                $('.onEdit').show();
                                $('.btn-add').hide();
                                localData = '';
                                if (aData[11]) {
                                    currTime = new Date().getTime();
                                    $('#my-file-selector1' + localData).attr('src', baseUrl + aData[11] + '?time=' + currTime);
                                    $('#sImage').val(aData[11]);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[11]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#file-selector' + localData).val('');
                                }
                                $('.onEdit').show();
                                $('#adminForm').show();
                                $('#adminTableBox').hide();

                                $('#adminForm2').hide();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "admin/questionDeleteProcessing",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            oTable.fnDraw();
                                            alert("Record has been deleted completely.");
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "action",
                        "value": "getQuizData"
                    });
                    aoData.push({
                        "name": "page_category",
                        "value": $('#category').val()
                    });

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false

                    }, {
                        "bVisible": false

                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }]
            });
            function initUpload(localData) {
                if (localData == 1)
                    str = '';
                else
                    str = 'Upload Feature Image';

                var settings = "settings_";
                settings = {
                    url: baseUrl + 'admin/fileupload?action=featurefileupload',
                    method: "POST",
                    allowedTypes: "jpg,png,gif,jpeg",
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
                            $('.sImage').attr('src', baseUrl + response.imgurl);
                            $('#sImage').val(response.imgurl);
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

            initUpload('');
        });

        $('.btn-add-option').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            /**/
            //onAddEditClick2();
            $('#question_id').val(currentQuestionId);
        });

        $('.btn-option-save').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            isAnswer = $('input[name="isAnswer"]:checked').val();
            //if (jQuery("#currentAdminForm2").validationEngine('validate')) {
            $.ajax({
                url: baseUrl + 'admin/optionSaveUpdate',
                type: 'post',
                data: $('#currentAdminForm2').serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert('Successfully Updated');
                        $('#adminForm2').hide();
                        $('#adminTableBox2').show();
                        oTable2.fnDraw();
                    } else
                        alert('There is server processing error;');
                }
            });
            //}
        });
        $('.btn-option-cancel').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').hide();
            $('#adminTableBox2').show();
        });
        $(".select2").select2();

    }
    if ($('#discover').length > 0) {

        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {

            if ($('#edit_news').val() == 'news') {

            } else {
                resetForm("currentAdminForm");
                $('#currentAdminForm #id').val('');
                //$('#user_type').select2('val', 'admin');
                $('.onEdit').hide();

                $('input[name="isActive"].flat-red').iCheck('uncheck');
                $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
            }
        }

        function onAddEditClick2() {
            pageid = $('#currentAdminForm2 #pageid').val();
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);

            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
            $('#currentAdminForm2 #pageid').val(pageid);
        }

        $(function () {
            //CKEDITOR.config.startupMode = 'source';
            CKEDITOR.config.startupMode = 'wysiwyg';
            CKEDITOR.config.allowedContent = true;
            CKEDITOR.config.baseHref = baseUrl;
            //$( 'textarea' ).ckeditor({baseHref : "http://www.google.com/"});
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            if ($('#edit_news').val() == 'news') {
                $('#adminForm').show();

            } else {
                // do as it is
                $('#adminForm').hide();
                $('#adminTableBox').show();

                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
            }


            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
                CKEDITOR.instances['body'].setData('');
                localData = '';
                $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/650x433/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
                $('#sImage').val('');
                $('.btn-add').hide();
            });
            $('.btn-form-save').on('click', function (e) {
                //e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {
                    if ($('#category').val() != 'languages') {
                        bodytxt = CKEDITOR.instances['body'].getData();
                        $('#bodytxt').val(bodytxt);
                    }

                    //
                } else {
                    e.preventDefault();
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $.validate({
                form: '#currentAdminForm',
                modules: 'location, date, security, file',
                onSuccess: function (valid, $el, $form, errorMess) {
                    //onSuccess: function ($form) {

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
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
                $('.btn-add').show();
            });
            //alert(contentid);
            if(contentid){
                onGetCurrentFormEditData(contentid);
            }
            function onGetCurrentFormEditData(contentid) {
                formType='';
                if($('.isProductForm').length>0)
                    formType='isProductForm';
                else
                    formType='isUser';
                $.ajax({
                    "type": "POST",
                    "url": baseUrl + "discover/onGetCurrentFormEditData",
                    "data": 'type='+$('#category').val()+'&contentid=' + contentid+'&formType='+formType,
                    "success": function (response) {
                        response=$.parseJSON(response);
                        if (response.success == 1) {
                            $('#currentAdminForm #id').val('' + response.id);
                            //$('#user_type').select2('val', response.user_type);
                            isActive = parseInt(response.isActive);
                            $('input[name="isActive"].flat-red').iCheck('uncheck');
                            if (isActive == 1) {
                                $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                            } else {
                                $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                            }
                            if(formType=='isProductForm'){
                                $('#currentAdminForm #id').val('' + response.master_id);
                                $('#type_id').val(response.type_id);
                                $('#batch_no').val(response.batch_no);
                                $('#trade_price').val(response.trade_price);
                                $('#selling_price').val(response.selling_price);
                                $('#expire_date ').val(response.expire_date );
                                $('#product_unit ').val(response.product_unit );
                                $('#supplier_code ').val(response.master_supplier_code );
                                
                                $('#model ').val(response.model );
                                $('#partnumber ').val(response.partnumber );
                                
                                
                                $('#product_size ').val(response.product_size );
                                $('#instock ').val(response.instock );
                                $('#short_quantity ').val(response.short_quantity );
                                $('#tax ').val(response.tax );
                                CKEDITOR.instances['body'].setData(response.descriptions);
                            }else if ($('.ckeditor').length > 0) {
                                CKEDITOR.instances['body'].setData(response.details);
                            } else {
                                //document.getElementById('body').value = response.details;
                            }
                            $('#email').val(response.email);
                            $('#name').val(response.name);
                            $('#slug').val(response.slug);
                            $('#address').val(response.address);
                            $('#phone').val(response.phone);
                            $('#store_type').val(response.store_type);
                            
                            localData = '';
                            if (response.thumb_photo) {
                                currTime = new Date().getTime();
                                $('#my-file-selector1' + localData).attr('src', baseUrl +response.thumb_photo + '?time=' + currTime);
                                $('#sImage').val(response.thumb_photo);
                                $('#image-holder').show();
                                $('#file-selector' + localData).val(response.thumb_photo);
                            } else {
                                $('#image-holder').hide();
                                $('#file-selector' + localData).val('');
                            }
                            //alert("Record has been deleted completely.");
                        } else
                            alert("Problem occured.");
                    }
                });
            }
            if ($('#edit_news').val() == 'news--') {

            } else {
                oTable = $('#adminTable').dataTable({
                    "bFilter": true,
                    "bJQueryUI": true,
                    "bSort": true,
                    "bInfo": true,
                    "bPaginate": true,
                    "bSortClasses": false,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sDom": '<"H"fir>t<"F"lp> ',
                    "sPaginationType": "full_numbers",
                    "sScrollX": "100%",
                    "sAjaxSource": baseUrl + "discoverPageProcessing",
                    "aaSorting": [[2, 'desc']],
                    "oLanguage": {
                        "sLengthMenu": "Display _MENU_ Records",
                        //"sZeroRecords": "Nothing found - sorry",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                        "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                        "sInfoFiltered": "(filtered from _MAX_ total Records)"
                    },
                    "fnDrawCallback": function () {
                        $('td img.pEdit', oTable.fnGetNodes()).each(function () {
                            $(this).on('click', function () {
                                var nTr = this.parentNode.parentNode;
                                var aData = oTable.fnGetData(nTr);
                                if (confirm("Do you really want to change in this Record?")) {
                                    onAddEditClick();
                                    resetForm("currentAdminForm");
                                    console.log(aData);
                                    QuizId = aData[0];

                                    //if ( $('#category').val() == 'suppliers'|| $('#category').val() == 'stores') {
                                        window.location=baseUrl+'admin/'+$('#'+$('#category').val()).val()+'?contentid='+QuizId;
                                   // } else {
                                        // do as it is
                                   // }




                                    $('#currentAdminForm #id').val('' + aData[0]);
                                    $('#category').val(aData[3]);
                                    //$('#user_type').select2('val', aData[4]);
                                    isActive = parseInt(aData[7]);
                                    $(' input[name="isActive"].flat-red').iCheck('uncheck');
                                    $('body').animate({opacity: 1}, 200, function () {
                                        if (isActive == 1) {
                                            $(' input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                        } else {
                                            $(' input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                        }
                                    });
                                    
                                    if($('.banners_admin').length>0){
                                        $('#navigation_url').val(aData[9]);
                                        $('#banner_type').val(aData[4]);
                                        if ($('.ckeditor').length > 0) {
                                            CKEDITOR.instances['body'].setData(aData[6]);
                                        } else {
                                            //alert(aData[6]);
                                            //document.getElementById('body').value = aData[6];
                                            //$('#body').val(aData[6]);
                                        }
                                        
                                        if($('#sImage').length>0){
                                            localData = '';
                                            if (aData[11]) {
                                                currTime = new Date().getTime();
                                                $('#my-file-selector1' + localData).attr('src', baseUrl+aData[11] + '?time=' + currTime);
                                                $('#sImage').val(aData[11]);
                                                $('#image-holder').show();
                                                $('#file-selector' + localData).val(aData[11]);
                                            } else {
                                                $('#image-holder').hide();
                                                $('#file-selector' + localData).val('');
                                            }
                                        }
                                    }
                                    $('#slug').val(aData[4]);
                                    //$('#hl').val(aData[2]);
                                    $('#news_link').val(aData[4]);
                                    $('#title').val(aData[2]);
                                    $('#singers').val(aData[11]);
                                    $('#lyricist').val(aData[12]);

                                    onEditUrl = baseUrl + 'discover' + '/' + $('#slug').val();
                                    $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
                                    $('.onEdit').show();
                                    $('.btn-add').hide();

                                    $('.onEdit').show();
                                    $('#adminForm').show();
                                    $('#adminTableBox').hide();

                                    $('#adminForm2').hide();
                                    $('#adminTableBox2').hide();

                                    if ($('#category').val() == 'languages') {
                                        $('#name').val(aData[2]);
                                        $('#short').val(aData[4]);
                                        $('#isDefault').val(aData[9]);

                                        $('.onEdit').hide();
                                    }
                                }

                            });
                        });
                        $('td img.pDrop', oTable.fnGetNodes()).each(function () {
                            $(this).on('click', function () {
                                var nTr = this.parentNode.parentNode;
                                var aData = oTable.fnGetData(nTr);
                                if (confirm("Do you really want to delete this Record?")) {
                                    quizId = aData[0];
                                    if ($('#category').val() == 'news')
                                        deleteUrl = baseUrl + 'admin/newsDeleteProcessing';
                                    else
                                        deleteUrl = baseUrl + 'discoverDeleteProcessing';
                                    $.ajax({
                                        "type": "POST",
                                        "url": deleteUrl,
                                        "data": 'type='+$('#category').val()+'&id=' + quizId,
                                        "success": function (response) {
                                            if (response == 1) {
                                                oTable.fnDraw();
                                                alert("Record has been deleted completely.");
                                            } else
                                                alert("Record has not been deleted. Problem occured.");
                                        }
                                    });
                                }
                                // end of if(confirm())
                            });
                        });
                    },
                    "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                        return nRow;
                    },
                    "fnServerData": function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "action",
                            "value": "getQuizData"
                        });
                        aoData.push({
                            "name": "page_category",
                            "value": $('#category').val()
                        });

                        $.ajax({
                            "dataType": 'json',
                            "type": "POST",
                            "url": sSource,
                            "data": aoData,
                            "success": function (json) {
                                fnCallback(json);
                            }
                        });
                    },
                    "aoColumns": [{
                            "bVisible": false
                        }, {
                            "sClass": "sl center",
                            "bSortable": false
                        }, {
                            "sClass": ""
                        }, {
                            "bVisible": false
                        }, {
                            "sClass": ""
                        }, {
                            "bVisible": false

                        }, {
                            "bVisible": false

                        }, {
                            "sClass": ""
                        }, {
                            "sClass": ""
                        }]
                });
            }
            function initUpload(localData) {

                if (localData == 1)
                    str = '';
                else if (localData == 2)
                    str = 'Upload File';
                else
                    str = 'Upload Feature Image';

                if (localData == 2)
                    allowedType = 'mp3';
                else
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
                                $('.sImage').attr('src', baseUrl + response.imgurl);
                                $('#sImage').val(response.imgurl);
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
                    str = 'Upload File';
                else
                    str = 'Upload Feature Image';

                if (localData == 2)
                    allowedType = 'mp3';
                else
                    allowedType = 'jpg,png,gif,jpeg';

                var settings = "settings_" + localData;
                settings = {
                    url: baseUrl + 'admin/fileupload?action=trackfileupload',
                    method: "POST",
                    allowedTypes: allowedType,
                    fileName: "image",
                    multiple: false,
                    cache: false,
                    dragDropStr: '<span>' + str + '</span>',
                    onSubmit: function () {
                        this.url = baseUrl + 'admin/fileupload?action=trackfileupload';
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
                                $('.sImage').attr('src', baseUrl + response.imgurl);
                                $('#sImage').val(response.imgurl);
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


            initUpload_audio(2);
            initUpload('');

            if ($('.hidemyimage').length > 0)
                $('.hidemyimage .sImage,.hidemyimage .thumbnail').hide();

            $('#loader-gallery, #loader-gallery1').hide();
            oTable2 = $('#adminTable2').dataTable({
                "bFilter": true,
                "searching": false,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "discoverOptionProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable2.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable2.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                onAddEditClick2();
                                resetForm("currentAdminForm2");
                                console.log(aData);

                                QuizId = aData[0];
                                $('#currentAdminForm2 #id').val('' + aData[0]);
                                $('#currentAdminForm2 #pageid').val('' + aData[11]);

                                $('#currentAdminForm2 #title').val(aData[2]);
                                $('#currentAdminForm2 #singers').val(aData[4]);
                                $('#currentAdminForm2 #lyricist').val(aData[8]);
                                $('#currentAdminForm2 #excerpt').val(aData[9]);
                                $('.langmapping #title').val(aData[2]);
                                $('#pageid').val(parseInt(aData[3]));
                                if ($('.ckeditor').length > 0) {
                                    CKEDITOR.instances['body'].setData(aData[6]);
                                } else {
                                    //alert(aData[6]);
                                    document.getElementById('body').value = aData[6];
                                    //$('#body').val(aData[6]);
                                }
                                CKEDITOR.config.startupMode = 'source';
                                localData = '';
                                if (aData[7]) {
                                    currTime = new Date().getTime();
                                    $('#my-file-selector1' + localData).attr('src', baseUrl + aData[7] + '?time=' + currTime);
                                    $('#sImage').val(aData[11]);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[7]);
                                    $('#currentAdminForm2 #sImage').val(aData[7]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#sImage').val('');
                                    $('#file-selector' + localData).val('');
                                    $('#my-file-selector1' + localData).val('');
                                }

                                isActive = parseInt(aData[10]);
                                $('#currentAdminForm2 input[name="isActive"].flat-red').iCheck('uncheck');
                                $('body').animate({opacity: 1}, 200, function () {
                                    if (isActive == 1) {
                                        $('#currentAdminForm2 input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                    } else {
                                        $('#currentAdminForm2 input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                    }
                                });

                                $('#adminForm2').show();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable2.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable2.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "discoverOptionDeleteProcessing",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            oTable2.fnDraw();
                                            alert("Record has been deleted completely.");
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "pageid",
                        "value": currentQuestionId
                    });

                    $('#currentAdminForm2 #pageid').val('' + currentQuestionId);

                    if ($('.langmapping').length > 0) {
                        aoData.push({
                            "name": "pagelangmapping",
                            "value": 'audiofiles'
                        });
                    }

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": "",
                        "bVisible": false
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": "",
                        "bVisible": false
                    }]
            });
            $('.removeImg').on('click', function () {
                var r = confirm("Are you sure want to remove picture?");
                if (r == true) {
                    type = $(this).attr('type')
                    $('#image-holder img.img').attr('src', '');
                    $('#image-holder').hide();
                    if (question == 'question')
                        localData = '';
                    $('#file-selector' + localData).val('');
                }
            });
        });
        $('#adminTable tbody').on('click', 'tr', function () {
            var aData = oTable.fnGetData(this);
            currentQuestionId = aData[0];

            $('#adminForm2').hide();
            $('#adminTableBox2').show();
            onAddEditClick2();

            $('#pageid').val(currentQuestionId);

            oTable2.fnDraw();
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                oTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });

        $('.btn-add-option').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            CKEDITOR.instances['body'].setData('');
            localData = '';
            currTime = new Date().getTime();
            $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
            $('#sImage').val('');
            /**/
            onAddEditClick2();
            $('#pageid').val(currentQuestionId);
        });

        $('.btn-option-save').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            isActive = $('input[name="isActive"]:checked').val();
            bodytxt = CKEDITOR.instances['body'].getData();
            $('#bodytxt').val(bodytxt);
            //if (jQuery("#currentAdminForm2").validationEngine('validate')) {
            $.ajax({
                url: baseUrl + 'discoverOptionSaveUpdate',
                type: 'post',
                data: $('#currentAdminForm2').serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert('Successfully Updated');
                        $('#adminForm2').hide();
                        $('#adminTableBox2').show();
                        oTable2.fnDraw();
                    } else
                        alert('There is server processing error;');
                }
            });
            //}
        });
        $('.btn-option-cancel').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').hide();
            $('#adminTableBox2').show();
        });
        //$(".select2").select2();

    }
    if ($('#admin_gallery').length > 0) {

        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {
            resetForm("currentAdminForm");
            $('#currentAdminForm #id').val('');
            //$('#user_type').select2('val', 'admin');
            $('.onEdit').hide();

            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
        }

        function onAddEditClick2() {
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);
            $('input[name="isAnswer"].flat-red').iCheck('uncheck');
            $('input[name="isAnswer"].flat-red:eq(0)').iCheck('check');
        }
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('#adminForm').hide();
            $('#adminTableBox').show();

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
                CKEDITOR.instances['body'].setData('');
                $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
                $('#sImage').val('');
                $('.btn-add').hide();
            });
            $('.btn-form-save').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {
                    //if (jQuery("#currentAdminForm").validationEngine('validate')) {
                    bodytxt = CKEDITOR.instances['body'].getData();
                    $('#bodytxt').val(bodytxt);
                    //alert(bodytxt);
                    $.ajax({
                        url: baseUrl + 'saveUpdateAll',
                        type: 'post',
                        data: $('#currentAdminForm').serialize(),
                        success: function (response) {
                            if (response == 1) {
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
                    //}
                } else {
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
                $('.btn-add').show();
            });

            oTable = $('#adminTable').dataTable({
                "bFilter": true,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "loadPageProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                onAddEditClick();
                                resetForm("currentAdminForm");
                                console.log(aData);

                                QuizId = aData[0];
                                $('#currentAdminForm #id').val('' + aData[0]);
                                $('#category').val(aData[3]);
                                //$('#user_type').select2('val', aData[4]);
                                isActive = parseInt(aData[7]);
                                $('input[name="isActive"].flat-red').iCheck('uncheck');
                                if (isActive == 1) {
                                    $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                } else {
                                    $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                }
                                $('#slug').val(aData[2]);
                                CKEDITOR.instances['body'].setData(aData[6]);
                                $('#title').val(aData[4]);
                                $('#tags').val(aData[12]);
                                onEditUrl = baseUrl + $('#category').val() + '/' + $('#slug').val();
                                $('.onEditUrl').html('<a href="' + onEditUrl + '" target="_blank" >' + onEditUrl + '</a>');
                                $('.onEdit').show();
                                $('#body').val(aData[5]);
                                $('.btn-add').hide();

                                localData = '';
                                if (aData[11]) {
                                    currTime = new Date().getTime();
                                    $('#my-file-selector_' + localData).attr('src', baseUrl + aData[11] + '?time=' + currTime);
                                    $('#sImage').val(aData[11]);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[11]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#file-selector' + localData).val('');
                                    $('#my-file-selector_' + localData).val('');
                                }

                                $('#adminForm').show();
                                $('#adminTableBox').hide();

                                $('#adminForm2').hide();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "admin/questionDeleteProcessing",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            oTable.fnDraw();
                                            alert("Record has been deleted completely.");
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "action",
                        "value": "getQuizData"
                    });
                    aoData.push({
                        "name": "page_category",
                        "value": $('#category').val()
                    });

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false
                    }, {
                        "sClass": ""
                    }, {
                        "bVisible": false

                    }, {
                        "bVisible": false

                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }]
            });
            function initUpload(localData) {
                if (localData == 1)
                    str = 'Feature Picture';
                else
                    str = 'Front Picture';

                var settings = "settings_";
                settings = {
                    url: baseUrl + 'admin/fileupload?action=featurefileupload',
                    method: "POST",
                    allowedTypes: "jpg,png,gif,jpeg",
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
                            $('.sImage').attr('src', baseUrl + response.imgurl);
                            $('#sImage').val(response.imgurl);
                            $('#adminForm2 .sImage').attr('src', baseUrl + response.imgurl);
                            $('#adminForm2 #sImage').val(response.imgurl);
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

            initUpload('');
            initUpload('1');

            oTable2 = $('#adminTable2').dataTable({
                "bFilter": true,
                "searching": false,
                "bJQueryUI": true,
                "bSort": true,
                "bInfo": true,
                "bPaginate": true,
                "bSortClasses": false,
                "bProcessing": true,
                "bServerSide": true,
                "sDom": '<"H"fir>t<"F"lp> ',
                "sPaginationType": "full_numbers",
                "sScrollX": "100%",
                "sAjaxSource": baseUrl + "discoverOptionProcessing",
                "aaSorting": [[2, 'desc']],
                "oLanguage": {
                    "sLengthMenu": "Display _MENU_ Records",
                    //"sZeroRecords": "Nothing found - sorry",
                    "sInfo": "Showing _START_ to _END_ of _TOTAL_ Records",
                    "sInfoEmpty": "Showing 0 to 0 of 0 Records",
                    "sInfoFiltered": "(filtered from _MAX_ total Records)"
                },
                "fnDrawCallback": function () {
                    $('td img.pEdit', oTable2.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable2.fnGetData(nTr);
                            if (confirm("Do you really want to change in this Record?")) {
                                onAddEditClick2();
                                resetForm("currentAdminForm2");
                                console.log(aData);

                                QuizId = aData[0];
                                $('#currentAdminForm2 #id').val('' + aData[0]);
                                isActive = parseInt(aData[8]);
                                $('input[name="isActive"].flat-red').iCheck('uncheck');
                                if (isActive == 1) {
                                    $('input[name="isActive"].flat-red:eq(0)').iCheck('check');
                                } else {
                                    $('input[name="isActive"].flat-red:eq(1)').iCheck('check');
                                }
                                $('#name').val(aData[2]);
                                $('#pageid').val(parseInt(aData[3]));
                                if ($('.ckeditor').length > 0) {
                                    CKEDITOR.instances['body'].setData(aData[6]);
                                } else {
                                    //alert(aData[6]);
                                    document.getElementById('body').value = aData[6];
                                    //$('#body').val(aData[6]);
                                }
                                CKEDITOR.config.startupMode = 'source';
                                localData = '1';
                                if (aData[7]) {
                                    currTime = new Date().getTime();
                                    $('#my-file-selector_' + localData).attr('src', baseUrl + aData[7] + '?time=' + currTime);
                                    $('#adminForm2 #sImage').val(aData[7]);
                                    $('#image-holder').show();
                                    $('#file-selector' + localData).val(aData[7]);
                                } else {
                                    $('#image-holder').hide();
                                    $('#adminForm2 #sImage').val('');
                                    $('#file-selector' + localData).val('');
                                    $('#my-file-selector_' + localData).val('');
                                }

                                $('#adminForm2').show();
                                $('#adminTableBox2').hide();
                            }

                        });
                    });
                    $('td img.pDrop', oTable2.fnGetNodes()).each(function () {
                        $(this).on('click', function () {
                            var nTr = this.parentNode.parentNode;
                            var aData = oTable2.fnGetData(nTr);
                            if (confirm("Do you really want to delete this Record?")) {
                                quizId = aData[0];
                                $.ajax({
                                    "type": "POST",
                                    "url": baseUrl + "discoverOptionDeleteProcessing",
                                    "data": 'action=deleteQuiz&id=' + quizId,
                                    "success": function (response) {
                                        if (response == 1) {
                                            oTable2.fnDraw();
                                            alert("Record has been deleted completely.");
                                        } else
                                            alert("Record has not been deleted. Problem occured.");
                                    }
                                });
                            }
                            // end of if(confirm())
                        });
                    });
                },
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    return nRow;
                },
                "fnServerData": function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "pageid",
                        "value": currentQuestionId
                    });

                    $.ajax({
                        "dataType": 'json',
                        "type": "POST",
                        "url": sSource,
                        "data": aoData,
                        "success": function (json) {
                            fnCallback(json);
                        }
                    });
                },
                "aoColumns": [{
                        "bVisible": false
                    }, {
                        "sClass": "sl center",
                        "bSortable": false
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": "",
                        "bVisible": false
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": ""
                    }, {
                        "sClass": "",
                        "bVisible": false
                    }]
            });
            $('.removeImg').on('click', function () {
                var r = confirm("Are you sure want to remove picture?");
                if (r == true) {
                    type = $(this).attr('type')
                    $('#image-holder img.img').attr('src', '');
                    $('#image-holder').hide();
                    if (question == 'question')
                        localData = '';
                    $('#file-selector' + localData).val('');
                }
            });
        });
        $('#adminTable tbody').on('click', 'tr', function () {
            var aData = oTable.fnGetData(this);
            currentQuestionId = aData[0];

            $('#adminForm2').hide();
            $('#adminTableBox2').show();
            onAddEditClick2();

            $('#pageid').val(currentQuestionId);

            oTable2.fnDraw();
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                oTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

        });

        $('.btn-add-option').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            CKEDITOR.instances['body'].setData('');
            localData = '';
            currTime = new Date().getTime();
            $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
            $('#sImage').val('');
            /**/
            onAddEditClick2();
            $('#pageid').val(currentQuestionId);
        });

        $('.btn-option-save').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').show();
            $('#adminTableBox2').hide();
            isActive = $('input[name="isActive"]:checked').val();
            bodytxt = CKEDITOR.instances['body'].getData();
            $('#adminForm2 #bodytxt').val(bodytxt);
            //if (jQuery("#currentAdminForm2").validationEngine('validate')) {
            $.ajax({
                url: baseUrl + 'discoverOptionSaveUpdate',
                type: 'post',
                data: $('#currentAdminForm2').serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert('Successfully Updated');
                        $('#adminForm2').hide();
                        $('#adminTableBox2').show();
                        oTable2.fnDraw();
                    } else
                        alert('There is server processing error;');
                }
            });
            //}
        });
        $('.btn-option-cancel').on('click', function (e) {
            e.preventDefault();
            $('#adminForm2').hide();
            $('#adminTableBox2').show();
        });
        //$(".select2").select2();






    }
    if ($('#admin_filemanager').length > 0) {
        var oTable, oTable2, currentQuestionId;
        function resetForm(id) {
            $('#' + id).each(function () {
                this.reset();
            });
        }
        function alertMyModalDisplay(msg) {
            $('#myModal .modal-body').html(msg);
            $('#myModal').modal('show');
            //html='<div class="alert alert-success" role="alert">'++'</div>';
            //$('.custom_msg').html(html);
        }
        function onAddEditClick() {
            resetForm("currentAdminForm");
            $('#currentAdminForm #id').val('');
            //$('#user_type').select2('val', 'admin');

            $('input[name="isActive"].flat-red').iCheck('uncheck');
            $('input[name="isActive"].flat-red:eq(0)').iCheck('check');

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
        }

        function onAddEditClick2() {
            resetForm("currentAdminForm2");
            $('#currentAdminForm2 #id').val('');
            //$('#user_type').select2('val',1);
            $('input[name="isAnswer"].flat-red').iCheck('uncheck');
            $('input[name="isAnswer"].flat-red:eq(0)').iCheck('check');
        }
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $('#adminForm').hide();
            $('#adminTableBox').show();

            $('#adminForm2').hide();
            $('#adminTableBox2').hide();
            $('.btn-add').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                /**/
                onAddEditClick();
                CKEDITOR.instances['body'].setData('');
                $('#my-file-selector1' + localData).attr('src', 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image?time=' + currTime);
                $('#sImage').val('');
                $('.btn-add').hide();
            });
            $('.btn-form-save').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').show();
                $('#adminTableBox').hide();
                isActive = $('input[name="isActive"]:checked').val();
                if ($('#newpassword').val() == $('#confirmpassword').val()) {
                    //if (jQuery("#currentAdminForm").validationEngine('validate')) {
                    bodytxt = CKEDITOR.instances['body'].getData();
                    $('#bodytxt').val(bodytxt);
                    //alert(bodytxt);
                    $.ajax({
                        url: baseUrl + 'saveUpdateAll',
                        type: 'post',
                        data: $('#currentAdminForm').serialize(),
                        success: function (response) {
                            if (response == 1) {
                                alert('Successfully Updated');
                                $('#adminForm').hide();
                                $('#adminTableBox').show();
                                $('.btn-add').show();
                                //window.location=baseUrl+'admin/'+$('#category').val();
                                oTable.fnDraw();
                            } else
                                alert('There is server processing error;');
                        }
                    });
                    //}
                } else {
                    msg = 'Sorry, newpassword and conirm password not similar.';
                    alertMyModalDisplay(msg);
                }
            });
            $('.btn-form-cancel').on('click', function (e) {
                e.preventDefault();
                $('#adminForm').hide();
                $('#adminTableBox').show();
                $('#adminForm2').hide();
                $('#adminTableBox2').hide();
                $('.btn-add').show();
            });
        });
        function initUpload(localData) {
            if (localData == 1)
                str = '';
            else
                str = 'Upload File';

            var settings = "settings_";
            settings = {
                url: baseUrl + 'admin/fileupload?action=filemanagerupload',
                method: "POST",
                allowedTypes: "jpg,png,gif,jpeg,pdf,doc,docx",
                fileName: "image",
                multiple: false,
                cache: false,
                dragDropStr: '<span>' + str + '</span>',
                onSubmit: function () {
                    this.url = baseUrl + 'admin/fileupload?action=filemanagerupload';
                    $('#loader-gallery' + localData).show();
                },
                onSuccess: function (files, data, xhr)
                {
                    response = $.parseJSON(data);
                    console.log(response);
                    if (response.status == 1) {
                        $('.sImage').attr('src', baseUrl + response.imgurl);
                        $('#sImage').val(response.imgurl);
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

        initUpload('');
    }
});