/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var SignUpView = Backbone.View.extend({
    events: {
        //signup button click
        'click #signUpButton': function (e) {
            e.preventDefault();
            this.saveUser();
        }
    },
    initialize: function () {
        Backbone.Validation.bind(this);
    },
    saveUser: function () {
        var userDetails = $("#signupform").serializeObject();
        var user = new User();
        this.model.set(userDetails);
        if (this.model.isValid(true)) {
            user.save(userDetails, {
                success: function (isAdded) {
                    console.log(isAdded);
                    //router.navigate('', {trigger: true});
                }
            });
        }
        return false;
    },
    template: _.template($('#signin-template').html()),
    render: function () {
        this.$el.html(this.template);
        //$("#navigate").html(_.template($('#navigate-home-template').html()));
        return this;
    }
});

var HomeView = Backbone.View.extend({
    template: _.template($('#navigate-home-template').html()),
    events: {},
    render: function (options) {
        $("#navigate").html(_.template($('#navigate-home-template').html()));
        $("#main").html(_.template($('#home-template').html()));
        return this;
    }
});

var LoginView = Backbone.View.extend({
        template: _.template($('#navigate-home-template').html()),

        events: {
            //signup button click
            'click #loginButton': function (e) {
                e.preventDefault();
                this.login();
            }
        },
        initialize: function () {
            Backbone.Validation.bind(this);
        },
        render: function (options) {
            $("#navigate").html(this.template);
            this.$el.html(_.template($('#login-template').html()));
            return this;
        },
        login: function () {
            var loginDetails = $("#loginform").serializeObject();
            console.log(loginDetails);
            var login = new Login();
            this.model.set(loginDetails);
            var that = this
            if (this.model.isValid(true)) {
                login.save(loginDetails, {
                    success: function (responce) {
                        var responceJSON = JSON.parse(JSON.stringify(responce));
                        console.log(responceJSON["error"]);
                        if (responceJSON.error) {
                            that.loginFailed();
                        } else {
                            window.location.href = "http://localhost/CW2_AWT_2012042/"
                        }
                    }
                });
            }
        },

        loginFailed: function () {

            var $passwordelement = $("#password")
            $group = $passwordelement.closest('.form-group');
            $group.addClass('has-error');
            $group.find('.help-block').html("invalid username or password").removeClass('hidden');

            var $usernameelemenet = $("#email");
            $group = $usernameelemenet.closest('.form-group');
            $group.addClass('has-error');
            $group.find('.help-block').html("").removeClass('hidden');
        }

    })
    ;




