/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Question =  Backbone.Model.extend({
    urlRoot: ""
});

var Answer =  Backbone.Model.extend({
    urlRoot : ""
});

var AddQuestion = Backbone.Model.extend({
    validation: {
        question_value: {
            required: true
        },
        answer_value1: {
            required: true,
        },
        answer_value2: {
            required: true,
        },
        answer_value3: {
            required: true,
        },
        answer_value4: {
            required: true,
        }
    }
});


