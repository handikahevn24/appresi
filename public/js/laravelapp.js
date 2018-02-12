$(document).ready(function(){
    //Alert Sliding
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    //Hapus Select dengan empty value dari URL
    $("#form_pencarian").submit(function(){
        $("#dari option[value='']").attr("disabled","disabled");
        $("#ke option[value='']").attr("disabled","disabled");
    
    //Pastikkan proses submit masih diteruskan
    return true;
    });
});