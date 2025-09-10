$(document).on("change", ".checkbox", function(){
    $(this).siblings(".taskContent").toggleClass("strike", this.checked);
    // $(".checkbox").change(function(){
    //     let text = $(this).siblings(".taskContent");
    //     text.css("text-decoration", this.checked ? "line-through" : "none");
    // });
});