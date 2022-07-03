$(function(){
    $(".collapse-course-content").on("click", function(){
        let text = $(this).text();
        if(text == 'keyboard_arrow_up') {
            $(this).closest('h4').next().css('display', 'none');
            $(this).text('keyboard_arrow_down');
        } else {
            $(this).closest('h4').next().css('display', 'block');
            $(this).text('keyboard_arrow_up');
        }
    })
})