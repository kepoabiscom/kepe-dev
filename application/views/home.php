<!doctype html>
<html class="no-js" lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SITE TITLE -->
    <title>KepoAbiscom - Always Make You Curious</title>

    <!-- =========================
       Meta Information
    ============================== -->
    <meta name="description" content="KepoAbiscom - Always Make You Curious">
    <meta name="keywords" content="KepoAbiscom, Kepo, Abis">
    <meta name="author" content="Haamill Productions">

    <!-- =========================
       favicon and app touch icon
    ============================== -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"/>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png">


    <!-- =========================
       Bootstrap and animation
    ============================== -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">

    <!-- =========================
       Fonts, typography and icons
    ============================== -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">

    <!-- =========================
       Carousel, lightbox and circle generator
    ============================== -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nivo-lightbox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nivo-lightbox-default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.circliful.css">

    <!-- ***** Custom Stylesheet ***** -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">

    <!-- ***** Responsive fixes ***** -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">

    <!-- Header scripts -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/queryloader2.min.js"></script>

    <!-- =========================
       Preloader
    ============================== -->
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            "use strict";
            new QueryLoader2(document.querySelector("body"), {
                barColor: "#e74c3c",
                backgroundColor: "#111",
                percentage: true,
                barHeight: 1,
                minimumTime: 200,
                fadeOutTime: 1000
            });
        });
    </script>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- =========================
       Fullscreen menu
    ============================== -->
    <div class="mobilenav">
        <ul>
            <li data-rel="#header">
                <span class="nav-label">Home</span>
            </li>
            <li data-rel="#about-us">
                <span class="nav-label">About Us</span>
            </li>
            <li data-rel="#our-team">
                <span class="nav-label">Our Team</span>
            </li>
            <li data-rel="#testimonial">
                <span class="nav-label">Testimonial</span>
            </li>
            <li data-rel="#portfolio">
                <span class="nav-label">Portfolio</span>
            </li>
            <li data-rel="#map">
                <span class="nav-label">Contact Us</span>
            </li>
        </ul>
    </div>  <!-- *** end Full Screen Menu *** -->

    <!-- *****  hamburger icon ***** -->
    <a href="javascript:void(0)" class="menu-trigger">
       <div class="hamburger">
         <div class="menui top-menu"></div>
         <div class="menui mid-menu"></div>
         <div class="menui bottom-menu"></div>
       </div>
    </a>


    <!-- =========================
       Header
    ============================== -->
    <header id="header">
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">

                <!-- *****  Logo ***** -->
                <div class="logo-container">
                    <a href="#">
                        <img src="<?php echo base_url(); ?>assets/img/logo-header.png" height="197" width="197" alt="">
                    </a>
                </div>

                <?php $i=0; foreach($slider->result_array() as $data) { ?>
                <?php $path = $data['path']; ?>
                <?php if($i == 0) { ?><div class="item active"><?php } else {?><div class="item"><?php } ?>

                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('<?php echo base_url() . $path; ?>');">
                    </div>
                    <div class="carousel-caption">
                        <h1 class="light mab-none">This is <strong class="bold-text">KepoAbiscom</strong></h1>
                        <h1 class="light margin-bottom-medium mat-none">And We Are <strong class="bold-text">Awesome</strong></h1>
                        <p class="light margin-bottom-medium">- Always make you curious -</p>
                        <div class="call-button">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-12">
                                    <a href="#portfolio" class="button pull-right internal-link bold-text light hvr-grow" data-rel="#portfolio">Our Work</a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <a href="#about-us" class="button pull-left internal-link bold-text main-bg hvr-grow" data-rel="#about-us">About Us</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
                <?php $i++; } ?>
            </div> <!-- *** end wrapper *** -->

            <!-- Carousel Controls -->
            <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
                <span class="icon-prev icon-arrow-left"></span>
            </a>
            <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
                <span class="icon-next icon-arrow-right"></span>
            </a>
        </div>
    </header> <!-- *** end Header *** -->


    <!-- =========================
       Call to action
    ============================== -->
    <section id="call-to-action" class="call-to-action main-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 wow slideInLeft animated">
                    <p class="light-text">Like What You See? We're Just Getting Started</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 button-container wow slideInRight animated">
                    <a href="#portfolio" class="button light internal-link pull-left hvr-grow" data-rel="#portfolio">View Portfolio</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section> <!-- *** end call-to-action *** -->


    <!-- =========================
       About Us
    ============================== -->
    <section id="about-us" class="about-us">
        <div class="overlay">
            <div class="container padding-top-large">
                <h2>
                    <strong class="bold-text">ABOUT</strong>
                    <span class="light-text main-color">US</span>
                </h2>
                <div class="line main-bg"></div>
                <div class="row margin-bottom-medium">
                    <div class="col-md-7">
                        <div class="jumbo-text light-text margin-top-medium wow slideInLeft" data-wow-duration="2s">
                            KepoAbiscom, A Full <strong class="bold-text">Service Digital Agency</strong>
                            That Help Our Clients Expand Their Digital Reach
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="<?php echo base_url(); ?>assets/img/about-side-side.png" alt="About Us Big Image" class="center-block img-responsive">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <p align="justify" class="margin-bottom-medium wow slideInUp">
Kepoabis.com is a videography community based in Jakarta, Indonesia. The embryo of this community was created back in October 2013 by 4 co-founders, Haris Millah Muhammad, Ahmad Khairi, Syahrul Ramadhan, and Herman Wahyudi.
Our Focus is to create a creative videos which can inspiring people to aplicated to their live what we showed. We also act as a media partner for any client who needs a creative documentation. We commit to give a full service that help our clients expand their digital reach. 
</p>
                <div class="row margin-top-large">
                    <div class="col-md-8">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <!-- =========================
                               Collapsible Panel 1
                            ============================== -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="panel-title">
                                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="state"><strong>-</strong></span>
                                            <strong>Mission</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
										<ul type="1">
											<li>To shows an emerging social reality that we pack as a video..</li>
											<li>To give various entertaining and unique info.</li>
											<li>Insert a humour value in our video without eliminating the substance of video’s topic.</li>
										</ul>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 2
                            ============================== -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="state"><strong>+</strong></span>
                                            <strong>Target</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul type="1">
											<li>Kalangan anak muda keatas.</li>
											<li>Para pencinta dunia seni perfilman melalui media teknologi informasi.</li>
											<li>Calon klien yang ingin dipromosikan.</li>
										</ul>
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->
                        </div> <!-- *** end panel-group *** -->
                    </div> <!-- *** end col-md-8 *** -->
                    <div class="col-md-4">
                        <img src="<?php echo base_url(); ?>assets/img/case-studdy-people.png" class="center-block img-responsive" alt="Case Study">
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end About Us *** -->


    <!-- =========================
       Case Study
    ============================== -->
    <section id="case-study" class="case-study">
        <div class="row mar-none mat-none">

            <!-- *****  Case Study Left ***** -->
            <div class="col-md-6 case-study-left wow slideInLeft">
                <div class="overlay padding-large text-right">
                    <div class="description">
                        <h3 class="margin-bottom-small light-text">We are revoulutionizing marketing.</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                </div>
            </div>

            <!-- *****  Case Study Right ***** -->
            <div class="col-md-6 case-study-right wow slideInRight">
                <div class="overlay padding-large">
                    <div class="description">
                        <h3 class="margin-bottom-small light-text">We are revoulutionizing marketing.</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Case Study *** -->

    <!-- =========================
       Our Team
    ============================== -->
    <section id="our-team" class="our-team">
        <div class="container padding-top-large">
            <h2 class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay=".5s">
                Our
                <strong class="bold-text">Awesome</strong>
                <span class="light-text main-color">Team</span>
            </h2>
            <div class="line main-bg margin-bottom-medium"></div>

            <p class="margin-bottom-medium wow fadeInUp" data-wow-duration="1.5s" data-wow-delay=".5s">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            </p>
            <div class="row">
                <!-- ***** Team member 1 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="<?php echo base_url(); ?>assets/img/team/team-member-1.jpg" class="img-responsive" alt="Jack Smith">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Haris Millah Muhammad</strong></h3>
                                <p>CEO-Founder & UI Designer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-1">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-1 *** -->
                    <!-- Team Member-1 Modal -->
                    <div class="modal fade contact-form" id="team-member-1" tabindex="-1" role="dialog" aria-labelledby="team-member-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="<?php echo base_url(); ?>assets/img/team/big/team-member-1.jpg" alt="Jack Smith">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Haris Millah Muhammad</strong></h3>
                                                <div class="light-text">CEO-Founder & UI Designer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-1" class="member-skill" data-dimension="100" data-text="PHP" data-width="10" data-fontsize="16" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-2" class="member-skill" data-dimension="100" data-text="Python" data-width="10" data-fontsize="16" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-3" class="member-skill" data-dimension="100" data-text="Laravel" data-width="10" data-fontsize="16" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-4" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="16" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 1 section *** -->
                <!-- ***** Team member 2 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-2 ***** -->
                    <div class="team-member center-block wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="<?php echo base_url(); ?>assets/img/team/team-member-2.jpg" class="img-responsive" alt="John Doe">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Ahmad Khairi Nawawi Lubis</strong></h3>
                                <p>Co-Founder & Promoter</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-2">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-1 *** -->
                    <!-- Team Member-2 Modal -->
                    <div class="modal fade contact-form" id="team-member-2" tabindex="-1" role="dialog" aria-labelledby="team-member-2" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="<?php echo base_url(); ?>assets/img/team/big/team-member-2.jpg" alt="John Doe">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Ahmad Khairi Nawawi Lubis</strong></h3>
                                                <div class="light-text">Co-Founder & Promoter</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-5" class="member-skill" data-dimension="100" data-text="Django" data-width="10" data-fontsize="16" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-6" class="member-skill" data-dimension="100" data-text="Laravel" data-width="10" data-fontsize="16" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-7" class="member-skill" data-dimension="100" data-text="NodeJS" data-width="10" data-fontsize="16" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-8" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="16" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 2 section *** -->
                <!-- ***** Team member 3 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="<?php echo base_url(); ?>assets/img/team/team-member-3.jpg" class="img-responsive" alt="Jack Sparrow">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Syahrul Ramadhan</strong></h3>
                                <p>Co-Founder & Front-end Developer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-3">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-3 *** -->
                    <!-- Team Member-3 Modal -->
                    <div class="modal fade contact-form" id="team-member-3" tabindex="-1" role="dialog" aria-labelledby="team-member-3" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="<?php echo base_url(); ?>assets/img/team/big/team-member-3.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Syahrul Ramadhan</strong></h3>
                                                <div class="light-text">Co-Founder & Front-end Developer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-9" class="member-skill" data-dimension="100" data-text="HTML" data-width="10" data-fontsize="13" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-10" class="member-skill" data-dimension="100" data-text="CSS" data-width="10" data-fontsize="13" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-11" class="member-skill" data-dimension="100" data-text="jQuery" data-width="10" data-fontsize="13" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-12" class="member-skill" data-dimension="100" data-text="AngularJS" data-width="10" data-fontsize="13" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 3 section *** -->
                <!-- ***** Team member 4 section ***** -->
                <div class="col-md-3 col-sm-6 col-xs-12 margin-bottom-large">
                    <!-- ***** Team member-1 ***** -->
                    <div class="team-member center-block wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s">
                        <img src="<?php echo base_url(); ?>assets/img/team/team-member-4.jpg" class="img-responsive" alt="George Wyne">
                        <div class="team-overlay text-center">
                            <div class="info">
                                <h3><strong>Herman Wahyudi</strong></h3>
                                <p>Co-Founder & Back-end Developer</p>
                            </div>
                            <div class="learn-more" data-toggle="modal" data-target="#team-member-4">
                                <strong>Learn More</strong>
                            </div>
                        </div>
                    </div> <!-- *** end Team member-4 *** -->
                    <!-- Team Member-4 Modal -->
                    <div class="modal fade contact-form" id="team-member-4" tabindex="-1" role="dialog" aria-labelledby="team-member-4" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="modal-body member-info">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <figure>
                                                <img src="<?php echo base_url(); ?>assets/img/team/big/team-member-4.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="description">
                                                <h3><strong class="bold-text">Herman Wahyudi</strong></h3>
                                                <div class="light-text">Co-Founder & Back-end Developer</div>
                                                <div class="about margin-top-medium">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    consequat.</p>
                                                    <p>
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="member-skills">
                                                    <div id="skill-13" class="member-skill" data-dimension="100" data-text="AI" data-width="10" data-fontsize="24" data-percent="35" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-14" class="member-skill" data-dimension="100" data-text="PS" data-width="10" data-fontsize="24" data-percent="70" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-15" class="member-skill" data-dimension="100" data-text="AF" data-width="10" data-fontsize="24" data-percent="80" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                    <div id="skill-16" class="member-skill" data-dimension="100" data-text="WP" data-width="10" data-fontsize="24" data-percent="60" data-fgcolor="#e74c3c" data-bgcolor="#eee"></div>
                                                </div>
                                            </div> <!-- *** end description *** -->
                                        </div> <!-- *** end col-md-7 *** -->
                                    </div> <!-- *** end row *** -->
                                </div> <!-- *** end modal-body *** -->
                            </div> <!-- *** end modal-content *** -->
                        </div> <!-- *** end modal-dialog *** -->
                    </div> <!-- *** end Contact Form modal *** -->
                </div> <!-- *** end Team member 4 section *** -->
            </div>
        </div>
    </section> <!-- *** end Our Team *** -->


    <!-- =========================
       Testimonial
    ============================== -->
    <section id="testimonial" class="testimonial padding-large white-color text-center">
        <div class="container">
            <div class="row">
                <h2 class="margin-bottom-medium">What Our <strong class="bold-text">Customer</strong> Said</h2>
                <div class="col-md-10 col-md-offset-1">

                    <!-- *****  Carousel start ***** -->
                    <div id="testimonial-carousel" class="owl-carousel owl-theme testimonial-carousel">

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item margin-bottom-small"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium clearfix">
                                <img src="<?php echo base_url(); ?>assets/img/testimonial/testimonial-1.jpg" height="50" width="50" alt="Client Image">
                                <ul class="client-info main-color">
                                    <li><strong>John Doe</strong></li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="<?php echo base_url(); ?>assets/img/testimonial/testimonial-2.jpg" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="<?php echo base_url(); ?>assets/img/testimonial/testimonial-1.jpg" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="<?php echo base_url(); ?>assets/img/testimonial/testimonial-2.jpg" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->

                        <!-- =========================
                           Single Testimonial item
                        ============================== -->
                        <div class="item"> <!-- ITEM START -->
                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit..</p>
                            <div class="client margin-top-medium">
                                <img src="<?php echo base_url(); ?>assets/img/testimonial/testimonial-1.jpg" alt="Client Image" class="grayscale">
                                <ul class="client-info main-color">
                                    <li>John Doe</li>
                                    <li>Co-Founder, Envato</li>
                                </ul>
                            </div>
                        </div> <!-- ITEM END -->
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Testimonial *** -->


    <!-- =========================
       Promote
    ============================== -->
    <section id="promote" class="promote main-bg white-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1 col-md-5 col-sm-4 text-center">
                    <p class="light-text">Hire us! We make you smile :)</p>
                </div>
                <div class="col-lg-6 col-lg-offset-1 col-md-7 col-sm-8 button-container">
                    <a href="#" class="button deep hvr-grow">Request a Quote</a>
                    <span class="margin-right-small margin-left-small">or</span>
                    <a href="#" class="button light hvr-grow">Hire Us</a>
                </div>
            </div>
        </div>
    </section> <!-- *** end promote *** -->


    <!-- =========================
       Portfolio
    ============================== -->
    <section id="portfolio" class="portfolio padding-large text-center">
        <div class="container margin-bottom-medium">
            <div class="row margin-bottom-medium wow fadeInUp">
                <h2>
                    Our
                    <strong class="main-color bold-text">Portfolios</strong>
                </h2>
                <div class="line main-bg"></div>

                <div class="col-md-10 col-md-offset-1">
                    <div class="subtitle">Check out some of our latest and greatest projects.</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, illum, soluta. Minima vitae laudantium, sint officiis repellendus. Minima vitae laudantium, sint officiis repellendus</p>
                </div>
            </div> <!-- *** end row *** -->

            <!-- *****  Portfolio Filters ***** -->
            <div class="filters">
                <ul class="wow lightSpeedIn">
                    <li><a href="#" data-filter="*" class="active"><i class="icon-grid"></i></a></li>
                    <li><a href="#" data-filter=".print">Print Media</a></li>
                    <li><a href="#" data-filter=".icon">Icon Design</a></li>
                    <li><a href="#" data-filter=".photography">Photography</a></li>
                    <li><a href="#" data-filter=".web-design">Web Design</a></li>
                    <li><a href="#" data-filter=".ui">UI</a></li>
                </ul>
            </div> <!-- *** end filters *** -->
        </div> <!-- *** end container *** -->

        <!-- *****  Portfolio  wrapper ***** -->
        <div class="portfolio-wrapper margin-bottom-medium">

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item print">
                <div class="portfolio">
                    <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-1.jpg" data-lightbox-gallery="portfolio">
                        <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-1.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                        <div class="portfolio-overlay hvr-rectangle-out">
                            <h2 class="margin-bottom-small">
                                Our
                                <strong class="white-color bold-text">Portfolios</strong>
                            </h2>
                            <div class="button">View Project</div>
                        </div><!-- END PORTFOLIO OVERLAY -->
                    </a>
               </div>
            </div> <!-- *** end portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-2.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-2.jpg" alt="Portfolio 2"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                             <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-3.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-3.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item print">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-4.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-4.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item ui">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-5.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-5.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item web-design">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-6.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-6.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item web-design">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-7.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-7.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->

            <!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item icon">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-8.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-8.jpg" alt="Portfolio 1"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->
			
			<!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-9.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-9.jpg" alt="Portfolio 9"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
							<strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->
			
			<!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-10.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-10.jpg" alt="Portfolio 10"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                             <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->
			
			<!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-11.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-11.jpg" alt="Portfolio 11"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                             <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->
			
			<!-- =========================
               Portfolio item
            ============================== -->
            <div class="portfolio-item photography">
               <div class="portfolio">
                  <a href="<?php echo base_url(); ?>assets/img/portfolio/portfolio-12.jpg" data-lightbox-gallery="portfolio">
                    <img src="<?php echo base_url(); ?>assets/img/portfolio/portfolio-12.jpg" alt="Portfolio 12"/><!-- END PORTFOLIO IMAGE -->
                    <div class="portfolio-overlay hvr-rectangle-out">
                        <h2 class="margin-bottom-small">
                            Our
                            <strong class="white-color bold-text">Portfolios</strong>
                        </h2>
                        <div class="button">View Project</div>
                    </div><!-- END PORTFOLIO OVERLAY -->
                  </a>
               </div>
            </div> <!-- *** end  portfolio-item *** -->
			
        </div> <!-- *** end  portfolio-wrapper *** -->
        <a href="#" class="button light margin-top-medium margin-bottom-medium hvr-grow"><i class="icon-reload"></i> Load More</a>
    </section> <!-- *** end Portfolio *** -->


    <!-- =========================
       We are  hiring
    ============================== -->
    <section id="we-are-hiring" class="we-are-hiring">
        <div class="container padding-large">
            <div class="row">
                <div class="col-md-7 col-sm-6 wow fadeInLeft">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>We Are <span class="main-color bold-text">Hiring Creative</span> Peoples</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <p class="margin-top-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </section> <!-- *** end We Are Hiring *** -->


    <!-- =========================
       Twitter
    ============================== -->
    <section id="twitter" class="twitter">
        <div class="overlay">
            <div class="container padding-large text-center">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="icon hvr-grow">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <!--<div class="tweet-text" id="tweets"></div>-->
                        <div>
							<a class="twitter-timeline"  href="https://twitter.com/KepoAbisCom"  data-widget-id="459590213916848128">Tweets by @KepoAbisCom</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- *** end Twitter *** -->
  

    <!-- =========================
       Map
    ============================== -->
    <section id="map" class="map">
        <div id="map-container">

        </div>
    </section> <!-- *** end Map Container *** -->

    <!-- =========================
       Send Message
    ============================== -->
    <section id="send-message" class="send-message main-bg white-color text-center">
        <div class="send-icon" data-toggle="modal" data-target="#contact-form">
            <i class="fa fa-paper-plane"></i>
        </div>
        <p class="light-text">Have any <span class="bold-text">project</span>? Send a <span class="bold-text">message</span ></p>

        <!-- Contact Form Modal -->
        <div class="modal fade contact-form" id="contact-form" tabindex="-1" role="dialog" aria-labelledby="contact-form" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="modal-body">

                        <!-- *****  Contact form ***** -->
                        <form class="form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="first-name" placeholder="First name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="last-name" placeholder="Last name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email address">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="project-name" placeholder="Project name">
                                </div>
                                <div class="form-group col-md-12 mab-none">
                                    <textarea rows="6" class="form-control" id="description" placeholder="Your project details and description ..."></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="button bold-text main-bg"><i class="fa fa-paper-plane"></i></div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- *** end modal-body *** -->
                </div> <!-- *** end modal-content *** -->
            </div> <!-- *** end modal-dialog *** -->
        </div> <!-- *** end Contact Form modal *** -->
    </section> <!-- *** end Send Message *** -->


    <!-- =========================
       Footer
    ============================== -->
    <footer id="footer" class="footer">
        <div class="container padding-large text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <figure class="margin-bottom-medium">
                        <img src="<?php echo base_url(); ?>assets/img/logo.png" class="footer-logo center-block img-responsive" alt="Krefolio">
                    </figure>
                    <p class="margin-bottom-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

                    <!-- =========================
                       Social icons
                    ============================== -->
                    <ul class="social margin-bottom-medium">
                        <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="g-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                    <p class="copyright">
                        &copy; Copyright 2015 Haamill Productions - All Rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer> <!-- *** end Footer *** -->

    <!-- =========================
       Back to top button
    ============================== -->
    <div class="back-to-top" data-rel="header">
        <i class="icon-up"></i>
    </div>

    <!-- =========================
     JavaScripts
    ============================== -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.11.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&amp;sensor=false"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/twitterFetcher_min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/appear.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.circliful.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nivo-lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
</body>
</html>
