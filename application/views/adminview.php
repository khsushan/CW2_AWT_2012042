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

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/easyui/themes/default/easyui.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/easyui/themes/icon.css" type="text/css">

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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div id="navigate">
                <script type="text/template" id="navigate-home-template">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="btn" href="">Home</a>
                        </li>
                        <li>
                            <a class="btn" href="">View category</a>
                        </li>
                        <li>
                            <a class="btn" href="#/admin/question/add">Add new Question</a>
                        </li>
                        <li>
                            <a class="btn" href="#user/logout">Logout</a>
                        </li>
                    </ul>
                </script>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header id="home">
    <div class="header-content">
        <div class="header-content-inner" id="main">

        </div>
    </div>
</header>

<script type="text/template" id="viewcategory-template">
    <section class="no-padding" id="viewCategory">
        <div class="container-fluid">
            <h2>Please select a category to edit</h2> <br><br><br>

            <div class="row no-gutter">
                <% _.each(categories, function(category) { %>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box category-link">
                        <img src="<?php echo base_url(); ?><%= category.get('imageurl') %>" class="img-responsive"
                             alt="">

                        <div class="portfolio-box-caption" data-id="<%= category.get('categoryid') %>">
                            <div class="portfolio-box-caption-content" data-id="<%= category.get('categoryid') %>">
                                <div class="project-category text-faded" data-id="<%= category.get('categoryid') %>">
                                    Category
                                </div>
                                <div class="project-name" data-id="<%= category.get('categoryid') %>">
                                    <%= category.get('category_name') %>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <%});%>
            </div>
    </section>
</script>

<script type="text/template" id="addcategory-template">
    <section class="no-padding" id="addcategory">
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
</script>


<script type="text/template" id="navigate-viewquestion-template">

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <h2>Please select a question to edit</h2> <br>
            <input type="text" id="keyword" class="form-control input-lg" value="<%= keyword %>" autofocus/><br>

            <div class="row no-gutter text-left" style="overflow-y: scroll; height:400px;">
                <%if(matches){
                var i =0;
                _.each(matches, function(question) { %>
                <div class="col-md-12">
                    <div class="col-md-11 text-left">
                        <div class="questionlist"
                             data-toggle="collapse" data-id="<%= question.get('question_id') %>"
                             data-value="<%= question.get('question_value')%>"
                             data-target="#editdiv<%= question.get('question_id')%>"
                             data-index="<%= i %>"
                            >
                            <%= question.get('question_value')%><br><br>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <input type=" button" class="btn-danger" value="Delete"
                               data-id="<%= question.get('question_id') %>" data-index="<%= i %>">
                    </div>
                </div>
                <div id="editdiv<%= question.get('question_id') %>" class="collapse">

                </div>
                <% i++
                });
                }%>
            </div>
        </div>
    </section>

</script>


<script type="text/template" id="navigate-edit-delete-question">
    <form id="edit-delete-question-form">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">Question</div>
                <div class="col-md-10">
                    <input type="text" id="question<%= question.get('question_id') %>" class="form-control"
                           value="<%= question.get('question_value') %>"/>
                </div>
            </div>
            <div class="row">
                <br><br>
            </div>
            <% var i = 0;
            _.each(answers1, function(answer1) { %>
            <div class="row">
                <div class="col-md-2">Answer <%= i+1 %></div>
                <div class="col-md-8">
                    <input type="text" id="answer_value_<%= answer1.get('answer_id') %>" class="form-control"
                           value="<%= answer1.get('answer_value') %>"/>
                </div>
                <div class="col-md-1">Status</div>
                <div class="col-md-1">
                    <% if(answer1.get('status') == 1){ %>
                    <input type="radio" name="status<%= question.get('question_id') %>"
                           checked="checked" value="<%= answer1.get('answer_id') %>"/>
                    <%}else{%>
                    <input type="radio" name="status<%= question.get('question_id') %>"
                           value="<%= answer1.get('answer_id') %>"/>
                    <%}%>
                    <input type="hidden" id="answer-id<%= i %>" value="<%= answer1.get('answer_id') %>"/>
                </div>
                <input type="hidden" id="question-id" value="<%= question.get('question_id') %>"/>
            </div>
            <div class="row">
                <br><br>
            </div>
            <% i++;
            });%>
        </div>
    </form>
    <input type="button" class="btn-xl btn-success" value="Edit" id="edit-btn"
           data-id="<%= question.get('question_id') %>"/>
    <input type="button" class="btn-xl btn-danger" value="Delete" id="delete-btn"
           data-id="<%= question.get('question_id') %>" data-index="<%= index %>"/>
    <input type="button" class="btn-xl btn-default" value="Back" id="back_btn"
           data-id="<%=  question.get('question_id') %>"/>

