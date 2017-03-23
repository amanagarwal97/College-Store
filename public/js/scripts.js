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
    }
    $.getJSON("search.php", parameters)
    .done(function(data, textStatus, jqXHR) {
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown.toString());
    });
}
