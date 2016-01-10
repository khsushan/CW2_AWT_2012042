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
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link
        href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" type="text/css">

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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js"
        type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.validation/0.11.5/backbone-validation.js"
        type="text/javascript"></script>
<script type="text/javascript">
</script>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">QUIZ TIME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--<script type="text/template" id="navigate-template">-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div id="navigate">
                <script type="text/template" id="navigate-home-template">
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a class="btn" href="#">Home</a>
                        </li>
                        <li>
                            <a class="btn" href="#about">About</a>
                        </li>
                        <li>
                            <a class="btn" href='#/user/signup'>Sign In</a>
                        </li>
                        <li>
                            <a class="btn" href="#/user/login">Login</a>
                        </li>
                        <li>
                            <a class="btn" href="#contact">Contact Us</a>
                        </li>


                    </ul>
                </script>
            </div>
        </div>
        <!--</script>-->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="header">
    <div class="header-content">
        <div class="header-content-inner" id="main">
        </div>
    </div>

</header>


<!-home content template ->
<script type="text/template" id="home-template">
    <!-- -->
    <h1>Your Favorite Place of Fun Quizzes</h1>
    <hr>
    <p>Start doing Quiz Time quizzes to make your leisure time enjoyable!</p>
</script>
<!- end home content template ->
<!-about template ->
<script type="text/template" id="about-template">
    <div class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">About me</h2>
                    <hr class="light">
                    <p class="text-faded">I'm Sachith Ushan an undergraduate of University of Westminster. Enjoy my quiz
                        made specially for you to spend your leisure time.</p>
                </div>
            </div>
        </div>
    </div>
</script>
<!-end about template ->

<!-sigin template ->
<script type="text/template" id="signin-template">
    <div id="signin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Sign In</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <!--<form id="signup-user-form">
                <div class="row">
                    <div class="col-lg-3">

                    </div>

                    <div class="col-lg-6 text-center">
                        <div class="col-lg-6">
                            Email:<br><br>
                            User Name: <br><br>
                            Password:<br><br>
                            Confirm Password:
                        </div>
                        <div class="col-lg-6">
                            <input type="text" id="email" maxlength="100"/><br><br>
                            <input type="text" id="name" maxlength="100"/><br><br>
                            <input type="password" id="password"/><br><br>
                            <input type="password" id="confirmpassword"/><br><br>
                            <button type="submit" class="btn btn-primary btn-xl page-scroll">Sign In</button>
                        </div>
                    </div>

                    <div class="col-lg-3">

                    </div>
                </div>
            </form>-->
            <form class="form-horizontal" id="signupform" role="form">

                <div class="form-group">
                    <label for="username" class="col-lg-2 control-label">Username</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="username" name="username"/>
                        <span class="help-block hidden"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" name="email"/>
                        <span class="help-block hidden"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>

                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="password" name="password"/>
                        <span class="help-block hidden"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeatPassword" class="col-lg-2 control-label">Repeat Password</label>

                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword"/>
                        <span class="help-block hidden"></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="button" id="signUpButton" class="btn btn-default">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</script>
<!-end singin template ->

<!-login template ->
<script type="text/template" id="login-template">
    <div id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Login</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <!--        <div class="container">-->
        <!--            <div class="row">-->
        <!--                <div class="col-lg-3">-->
        <!---->
        <!--                </div>-->
        <!--                <div class="col-lg-6 text-center">-->
        <!--                    <div class="col-lg-6">-->
        <!--                        User Name: <br><br>-->
        <!--                        Password:-->
        <!--                    </div>-->
        <!--                    <div class="col-lg-6">-->
        <!--                        <input type="text" maxlength="100"/><br><br>-->
        <!--                        <input type="password"/><br><br>-->
        <!--                        <a href="adminView.html" class="btn btn-primary btn-xl page-scroll">Login</a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-3">-->
        <!---->
        <!--                </div>-->
        <!--            </div>-->
        <form class="form-horizontal" id="loginform" role="form">
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>

                <div class="col-lg-10">
                    <input type="email" class="form-control" id="email" name="email"/>
                    <span class="help-block hidden"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>

                <div class="col-lg-10">
                    <input type="password" class="form-control" id="password" name="password"/>
                    <span class="help-block hidden"></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="button" id="loginButton" class="btn btn-success">Login</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</script>
<!-end login template ->

<!-contact view ->
<div id="contact" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="primary">
                <p>Ready to start your next quiz with me? That's great! Give us a call or send us an email and we will
                    get back to you as soon as possible!</p>
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
</div>

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

<script src="<?php echo base_url(); ?>assets/js/backbone/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/collection.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/views.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/model.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/homerouter.js"></script>


</body>

</html>
