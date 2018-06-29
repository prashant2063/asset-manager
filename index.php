<?php
   require('func/config.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Asset Manager</title>
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/css/font-awesome.min.css" rel="stylesheet">
    <link href="front/css/prettyPhoto.css" rel="stylesheet">
    <link href="front/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="front/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="front/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index"></a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about-us">About Us</a></li>
                        <li><a href="#login"><?php if( $user->is_logged_in() ){ echo "My Account"; }else{{ echo "Login"; } } ?></a></li>
                        <li><a href="#contact">Contact</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->

    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>NIT Hamirpur Asset Manager</h1>
                        <p class="lead">Manage your asset information easily!</p>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item">
                <div class="container">
                    <div class="carousel-content">
                          <h1>Asset Manager</h1>
                        <p class="lead">Access your information easily, from anywhere!</p>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
        <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
        <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
    </section><!--/#main-slider-->

    <section id="services">
        <div class="container">
            <div class="box first">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-desktop icon-md icon-color1"></i>
                            <h4>Assets</h4>
                            <p>The asset manager acts as a whole instead of just individual assets. Use this software to keep an eye on your assets.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-thumbs-up icon-md icon-color2"></i>
                            <h4>Reports</h4>
                            <p>View predefined reports which include statements about your assets to help clean up your workload.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-4 col-sm-6">
                        <div class="center">
                            <i class="icon-windows icon-md icon-color3"></i>
                            <h4>Alerts</h4>
                            <p>Set reminders and alarms for assets that require regular maintenance, assets that are past due, contracts and licenses that are about to expire, and many others features.</p>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-12 col-sm-6">
                        <div class="center">
                            <i class="icon-user icon-md icon-color4"></i>
                            <h4>Users</h4>
                            <p>Add as many users as you need for your accounts. </p>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="about-us">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2>Meet the Team!</h2>
                    <p class="lead">Manage your assets today.</p>
                </div>
                <div class="gap"></div>
                <div id="team-scroller" class="carousel scale">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/lalit.jpg" alt="The Boss!" ></p>
                                        <h3>Lalit Yadav<small class="designation">Office User</small></h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/prashant.jpg" alt="" ></p>
                                        <h3>Prashant Gupta<small class="designation">Admin</small></h3>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="member">
                                        <p><img class="img-responsive img-thumbnail img-circle" src="front/images/prafull.jpg" alt="" ></p>
                                        <h3>Prafull Dhiman<small class="designation">Admin</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                          <div class="row">
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/prafull.jpg" alt="" ></p>
                                      <h3>Prafull Dhiman<small class="designation">Senior Admin</small></h3>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/prashant.jpg" alt="" ></p>
                                      <h3>Prashant Gupta<small class="designation">Junior Admin</small></h3>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="member">
                                      <p><img class="img-responsive img-thumbnail img-circle" src="front/images/lalit.jpg" alt="" ></p>
                                      <h3>Lalit Yadav<small class="designation">Office User</small></h3>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <a class="left-arrow" href="#team-scroller" data-slide="prev">
                        <i class="icon-angle-left icon-4x"></i>
                    </a>
                    <a class="right-arrow" href="#team-scroller" data-slide="next">
                        <i class="icon-angle-right icon-4x"></i>
                    </a>
                </div><!--/.carousel-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#about-us-->

    <section id="login">
        <div class="container">
            <div class="box">
                <div class="center">
                    <h2>Welcome to Asset Manager</h2>
                    <p class="lead">Click on the button below to get started</p>
                </div><!--/.center-->
                <div class="big-gap"></div>

                <div id="login-table" class="row">

                    <div class="col-md-12 col-sm-6">
                      <div class="col-sm-4 center">
                        <!-- <a href="#" class="btn btn-primary btn-lg btn-block">Go</a> -->
                      </div>
                      <div class="col-sm-4 center">
                        <a href="login" class="btn btn-primary btn-lg btn-block">Go</a>
                      </div>
                      <div class="col-sm-4 center">
                        <!-- <a href="#" class="btn btn-primary btn-lg btn-block">Go</a> -->
                      </div>

                    </div><!--/.col-sm-4-->
                </div>
            </div>
        </div>
    </section><!--/#login-->

    <section id="contact">
        <div class="container">
            <div class="box last">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Contact Form</h1>
                        <p>Fill out the form below and submit to us we will get back in touch with you</p>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required="required" placeholder="Email address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-lg">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--/.col-sm-6-->
                    <div class="col-sm-6">
                        <h1>Our Address</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>National Institute of Technology, Hamirpur</strong><br>
                                    P.O. Hamirpur - 177005, Himachal Pradesh<br>
                                    <br>
                                    EMAIL: nith.ac.in<br>
                                    <abbr title="Phone">TEL:</abbr>: 9817478744
                                </address>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <h1>Connect with us!</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="social">
                                    <li><a href="http://facebook.com/nith"><i class="icon-facebook icon-social"></i> Facebook</a></li>
                                    <li><a href="http://plus.google.com/nith"><i class="icon-google-plus icon-social"></i> Google Plus</a></li>
                                    <li><a href="http://twitter.com/nith"><i class="icon-twitter icon-social"></i> Twitter</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="social">
                                    <li><a href="http://linkedin.com/nith"><i class="icon-linkedin icon-social"></i> Linkedin</a></li>

                                </ul>
                            </div>
                        </div>
                    </div><!--/.col-sm-6-->
                </div><!--/.row-->
            </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#contact-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <!-- <img class="pull-right" src="front/images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap"> -->
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="front/js/jquery.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.isotope.min.js"></script>
    <script src="front/js/jquery.prettyPhoto.js"></script>
    <script src="front/js/main.js"></script>
</body>
</html>
