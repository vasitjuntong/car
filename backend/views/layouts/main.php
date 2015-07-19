<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="overflow-hidden">
<?php $this->beginBody() ?>

<!-- Overlay Div -->
<div id="overlay" class="transparent"></div>

<?= $this->render('partial/theme_setting'); ?>

<div id="wrapper" class="preload">
    <!-- /top-nav-->
    <?= $this->render('partial/top_nav'); ?>

    <?= $this->render('partial/side_bar'); ?>

    <div id="main-container">

        <?= $this->render('partial/breadcrumb'); ?>

        <?php //echo $this->render('partial/main_head'); ?>

        <?php //echo $this->render('partial/short_icon'); ?>

        <div class="padding-md">
            <?= $content; ?>
        </div>
        <!-- /.padding-md -->
    </div>
    <!-- /main-container -->
    <!-- Footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-sm-6">
					<span class="footer-brand">
						<strong class="text-danger">Endless</strong> Admin
					</span>

                <p class="no-margin">
                    &copy; 2013 <strong>Endless Admin</strong>. ALL Rights Reserved.
                </p>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row-->
    </footer>


    <!--Modal-->
    <div class="modal fade" id="newFolder">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Create new folder</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="folderName">Folder Name</label>
                            <input type="text" class="form-control input-sm" id="folderName"
                                   placeholder="Folder name here...">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
                    <a href="#" class="btn btn-danger btn-sm">Save changes</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /wrapper -->

<a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

<!-- Logout confirmation -->
<div class="custom-popup width-100" id="logoutConfirm">
    <div class="padding-md">
        <h4 class="m-top-none"> คุณต้องการที่จะออกจากระบบ?</h4>
    </div>

    <div class="text-center">

        <?= HTML::a('ลงชื่อออก', '/index.php/site/logout', [
            'class'  => 'btn btn-success m-right-sm',
            'data-method' => 'post',
        ]); ?>
        <a class="btn btn-danger logoutConfirm_close">ยกเลิก</a>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
