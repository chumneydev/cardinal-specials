// Create New Client
$("a.create-client").click(function() {
    event.preventDefault();

/*var data = {
    name: pageId,
    repeater: repeater
};*/

$.ajax({
    //data: data,
    url: "http://192.168.12.3:8181/development/projects/specials/pw/ajax-actions/create-client/",
    success: function( response ) {}
});


});


// Pause Special
$(".special-pause").click(function() {
    event.preventDefault();

    var specialId = $(this).attr('data-pause-id');
    var parentId = $(this).attr('data-pause-parent-id');
    var data = {
        parentId: parentId,
        specialId: specialId,
    };

$.ajax({
    type: "POST",
    data: data,
    url: "http://192.168.12.3:8181/development/projects/specials/pw/ajax-actions/special-pause/",
    success: function( response ) {
    }
});


});


$.aja