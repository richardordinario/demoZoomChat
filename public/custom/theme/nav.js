$('document').ready(function() {

    $(".nav-item a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).addClass("active");

    $('#press').click(function() {
        alert('Clicked');
    })
})
// $(".nav-link i").filter(function(){
// return this.href == location.href.replace(/#.*/, "");
// }).addClass("i-select");