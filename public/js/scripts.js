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
    // Checks which page user is currently on
    if ($(".signin-form").length > 0){
        // real-time validation for email
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
        // front-end verification of sign-in form input
        $("#js-button").on('click', function() {
            var email = $("#email").val();
            var result = emailcheck(email);
            if(!result){
                $("#emailcheck").css("display", "inline");
                $("#email").val("");
                return false;
            }
        });
    }
    else if ($(".product-search").length > 0){
        // configuration for typeahead
        configure();
    }
    else if ($(".signup-form").length > 0){
        // real-time validation of email while registering
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
        
        // real-time validation of first name while registering
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
        
        // real-time validation of whether password and re-password are same while registering
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
        
        // front-end verification of sign-up form inputs
        $("#js-button").on('click', function() {
            var email = $("#email").val();
            var result = emailcheck(email);
            var name = $("#fname").val();
            var result1 = namecheck(name);
            if(!result && !result1){
                $("#emailcheck").css("display", "inline");
                $("#email").val("");
                $("#namecheck").css("display", "inline");
                $("#fname").val("");
                return false;
            }else if(!result) {
                $("#emailcheck").css("display", "inline");
                $("#email").val("");
                $("#namecheck").css("display", "none");
                return false;
            }
            else if(!result1) {
                $("#namecheck").css("display", "inline");
                $("#fname").val("");
                $("#emailcheck").css("display", "none");
                return false;
            }else {
                $("#emailcheck").css("display", "none");
                $("#namecheck").css("display", "none");
            }
        });
    }
    
    $('.sell').click(function(){
        // disables price in post-ad form if donate is selected
        var value = $('input[name=choice]:checked').val();
        if (value == 0)
        {   
            $('#price').prop('disabled','true');
        }
    });
});

// configuration and display result function of typeahead
function configure() {
    $("#js-product").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "No Products Found ",
            suggestion: _.template("<p><%- title %></p>")
        }
    });
    
    $("#js-product").on("typeahead:selected", function(eventObject, suggestion, name) {
    
        eventObject.preventDefault();
        window.location.href = 'items.php?item=' + suggestion.id;
        console.log(suggestion.id);
    });
}

// searches for products in database based on input
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

// checks whether email format is valid
function emailcheck(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var result = pattern.test(email);
    return result;
}

// checks whether name format is valid
function namecheck(name) {
    var pattern = /^[a-zA-Z ]{2,30}$/;
    var result = pattern.test(name);
    return result;
}

