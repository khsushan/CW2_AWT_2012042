/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var ViewCategoryView = Backbone.View.extend({
    template: _.template($('#viewcategory-template').html()),
    keyword: null,
    questions: null,

    events: {
        'click .category-link': function (e) {
            this.renderQuestion(e.target.getAttribute('data-id'));
        },
        'keyup #keyword': function (e) {
            this.keypress(e);
        },
        'click #edit-btn': function (e) {
            this.edit(e)
        },
        'click #back_btn': "back",

        'click .questionlist': function (e) {
            this.renderEdit(e)
        },
        'click .btn-danger': function(e){
            var that =  this;
            bootbox.confirm("Are you sure you want to delete?", function(result) {
                console.log(result)
                if (result) {
                    that.delete(e);
                }
            });

        }

    },
    render: function () {
        var categories = new Categories();
        var that = this;
        categories.fetch().done(function () {
            that.$el.html(that.template({categories: categories.models}));
        });
        return this;
    },

    renderQuestion: function (id) {
        var questions = new Questions();
        questions.url = "quiz/category/question/get/" + id;
        var that = this;
        questions.fetch().done(function () {
            var questionTemplate = _.template($('#navigate-viewquestion-template').html());
            that.$el.html(questionTemplate({keyword: "", matches: questions.models}));
            $("#main").empty();
            $("#main").append(that.el);
        });
        this.questions = questions;
    },

    keypress: function (e) {
        var keyword = $("#keyword").val();
        var index = ("abcdefghijklmnopqrstuvwxyz ").indexOf(String.fromCharCode(e.keyCode).toLowerCase());
        if (index > -1 || e.keyCode == 8) {
            this.renderQuestionView(keyword);
        }
    },

    renderQuestionView: function (keyword) {
        var that = this;
        this.questions.searchQuestion(keyword, function (matches) {
            var template = _.template($('#navigate-viewquestion-template').html());
            that.$el.html(template({keyword: keyword, matches: matches}));
            $("#main").empty();
            $("#main").append(that.el);

        });
    },

    renderEdit: function (e) {
        var questionId = $(e.currentTarget).data("id");
        var question_value = $(e.currentTarget).data("value");
        var question_index = $(e.currentTarget).data("index");
        //this.questions.find({quesiton_id:questionId})
        var answers = new Answers();
        var question = new Question();
        question.set({question_id: questionId, question_value: question_value});
        answers.url = "quiz/question/answer/get/" + questionId;
        this.keyword = $("#keyword").val();
        var that = this;
        $.when(answers.fetch()).done(function () {
            var editTemplate = _.template($('#navigate-edit-delete-question').html());
            console.log(answers);
            that.$el.html(editTemplate({question: question, answers1: answers.models, index: question_index}));
            console.log("#editdiv" + questionId);
            $("#editdiv" + questionId).empty();
            $("#editdiv" + questionId).append(that.el);
        });

    },

    edit: function (e) {
        var questionid = $("#question-id").val();
        var question_value = $("#question" + questionid).val();

        var question = new Question();
        question.urlRoot = "quiz/question/update";
        var questionDetails = {question_id: questionid, question_value: question_value};
        question.save(questionDetails, {
            success: function (responce) {
                var answerID = "";
                var response_status = true;;
                var answerValue = "";
                var name = "status" + questionid;
                var answerStatus = $('input[name="' + name + '"]:checked', '#edit-delete-question-form').val();
                var status;
                var answer = null;
                var answerDetails = null;
                var answers = new Answers();
                for (i = 0; i < 4; i++) {
                    answerID = $("#answer-id" + i).val()
                    answerValue = $("#answer_value_" + answerID).val();
                    if (answerStatus == answerID) {
                        status = 1;
                    } else status = 0;
                    answer = new Answer()
                    answer.urlRoot = "quiz/answer/update";
                    answerDetails = {answer_id: answerID, answer_value: answerValue, answer_status: status};
                    answer.save(answerDetails, {
                        success: function (responce) {
                            console.log("succses saved answers")
                        },
                        error: function(){
                            response_status = false;
                        }
                    });
                }

                var message = "question upating failed"
                if(response_status){
                    message = "question updatin success";
                }
                bootbox.alert(message, function () {
                });

            }

        });

    },

    back: function () {
        this.renderQuestionView(this.keyword);
    },
    delete: function (e) {
        if(!this.keyword){
            this.keyword = $("#keyword").val();
        }
        var questionId = $(e.currentTarget).data("id");
        var index = $(e.currentTarget).data("index");
        var question = new Question();
        question.urlRoot = "quiz/question/delete/"+questionId;
        var that = this;
        question.fetch({
            success: function (responce) {
                that.questions.remove(that.questions.at(index));
                that.renderQuestionView(that.keyword);
            },
            error: function (responce) {

            }
        });
    }
});

var NavigatorView = Backbone.View.extend({
    template: _.template($('#navigate-home-template').html()),
    events: {},
    render: function () {
        this.$el.html(this.template);
        return this;
    }
});

var AddCategoryView = Backbone.View.extend({
    template: _.template($('#addcategory-template').html()),
    events: {},
    initialize: function () {
        Backbone.Validation.bind(this);
    },
    render: function (options) {
        this.$el.html(this.template);
        return this;
    },
    addcategory: function () {

    }
});

var AddQuestionView = Backbone.View.extend({
    template: _.template($('#add-question').html()),
    events: {
        'click #save_btn': function (e) {
            e.preventDefault();
            this.addQuestion();
        }
    },
    initialize: function () {
        Backbone.Validation.bind(this);
    },
    render: function () {
        var categories = new Categories();
        var that = this;
        categories.fetch().done(function () {
            that.$el.html(that.template({categories: categories.models}));
        });
        return this;
    },

    addQuestion: function () {
        var userDetails = $("#add-question-form").serializeObject();
        console.log(userDetails);
        this.model.set(userDetails);
        var status = $("input[name=status_answer]:checked").val();

        if (this.model.isValid(true) && status) {
            var questionDetails = {question_value: userDetails.question_value, category_id: userDetails.category};
            console.log(questionDetails);
            var question = new Question();
            question.urlRoot = "quiz/question/create"
            var answer = new Answer();
            answer.urlRoot = "quiz/answer/create"
            question.save(questionDetails, {
                success: function (responce) {
                    if (responce.id) {
                        var correct_answer_index = userDetails.status_answer;
                        var answerDetails = null;
                        for (var i = 1; i < 5; i++) {
                            answerDetails = {answer_value: userDetails["answer_value" + i], question_id: responce.id}
                            if (correct_answer_index == i) {
                                answerDetails["status"] = 1;
                            } else {
                                answerDetails["status"] = 0;
                            }
                            var count = 0;
                            answer.save(answerDetails, {
                                success: function (responce) {
                                    count++;
                                    if (responce.id && count == 4) {
                                        bootbox.alert("Add Question process finished success", function () {
                                        });
                                        var addQuestionView = new AddQuestionView({model:new AddQuestion()});
                                        $("#main").empty();
                                        $("#main").append(addQuestionView.render().el)
                                    }

                                }
                            });
                        }
                    }
                }
            });
        } else if (status == undefined) {
            $("#erro_status").html("Please check the radio button infront of correct answer").removeClass("hidden");
        } else {
            $("#erro_status").html("").addClass("hidden");
        }
    }
});