</script>

<script type="text/template" id="add-question">
    <form id="add-question-form" role="form">

        <div class="row">
            <div class="col-md-2">Category</div>
            <div class="col-md-2">
                <select class="easyui-combobox" style="width:200px;" id="category" name="category">
                    <% _.each(categories, function(category) { %>
                    <option value="<%= category.get('categoryid') %>">
                        <%= category.get('category_name') %>
                    </option>
                    <% }); %>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <span class="help-block hidden"></span>
            </div>
            <br><br>
        </div>
        <!-- question value -->
        <div class="row">
            <div class="col-md-2">Question</div>
            <div class="col-md-10 form-group">
                <input type="text" id="question_value" name="question_value" class="form-control" required/>
                <span class="help-block hidden"></span>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
        <!--end question value-->
        <!-- answer 1 -->
        <div class="row form-group">
            <div class="col-md-2">Answer1</div>
            <div class="col-md-8 form-group">
                <input type="text" id="answer_value1" name="answer_value1" class="form-control" required/>
                <span class="help-block hidden"></span>
            </div>
            <div class="col-md-1">Status</div>
            <div class="col-md-1">
                <input type="radio" name="status_answer" value="1"/>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
        <!-- end answer1 -->
        <!-- answer 2 -->
        <div class="row form-group">
            <div class="col-md-2">Answer2</div>
            <div class="col-md-8">
                <input type="text" id="answer_value2" name="answer_value2" class="form-control" required/>
                <span class="help-block hidden"></span>
            </div>
            <div class="col-md-1">Status</div>
            <div class="col-md-1">
                <input type="radio" name="status_answer" value="2"/>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
        <!-- end answer2 -->
        <!-- answer 3 -->
        <div class="row form-group">
            <div class="col-md-2">Answer3</div>
            <div class="col-md-8">
                <input type="text" id="answer_value3" name="answer_value3" class="form-control" required/>
                <span class="help-block hidden"></span>
            </div>
            <div class="col-md-1">Status</div>
            <div class="col-md-1">
                <input type="radio" name="status_answer" value="3"/>
            </div>
        </div>
        <div class="row">
            <br>
        </div>
        <!-- end answer3 -->
        <!-- answer 4 -->
        <div class="row form-group">
            <div class="col-md-2">Answer4</div>
            <div class="col-md-8">
                <input type="text" id="answer_value4" name="answer_value4" class="form-control" required/>
                <span class="help-block hidden"></span>
            </div>
            <div class="col-md-1">Status</div>
            <div class="col-md-1">
                <input type="radio" name="status_answer" value="4"/>
            </div>
        </div>
        <div class="row">
            <br>
            <span class="help-block error hidden" style="color: red" id="erro_status"></span>
        </div>
        <!-- end answer4 -->
        <!-- end answer4 -->
        <!-- end answer4 -->
        </div>
        <button type="button" class="btn btn-default" id="save_btn"> Save</button>
    </form>
</script>


<section id="contact" class="bg-dark">
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
</section>

<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span id="header-text"></span><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Are You Sure?</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-ok" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

<!-- Backbone JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/admin/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/admin/admincollection.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/admin/adminviews.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/admin/adminmodel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/backbone/admin/adminrouter.js"></script>



</body>

</html>
