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
    getitem();
    if ($(".signin-form").length > 0){
        $("#email").on('input', function() {
            var email = $("#email").val();
            var result = emailcheck(email);
            if (result){
                $("#email").removeClass("redtext").addClass("greentext");
            }
            else{
                $("#email").removeClass("greentext").addClass("redtext");
            }
        });
    }
    else if ($(".product-search").length > 0){
        configure();
    }
    else if ($(".signup-form").length > 0){
        $("#email").on('input', function() {
            var email = $("#email").val();
            var result = emailcheck(email);
            if (result){
                $("#email").removeClass("redtext").addClass("greentext");
            }
            else{
                $("#email").removeClass("greentext").addClass("redtext");
            }
        });
        
        $("#fname").on('input', function() {
            var name = $("#fname").val();
            var result = namecheck(name);
            if (result){
                $("#fname").removeClass("redtext").addClass("greentext");
            }
            else if (!result){
                $("#fname").removeClass("greentext").addClass("redtext");
            }
        });
        $("#re_password").on('input', function() {
            var password = $("#password").val();
            var re_password = $("#re_password").val();
            if (password === re_password){
                $("#password").removeClass("redtext").addClass("greentext");
                $("#re_password").removeClass("redtext").addClass("greentext");
            }
            else {
                $("#password").removeClass("greentext").addClass("redtext");
                $("#re_password").removeClass("greentext").addClass("redtext");
            }
        });
    }
});

function configure() {
    $("#js-product .typeahead").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "no products found yet",
            suggestion: _.template("<p><%- title %> , <%- price %></p>")
        }
    });
}

function search(query, cb) {
    var parameters = {
        product : query
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
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var result = pattern.test(email);
    return result;
}

function namecheck(name) {
    var pattern = /^[a-zA-Z ]{2,30}$/;
    var result = pattern.test(name);
    return result;
}

function getitem() {
    $.ajax ({
       url : 'index.php',
       method : "GET" ,
       data : { offset : 0 }
       
    });
}
