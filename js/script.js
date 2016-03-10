$(".button-collapse").sideNav();

$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
});


$.getJSON( "/conline/getchat", function( data ) {
  for
  $(".chats").append("<li>" + data.key + "</li>");

});