/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Categories = Backbone.Collection.extend({
    url: 'quiz/category/get/all'
});

var Questions = Backbone.Collection.extend({

    url: 'quiz/category/get/question/1',

    searchQuestion:function(keyword,callback){
        var matches = [];
        this.each(function(model) {
            //console.log(model.attributes["question_value"]+":::::::::::::::::::::::::::::::::::::")
            if( model.attributes.hasOwnProperty("question_value")
                && model.attributes["question_value"].toLowerCase().indexOf(keyword.toLowerCase()) > -1 ){
                matches.push(model);
            }
        });
        callback.call( this, matches );
    }

});

var Answers =  Backbone.Collection.extend({
    url: 'quiz/question/get/answer/1'
});
