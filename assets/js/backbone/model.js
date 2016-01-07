/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 var User = Backbone.Model.extend({
    urlRoot: 'users',
     validation: {
         username: {
             required: true
         },
         email: {
             required: true,
             pattern: 'email'
         },
         password: {
             minLength: 5
         },
         repeatPassword: {
             equalTo: 'password',
             msg: 'The passwords does not match'
         }
     }

});

var Login =  Backbone.Model.extend({
   urlRoot: 'user/login',
    validation: {
        email: {
            required: true,
            pattern: 'email'
        },
        password: {
            minLength: 5
        }
    }
});

