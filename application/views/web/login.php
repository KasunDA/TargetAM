<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Simplpan</title>

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
        <div class="login" dir="rtl">

            <?php if(!empty($error)): ?>
            <div class="notice error">
                <p>اسم مستخدم او كلمة مرور غير صحيحة</p>
            </div>         
            <?php else:?>
            <!-- Info Notice: Start -->
            <div class="notice info">
                <p>برجاء ادخال اسم مستخدم و كلمة مرور صحيحة ثم الضغط على رمز القفل للمرور</p>
            </div>
            <!-- Info Notice: End -->
            <?php endif; ?>

            <!-- Header: Start -->
            <div id="header">

                <!-- Logo: Start -->
                <a href="#" id="logo">Simplpan - Admin Panel</a>
                <!-- Logo: End -->

                <!-- Login: Start -->
                <form action="<?php echo site_url('web/login_done'); ?>" method="post" id="login">
                    <!-- Username Input: Start -->
                    <label for="username" class="label_username">User</label>
                    <input type="text" name="username" placeholder="اسم مستخدم" value="" id="username" class="password tip-stay validate" title="ادخل اسم المستخدم" />
                    <!-- Username Input: End -->

                    <!-- Password Input: Start -->
                    <label for="password" class="label_password">Password</label>
                    <input type="password" name="password" placeholder="كلمة المرور" value="" id="password" class="password tip-stay validate" title="ادخل كلمة المرور" />
                    <!-- Password Input: End -->

                    <!-- Login Button: Start -->
                    <input type="submit" value="login" class="tip" title="تسجيل الدخول" />
                    <!-- Login Button: End -->

                </form>
                <!-- Login: End -->

            </div>
            <!-- Header: End -->

        </div>
        <!-- Header Grid Container: End -->

    </div>
    <!-- End: Page Wrap -->

    <!-- jQuery libs - Rest are found in the head section (at top) -->
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.visualize-tooltip.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery-animate-css-rotate-scale.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery-ui-1.8.13.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.poshytip.min.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.facebox.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/jquery.wysiwyg.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/syntaxHighlighter/shCore.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/syntaxHighlighter/shBrushXml.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/syntaxHighlighter/shBrushJScript.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/syntaxHighlighter/shBrushCss.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/syntaxHighlighter/shBrushPhp.js"></script>

    <!-- jQuery Customization -->
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/custom.js"></script>
    <script type="text/javascript" src="<?php echo INC_WEB;?>js/mine.js"></script>
</body>

</html>
