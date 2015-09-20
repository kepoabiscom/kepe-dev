<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>KepoAbis.com - Video Competition</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Video Competition, Competition, Indosat, Ulang Tahun, SMA/MA Jakarta Selatan, Kepo Abis"> 
        <meta name="description" content="Video Competition KepoAbis.com bersama Indosat, dalam rangka Ulang Tahun Indosat, Antar SMA/MA Se-Jakarta Selatan">
        <meta name="author" content="Administrator">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_comp.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url('favicon.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="logo span4">
                    <h1><a href="<?php echo base_url(); ?>">KepoAbis<span>.</span>com</a></h1>
                </div>
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="coming-soon">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h2> Video Competition is Coming Soon</h2>
                            <p>We will arrive to you, don't miss it!</p>
                            <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"></span> <br>Days
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>Hours
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>Minutes
                                </div>
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>Seconds
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="span12 subscribe">
                    <h2>KepoAbis.com</h2>
                    <h1><em>Always make you curious!</em></p></h1>
                    <!--<div class="success-message"></div>
                    <div class="error-message"></div>-->
                </div>
            </div>

            <div class="row">
                <div class="span12 social">
                    <h5>FOLLOW ME ON</h5>
                    <a target='_blank' class="facebook" href="{facebook}" rel="tooltip" data-placement="top" data-original-title="Facebook">
                        <img class="img-responsive" src="<?php echo base_url('assets/img/competition/img/social-icons/facebook.png'); ?>">
                    </a>
                    <a target='_blank' class="twitter" href="{twitter}" rel="tooltip" data-placement="top" data-original-title="Twitter">
                        <img class="img-responsive" src="<?php echo base_url('assets/img/competition/img/social-icons/twitter.png'); ?>">
                    </a>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script>
            <?php if(ENVIRONMENT == 'production') { ?>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-48862041-1', 'auto');
            ga('send', 'pageview');
            <?php } ?>
        </script>
    </body>

</html>

