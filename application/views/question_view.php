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
    <!--    <link rel="stylesheet" href="-->
    <?php //echo base_url(); ?><!--assets/css/animate.min.css" type="text/css">-->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" onload="getSessionTime()">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/timehandle.js"></script>
<script type="text/javascript">
    function logout(){
        $.post("http://localhost/CW2_AWT_2012042/user/logout",{},
            function (data) {
                if(data == 'error') {
                    alert("please log in first!");
                }else {
                    window.location.href = "http://localhost/CW2_AWT_2012042/";
                }
            });
    }
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

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="btn" href="<?php echo base_url(); ?>" >Home</a>
                    </li>
                    <li>
                        <a class="btn" href="javascript:logout()">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
        <!--</script>-->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header id="head">
    <div class="container">
        <!-- Category View -->
        <?php if (isset($category) && !isset($results)) { ?>
            <form name="userinput" action="quiz/questions/get" method="post">
                <br><br><br>

                <h1>Select a quiz category according to your area of interest</h1>
                <div class="btn-group">
                    <div class="col-lg-6"><h5>Category : </h5></div>
                    <div class="col-lg-6">
                        <select id="category_name" name="category_name" class="dropdown btn-group">
                            <?php for ($i = 0; $i < count($category); $i++) { ?>
                                <option value="<?php echo $category[$i]["category_name"] ?>">
                                    <?php echo $category[$i]["category_name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <p>
                    <button type="submit" class="btn btn-default btn-lg"
                            role="button" id="go_btn" name="go_btn"
                            value="go_btn">GO
                    </button>
                </p>
            </form>
            <!-- end of category view-->
            <?php
        } else if (isset($question)) {
        ?>
        <!-- Question view -->
        <form name="userinput" action="next" method="post">
            <br><br><br>
            <div class="col-lg-12">
                <!-- Question View -->
                <h3><?php echo $question[0]["question_number"] . " . " . $question[0]["question_value"] ?></h3>
                <?php
                $answers = $question[0]["answers"];
                for ($i = 0; $i < count($answers); $i++) {
                    $answer = $answers[$i]["answer_value"];
                    ?>
                    <h4>
                        <input type="radio" name="answer" value="<?php echo $answer ?>"/>
                        <?php echo $answer ?></br>
                    </h4>
                    <?php
                }
                if (isset($error)) {
                    ?>
                    <h3 style="color:#FF0000">Please answer the question and click next</h3>
                <?php } ?>
                <p>
                    <button type="submit" class="btn btn-default btn-lg"
                            id="next" name="next_btn" onclick="stopCount()" value="next_btn">
                        Next
                    </button>
                </p>
            </div>
            <div id="remain_question_timer">
                <div class="col-lg-6"><h3>QUESTION <?php echo $question[0]["question_number"] ?>/10</h3></div>
                <div class="col-lg-6"><h3 align="left" id="timer">00.00</h3></div>
            </div>
        </form>
    </div>
    <!-- End Question view -->
    <?php
    } else if (isset($results)) { ?>

        <!--Score View Page -->
        <form onload="drawChart()" name="userinput" action="<?php echo base_url(); ?>" method="post">
            <br><br><br>
            <h3>Hi <?php echo $user ?> ,Your Score for this attempt is <?php echo $results["score"] ?>%</h3>
            <?php
            $total_score = 0;
            for ($i = 0; $i < count($attempts); $i++) {

                ?>
                <?php $total_score += $attempts[$i]["score"];
            } ?>
            <h3>Your Average is : <?php echo number_format((float)($total_score / count($attempts)), 2, '.', ''); ?>
                %</h3>
            <p>
                <button type="submit" class="btn btn-default btn-lg"
                        id="try_again_btn" name="try_again_btn">
                    Try Again
                </button>
                <button type="button" class="btn btn-default btn-lg"
                        id="view_chart" name="view_chart" onclick="drawChart()">
                    View Progress
                </button>
            </p>
            <!--                <h1 align="Right" id="timeText">Total time for quiz :</h1>-->

            <h3 align="Right" id="timer">00.00</h3>
            <div id="chart_div">
                <div>
        </form>
    <?php } ?>
    <!--end of score view-->
    <input type="hidden" id="time_store"/>

    </div>

</header>
<!-- /Header -->

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


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/timehandle.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/progress_chart.js"></script>
<script
    type="text/javascript"
    src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets/js/headroom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/headroom.min.js"></script>


</body>

</html>
