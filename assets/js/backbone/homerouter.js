/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Router = Backbone.Router.extend({
    routes: {
        '': "home",
        "user/signup": "signup",
        "user/login": "login"

    }
});
var router = new Router;
router.on('route:signup', function () {
    var signUpView = new SignUpView( {model: new User()});
    $("#main").innerHTML = "";
    $("#main").append(signUpView.render().el);
});
router.on('route:home', function () {
    var homeView = new HomeView();
    homeView.render();
});
router.on('route:login', function () {
    var loginView = new LoginView( {model: new Login()});
    $("#main").innerHTML = "";
    $("#main").append(loginView.render().el);
});
Backbone.history.start();


