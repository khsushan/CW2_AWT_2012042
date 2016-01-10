/**
 * Created by Ushan on 1/7/2016.
 */
var Router = Backbone.Router.extend({
    routes: {
        '': "home",
        'home':"home",
        "admin/category/add": "addcategory",
        "admin/category/view": "viewcategory",
        "user/question/view/:cateroryid": "viewquestion",
        "user/question/edit": "editquestion"
    }
});
var router = new Router;
router.on('route:home', function () {
    var navigateView = new NavigatorView();
    $("#navigate").empty();
    $("#navigate").append(navigateView.render().el);

    var viewCategory = new ViewCategoryView();
    $("#main").empty();
    $("#main").append(viewCategory.render().el);

});
router.on('route:addcategory', function () {
    var navigateView = new NavigatorView();
    $("#navigate").empty();
    $("#navigate").append(navigateView.render().el);

    var addCategoryView = new AddCategoryView( {model: new User()});
    $("#main").empty();
    $("#main").append(addCategoryView.render().el);
});
router.on('route:viewcategory', function () {
    var homeView = new HomeView();
    homeView.render();
});
router.on('route:viewquestion', function () {
    var loginView = new LoginView( {model: new Login()});
    $("#main").innerHTML = "";
    $("#main").append(loginView.render().el);
});
router.on('route:editquestion', function () {
    var homeView = new HomeView();
    homeView.render();
});
Backbone.history.start();