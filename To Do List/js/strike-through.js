$(document).ready(function(){
    $(".checkbox").change(function(){
        let text = $(this).siblings(".taskContent");
        text.css("text-decoration", this.checked ? "line-through" : "none");
    });
});