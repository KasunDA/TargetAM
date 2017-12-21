<?php
if(!$logged)
    exit();
?>

<!DOCTYPE HTML>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplpan - Admin Panel</title>

    <!-- Imports General CSS and jQuery CSS -->
    <link href="<?php echo INC_WEB;?>css/screen.css" rel="stylesheet" media="screen" type="text/css" />

    <!-- CSS for Fluid and Fixed Widths - Double to prevent flickering on change -->
    <link href="<?php echo INC_WEB;?>css/fixed.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="<?php echo INC_WEB;?>css/fixed.css" rel="stylesheet" media="screen" type="text/css" class="width" />

    <!-- CSS for Theme Styles - Double to prevent flickering on change -->
    <link href="<?php echo INC_WEB;?>css/theme/blue.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="<?php echo INC_WEB;?>css/theme/blue.css" rel="stylesheet" media="screen" type="text/css" class="theme" />

    <!-- jQuery thats loaded before document ready to prevent flickering - Rest are found at the bottom -->
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.styleswitcher.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.visualize.js"></script>

</head>

<body>

    <!-- Start: Page Wrap -->
    <div id="wrap" class="container_24">


        <!-- Header Grid Container: Start -->
        <div class="grid_24">

            <!-- Header: Start -->
            <div id="header" >

                <!-- Logo: Start -->
                <a href="<?php echo site_url('web/logoff');?>" id="logo">Simplpan</a>
                <!-- Logo: End -->

                <!-- Navigation: Start -->
                <ul id="navigation" class="dropdown">
				<li><a class="preview <?php if($active == 'tracking') echo 'active';?>" href="<?php echo site_url('web/tracking'); ?>">التتبع</a></li>
                    <li><a class="users <?php if($active == 'drivers') echo 'active';?>" href="<?php echo site_url('web/drivers'); ?>">السائقين</a></li>
                    <li><a class="graph <?php if($active == 'cars') echo 'active';?>" href="<?php echo site_url('web/cars'); ?>">العربات</a></li>
                    <li><a class="contact <?php if($active == 'mobiles') echo 'active';?>" href="<?php echo site_url('web/mobiles'); ?>">الهواتف</a></li>
                    <li><a class="computer <?php if($active == 'map') echo 'active';?>" href="<?php echo site_url('web/map'); ?>">الخريطة</a></li>
                    <!-- Navigation Menu Item: End -->
                </ul>
                <!-- Navigation: End -->

            </div>
            <!-- Header: End -->

        </div>
        <!-- Header Grid Container: End -->

