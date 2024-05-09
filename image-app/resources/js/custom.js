$(document).ready(function () {
    $("button[type='submit']").click(function(e){
        var $filesUpload = $("input[type='file']");
        if (parseInt($filesUpload.get(0).files.length)>5){
            alert("Вы можете загрузить не более 5 файлов");
            e.preventDefault();
        }
    }); 
    
    $('.sort-btn').on("click", function () {
        $.ajax({
            url: '/gallery-sort',        
            method: 'get',            
            dataType: 'html',          
            data: {sortby: $("#sortby").val()},     
            success: function(data){  
                $('.content').html(data); 
            }
        });
    });  
    


    $('.popup-close').click(function() {
        $(this).parents('.popup-fade').fadeOut();
        return false;
    });        
    
    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-fade').fadeOut();
        }
    });
    
    $('.popup-fade').click(function(e) {
        if ($(e.target).closest('.popup').length == 0) {
            $(this).fadeOut();					
        }
    });	
    
})
