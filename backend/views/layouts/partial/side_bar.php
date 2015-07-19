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
                <li>
                    <a href="<?=Url::to('/index.php/news'); ?>">
								<span class="menu-icon">
									<i class="fa fa-desktop fa-lg"></i>
								</span>
								<span class="text">
									จัดการข่าว
								</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to('/index.php/repair'); ?>">
								<span class="menu-icon">
									<i class="fa fa-wrench fa-lg"></i>
								</span>
								<span class="text">
									จัดการส่งซ่อม
								</span>
                        <span class="menu-hover"></span>
                    </a>
                </li>
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
                    <ul class="submenu" <?= (isset($this->context->activeMenu) and
                        $this->context->activeMenu == 'data_center') ? 'style="display: block"' : ''; ?>
                        >
                        <li><a href="<?= Url::to('/index.php/car-brand'); ?>"><span class="submenu-label">ยี่ห้อรถ</span></a></li>
                        <li><a href="<?= Url::to('/index.php/place'); ?>"><span class="submenu-label">จุดรับ</span></a></li>
                    </ul>
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