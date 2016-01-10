/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var ViewCategoryView = Backbone.View.extend({
        template: _.template($('#viewcategory-template').html()),
        previousEl: null,
        questions: null,
        events: {
            'click .category-link': function (e) {
                //e.preventDefault();
                this.renderQuestion(e.target.getAttribute('data-id'));
            },
            'keyup #keyword': function (e) {
                //console.log(this.questions);
                this.keypress(e);
            },
            'click #edit-btn': function (e) {
                this.edit(e)
            },
            'click #back_btn' : "back",
            'click .questionlist': function (e) {
                this.renderEdit(e)
            }

        },
        initialize: function () {

        },
        render: function () {
            //this.$el.html(this.template);
            var categories = new Categories();
            var that = this;
            categories.fetch().done(function () {
                that.$el.html(that.template({categories: categories.models}));
            });
            return this;
        },

        renderQuestion: function (id) {
            var questions = new Questions();
            questions.url = "quiz/category/get/question/" + id;
            var that = this;
            questions.fetch().done(function () {
                var questionTemplate = _.template($('#navigate-viewquestion-template').html());
                that.$el.html(questionTemplate({keyword: "", matches: null}));
                $("#main").empty();
                $("#main").append(that.el);
            });
            this.questions = questions;
        },

        keypress: function (e) {
            var keyword = $("#keyword").val();
            var index = ("abcdefghijklmnopqrstuvwxyz ").indexOf(String.fromCharCode(e.keyCode).toLowerCase());
            var that = this;
            if (index > -1) {
                this.questions.searchQuestion(keyword, function (matches) {
                    var template = _.template($('#navigate-viewquestion-template').html());
                    that.$el.html(template({keyword: keyword, matches: matches}));
                    //that.el.find('input').focus();
                    $("#main").empty();
                    $("#main").append(that.el);

                });

            }
        },

        renderEdit: function (e) {
            var questionId = $(e.currentTarget).data("id");
            var question_value = $(e.currentTarget).data("value");
            //this.questions.find({quesiton_id:questionId})
            var answers = new Answers();
            var question = new Question();
            question.set({question_id: questionId, question_value: question_value});
            answers.url = "quiz/question/get/answer/" + questionId;
            this.previousEl = this.$el;
            var that = this;
            $.when(answers.fetch()).done(function () {
                var editTemplate = _.template($('#navigate-edit-delete-question').html());
                console.log(answers);
                that.$el.html(editTemplate({question: question, answers1: answers.models}));
                console.log("#editdiv" + questionId);
                $("#editdiv" + questionId).empty();
                $("#editdiv" + questionId).append(that.el);
            });

        },

        edit: function (e) {
            var questionid = $("#question-id").val();
            var question_value = $("#question"+questionid).val();

            var question  =  new Question();
            question.urlRoot = "quiz/question/update";
            var questionDetails = {question_id:questionid,question_value:question_value};
            question.save(questionDetails ,{
                success: function (responce) {
                    var answerID = "";
                    var answerValue  = "";
                    var name = "status"+questionid;
                    var answerStatus = $('input[name="'+name+'"]:checked', '#edit-delete-question-form').val();
                    var status;
                    var answer = null;
                    var answerDetails = null;
                    var answers =  new Answers();
                    for (i = 0; i < 4; i++) {
                        answerID =  $("#answer-id"+i).val()
                        answerValue =  $("#answer_value_"+answerID).val();
                        if(answerStatus ==  answerID){
                            status = 1;
                        }else status = 0;
                        answer = new Answer()
                        answer.urlRoot ="quiz/answer/update";
                        answerDetails = {answer_id:answerID,answer_value:answerValue,answer_status:status};
                        answer.save(answerDetails,{
                            success: function (responce){
                                console.log("succses saved answers")
                            }
                        });
                    }
                }
            });

        },

        back : function(e){
            console.log("its back button bitehcs"+this.previousEl);
            this.$el = this.previousEl;
            $("#main").empty();
            $("#main").append(this.el);
        }
    })
    ;

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






