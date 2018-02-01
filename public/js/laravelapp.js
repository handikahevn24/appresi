$(document).ready(function(){
    //Alert Sliding
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    //Hapus Select dengan empty value dari URL
    $("#form-pencarian").submit(function(){
        $("#id_toko option[value='']").attr("disabled","disabled");
        $("#ekpedisi option[value='']").attr("disabled","disabled");
    
    //Pastikkan proses submit masih diteruskan
    return true;
    });
});