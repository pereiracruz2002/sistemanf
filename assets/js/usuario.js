$(function() {
    $('select[name=id_perfil]').on('change', function(){
        var elm = $(this).val();
        if(elm < 4){
           $('select[name=id_regional]').removeAttr("required");
           $('select[name=id_distribuidor]').attr("required","required"); 
        }else{
            $('select[name=id_regional]').attr("required","required");
            $('select[name=id_distribuidor]').removeAttr("required","required"); 
        }
           
    })
})
