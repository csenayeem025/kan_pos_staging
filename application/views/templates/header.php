<!-- page HEADER -->
            <!-- ========================================================= -->
            <div class="page-header">
                <!-- LEFTSIDE header -->
                <div class="leftside-header">
                    <div class="logo">
                        <a href="index.html" class="on-click">
                            <img alt="logo" src="<?php echo base_url(); ?>assets/images/header-logo.png" />
                        </a>
                    </div>
                    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <!-- RIGHTSIDE header -->
                <div class="rightside-header">
                    <div class="header-middle"></div>
                    <!--NOCITE HEADERBOX-->
                    <div class="header-section hidden-xs" id="notice-headerbox">
                        <!--alerts notices-->
                        <div class="notice" id="alerts-notice">
                            <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                            <div class="dropdown-box basic">
                                <div class="drop-header">
                                    <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                    <span class="badge x-danger b-rounded">7</span>

                                </div>
                                <div class="drop-content">
                                    <div class="widget-list list-left-element list-sm">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                    <div class="text">
                                                        <span class="title">8 Bugs</span>
                                                        <span class="subtitle">reported today</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                    <div class="text">
                                                        <span class="title">Error</span>
                                                        <span class="subtitle">sevidor C down</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                    <div class="text">
                                                        <span class="title">New Configuration</span>
                                                        <span class="subtitle"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                    <div class="text">
                                                        <span class="title">14 Task</span>
                                                        <span class="subtitle">completed</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                    <div class="text">
                                                        <span class="title">21 Menssage</span>
                                                        <span class="subtitle"> (see more)</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="drop-footer">
                                    <a>See all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-separator"></div>
                    </div>
                    <!--USER HEADERBOX -->
                    <div class="header-section" id="user-headerbox">
                        <div class="user-header-wrap">
                            <div class="user-photo">
                                <img alt="profile photo" src="<?php echo base_url(); ?>assets/images/avatar/avatar_user.jpg" />
                            </div>
                            <div class="user-info">
                                <span class="user-name">Jane Doe</span>
                                <span class="user-profile">Admin</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                    <!--Log out -->
                    <div class="header-section">
                        <a href="sign-in.html" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>