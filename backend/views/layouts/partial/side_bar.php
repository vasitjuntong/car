<?php

use yii\helpers\Url;

?>
<aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
        <div class="size-toggle">
            <a class="btn btn-sm" id="sizeToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="btn btn-sm pull-right logoutConfirm_open" href="#logoutConfirm">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
        <!-- /size-toggle -->
        <div class="user-block clearfix">
            <img src="img/user.jpg" alt="User Avatar">

            <div class="detail">
                <strong>อัครินทร์ ราชครุฑ</strong><span
                    class="badge badge-danger m-left-xs bounceIn animation-delay4">4</span>
                <ul class="list-inline">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="inbox.html" class="no-margin">Inbox</a></li>
                </ul>
            </div>
        </div>
        <!-- /user-block -->
        <div class="search-block">
            <div class="input-group">
                <input type="text" class="form-control input-sm" placeholder="search here...">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
						</span>
            </div>
            <!-- /input-group -->
        </div>
        <!-- /search-block -->
        <div class="main-menu">
            <ul>
                <li
                    class="openable <?= (isset($this->context->activeMenu) and
                        $this->context->activeMenu == 'data_center') ? 'active' : ''; ?>"
                    >
                    <a href="#">
                        <span class="menu-icon">
                            <i class="fa fa-file-text fa-lg"></i>
                        </span>
                        <span class="text">
                            ข้อมูลพื้นฐาน
                        </span>
                        <span class="menu-hover"></span>
                    </a>
                    <ul
                        class="submenu" <?= (isset($this->context->activeMenu) and
                        $this->context->activeMenu == 'data_center') ? 'style="display: block"' : ''; ?>
                        >
                        <li class="<?= (isset($this->context->activeMenu) and
                            $this->context->activeMenu == 'data_center') ? 'open' : ''; ?>"
                            >
                            <a href="<?= Url::to('/car'); ?>"><span class="submenu-label">รถ</span></a></li>

                        <li><a href="<?= Url::to('/car-brand'); ?>"><span class="submenu-label">ยี่ห้อรถ</span></a></li>
                        <li><a href="<?= Url::to('/place'); ?>"><span class="submenu-label">จุดรับ</span></a></li>
                    </ul>
                </li>
                <li class="openable">
                    <a href="#">
								<span class="menu-icon">
									<i class="fa fa-tag fa-lg"></i>
								</span>
								<span class="text">
									Component
								</span>
                        <span class="badge badge-success bounceIn animation-delay5">9</span>
                        <span class="menu-hover"></span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui_element.html"><span class="submenu-label">UI Features</span></a></li>
                        <li><a href="button.html"><span class="submenu-label">Button & Icons</span></a></li>
                        <li><a href="tab.html"><span class="submenu-label">Tab</span></a></li>
                        <li><a href="nestable_list.html"><span class="submenu-label">Nestable List</span></a></li>
                        <li><a href="calendar.html"><span class="submenu-label">Calendar</span></a></li>
                        <li><a href="table.html"><span class="submenu-label">Table</span></a></li>
                        <li><a href="widget.html"><span class="submenu-label">Widget</span></a></li>
                        <li><a href="form_element.html"><span class="submenu-label">Form Element</span></a></li>
                        <li><a href="form_wizard.html"><span class="submenu-label">Form Wizard</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="timeline.html">
								<span class="menu-icon">
									<i class="fa fa-clock-o fa-lg"></i>
								</span>
								<span class="text">
									Timeline
								</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
                <li>
                    <a href="gallery.html">
								<span class="menu-icon">
									<i class="fa fa-picture-o fa-lg"></i>
								</span>
								<span class="text">
									Gallery
								</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
                <li>
                    <a href="inbox.html">
								<span class="menu-icon">
									<i class="fa fa-envelope fa-lg"></i>
								</span>
								<span class="text">
									Inbox
								</span>
                        <span class="badge badge-danger bounceIn animation-delay6">4</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
                <li>
                    <a href="email_selection.html">
								<span class="menu-icon">
									<i class="fa fa-tasks fa-lg"></i>
								</span>
								<span class="text">
									Email Template
								</span>
                        <small class="badge badge-warning bounceIn animation-delay7">New</small>
                        <span class="menu-hover"></span>
                    </a>
                </li>
            </ul>

            <div class="alert alert-info">
                ยินดีต้อนรับสู่ระบบบริหารจัดการสารสนเทศ หน่วยยานพาหนะ มหาวิทยาลัยราชภัฏสกลนคร
            </div>
        </div>
        <!-- /main-menu -->
    </div>
    <!-- /sidebar-inner -->
</aside>