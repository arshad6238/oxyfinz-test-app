<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html
        lang="<?php echo Yii::app()->language; ?>"
        dir="<?php echo Yii::app()->language === 'ar' ? 'rtl' : 'ltr'; ?>"
>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="<?php echo Yii::app()->language; ?>">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- RTL support -->
    <style>
        body[dir="rtl"] {
            direction: rtl;
            text-align: right;
        }
        .lang-switch {
            float: right;
            margin: 10px;
        }
    </style>
</head>

<body>

<div class="container" id="page">

    <!-- 🌍 LANGUAGE SWITCH -->
    <div class="lang-switch">
        <a href="?lang=en">English</a> |
        <a href="?lang=ar">العربية</a>
    </div>

    <div id="header">
        <div id="logo">
            <?php echo CHtml::encode(Yii::app()->name); ?>
        </div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php
        $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                        array(
                                'label' => Yii::t('app', 'Home'),
                                'url' => array('/site/index')
                        ),
                        array(
                                'label' => Yii::t('app', 'About'),
                                'url' => array('/site/page', 'view' => 'about')
                        ),
                        array(
                                'label' => Yii::t('app', 'Contact'),
                                'url' => array('/site/contact')
                        ),
                        array(
                                'label' => Yii::t('app', 'Login'),
                                'url' => array('/site/login'),
                                'visible' => Yii::app()->user->isGuest
                        ),
                        array(
                                'label' => Yii::t('app', 'Logout') . ' (' . Yii::app()->user->name . ')',
                                'url' => array('/site/logout'),
                                'visible' => !Yii::app()->user->isGuest
                        ),
                ),
        ));
        ?>
    </div><!-- mainmenu -->

    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
        ));
        ?>
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        <?php echo Yii::t('app', 'Copyright'); ?>
        &copy; <?php echo date('Y'); ?>
        <?php echo Yii::t('app', 'by My Company'); ?>.<br/>
        <?php echo Yii::t('app', 'All Rights Reserved'); ?>.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>