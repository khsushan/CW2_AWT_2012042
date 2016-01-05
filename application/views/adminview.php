<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Creative - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/creative.css" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">QUIZ TIME</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="home.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#home">Edit category</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#category">Add new category</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header id="home">
            <div class="header-content">
                <div class="header-content-inner">
                    <section class="no-padding" id="portfolio">
                        <div class="container-fluid">
                            <h2>Please select a category to edit</h2> <br><br><br>
                            <div class="row no-gutter">
                                <div class="col-lg-4 col-sm-6">
                                    <a href="#" class="portfolio-box">
                                        <img src="<?php echo base_url(); ?>assets/img/portfolio/5.jpg" class="img-responsive" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">
                                                <div class="project-category text-faded">
                                                    Category
                                                </div>
                                                <div class="project-name">
                                                    Sports
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <a href="questionView.html" class="portfolio-box">
                                        <img src="<?php echo base_url(); ?>assets/img/portfolio/1.jpg" class="img-responsive" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">
                                                <div class="project-category text-faded">
                                                    Category
                                                </div>
                                                <div class="project-name">
                                                    General Knowledge
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <a href="#" class="portfolio-box">
                                        <img src="<?php echo base_url(); ?>assets/img/portfolio/2.jpg" class="img-responsive" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">
                                                <div class="project-category text-faded">
                                                    Category
                                                </div>
                                                <div class="project-name">
                                                    Entertainment
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="category">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Add New Category</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="col-lg-6">
                            Category Name:
                        </div>
                        <div class="col-lg-6">
                            <input type="text" maxlength="100"/><br><br>
                            <a href="#" class="btn btn-default btn-xl page-scroll">Save</a>
                        </div>
                    </div>
                    <div class="col-lg-3">

                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Let's Get In Touch!</h2>
                        <hr class="primary">
                        <p>Ready to start your next quiz with me? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <i class="fa fa-phone fa-3x wow bounceIn"></i>
                        <p>+94718853336</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                        <p><a href="mailto:your-email@your-domain.com">khsushan@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.fittext.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/creative.js"></script>

    </body>

</html>
