<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="ru" class="no-js"> <!--<![endif]-->
    <head>
        <base href="<?php echo URL::base(TRUE) ?>">
        <meta charset="utf-8" >
        <title><?php echo $g_title; ?>Установка</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" >
        <meta content="" name="description" >
        <meta content="" name="author" >
        <meta name="MobileOptimized" content="320">
        <link href="<?php echo $assets['font-awesome_css']; ?>font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $assets['bootstrap_css']; ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $assets['uniform_css']; ?>uniform.default.css" rel="stylesheet">
        <link href="<?php echo $assets['select2']; ?>select2_metro.css" rel="stylesheet" >
        <link href="<?php echo $assets['css']; ?>style-metronic.css" rel="stylesheet">
        <link href="<?php echo $assets['css']; ?>style.css" rel="stylesheet">
        <link href="<?php echo $assets['css']; ?>style-responsive.css" rel="stylesheet">
        <link href="<?php echo $assets['css']; ?>plugins.css" rel="stylesheet">
        <link href="<?php echo $assets['themes_css']; ?>default.css" rel="stylesheet" id="style_color">
        <link href="<?php echo $assets['css']; ?>custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" >
    </head>
    <body class="page-header-fixed">
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <div class="header-inner">
                <a class="navbar-brand" href="<?php echo URL::base(); ?>">
                    <img src="<?php echo $assets['img']; ?>logo.png" alt="logo" class="img-responsive" >
                </a>
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <img src="<?php echo $assets['img']; ?>menu-toggler.png" alt="" >
                </a> 
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="page-container">
            <?php echo $menu; ?>
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title">
                            Установка системы <small>первичная установка системы</small>
                        </h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <i class="fa fa-cogs"></i>
                                <a href="<?php echo URL::base(); ?>">Установка</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php echo $content; ?>
            </div>
        </div>
        <div class = "footer">
            <div class = "footer-inner">
                2014 &copy;
                Alexey Yakovlev.
            </div>
            <div class = "footer-tools">
                <span class = "go-top">
                    <i class = "fa fa-angle-up"></i>
                </span>
            </div>
        </div>
        <!--[if lt IE 9]>
        <script src = "<?php echo $assets['plugins']; ?>respond.min.js"></script>
                <script src="<?php echo $assets['plugins']; ?>excanvas.min.js"></script> 
            <![endif]-->   
        <script src="<?php echo $assets['plugins']; ?>jquery-1.10.2.min.js"></script>
        <script src="<?php echo $assets['plugins']; ?>jquery-migrate-1.2.1.min.js"></script>    
        <script src="<?php echo $assets['bootstrap_js']; ?>bootstrap.min.js"></script>
        <script src="<?php echo $assets['bootstrap-hover-dropdown']; ?>twitter-bootstrap-hover-dropdown.min.js" ></script>
        <script src="<?php echo $assets['jquery-slimscroll']; ?>jquery.slimscroll.min.js"></script>
        <script src="<?php echo $assets['plugins']; ?>jquery.blockui.min.js"></script>  
        <script src="<?php echo $assets['plugins']; ?>jquery.cookie.min.js"></script>
        <script src="<?php echo $assets['uniform']; ?>jquery.uniform.min.js" ></script>
        <script src="<?php echo $assets['jquery-validation_dist']; ?>jquery.validate.min.js"></script>
        <script src="<?php echo $assets['jquery-validation_dist']; ?>additional-methods.min.js"></script>
        <script src="<?php echo $assets['bootstrap-wizard']; ?>jquery.bootstrap.wizard.min.js"></script>
        <script src="<?php echo $assets['select2']; ?>select2.min.js"></script>
        <script src="<?php echo $assets['scripts']; ?>app.js"></script>
        <script src="<?php echo $assets['scripts']; ?>form-wizard.js"></script>
        <script>
            $(document).ready(function() {       
                App.init();
                FormWizard.init();
            });
        </script>
    </body>
</html>