/*!
* Start Bootstrap - Landing Page v6.0.5 (https://startbootstrap.com/theme/landing-page)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

var app = new Vue({
    el: '#form1',
    data: function () {
    return {
    email : "",
    emailBlured : false,
    valid : false,
    submitted : false,
    password:"",
    passwordBlured:false
    }
    },
    
    methods:{
    
    validate : function(){
    this.emailBlured = true;
    this.passwordBlured = true;
    if( this.validEmail(this.email) && this.validPassword(this.password)){
    this.valid = true;
    }
    },
    
    validEmail : function(email) {
    
    var re = /(.+)@(.+){2,}\.(.+){2,}/;
    if(re.test(email.toLowerCase())){
    return true;
    }
    
    },
    
    validPassword : function(password) {
    if (password.length > 7) {
    return true;
    }
    },
    
    submit : function(){
    this.validate();
    if(this.valid){
    this.submitted = true;
    }
    }
    }
    });