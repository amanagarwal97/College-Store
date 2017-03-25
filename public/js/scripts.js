/* global google */
/* global _ */
/**
 * scripts.js
 *
 * Project_2
 *
 * Global JavaScript.
 */
 
$(function() {
    if ($(".signin-form").length > 0){
        var email = $("#email").val();
        var result = emailcheck(email);
        if (result){
            $("#email").addClass("greentext");
        }
        else{
            $("#email").addClass("redtext");
        }
    }
    else if ($(".product-search").length > 0){
        configure();
    }
    else if ($(".signup-form").length > 0){
        var email1 = $("#email").val();
        var result1 = emailcheck(email1);
        if (result1){
            $("#email").addClass("greentext");
        }
        else{
            $("#email").addClass("redtext");
        }
        
        var name = $("#fname").val();
        var result2 = namecheck(name);
        if (result2){
            $("#fname").addClass("greentext");
        }
        else if (!result2){
            $("#fname").addClass("redtext");
        }
        
        var password = $("#password").val();
        var re_password = $("#re_password").val();
        if (password === re_password){
            $("#password").addClass("greentext");
            $("#re_password").addClass("greentext");
        }
        else {
            $("#password").addClass("redtext");
            $("#re_password").addClass("redtext");
        }
    }
});

function configure() {
    $("#js-product").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "no products found yet",
            suggestion: _.template("<p><%- category %></p>")
        }
    });
}

function search(query, cb) {
    var parameters = {
        product: query
    };
    $.getJSON("search.php", parameters)
    .done(function(data, textStatus, jqXHR) {
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown.toString());
    });
}

function emailcheck(email) {
    var pattern = /add pattern/;
    var result = pattern.test(email);
    return result;
}

function namecheck(name) {
    var pattern = /[a-z| ]{2,}/i;
    var result = pattern.test(name);
    return result;
}
