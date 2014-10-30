$(function() {
    function regionalOuDistribuidor(valor){
         if(valor == 2){ //consultor
            $("select[name=id_regional]").parent("div").parent('div').show();
            $("select[name=id_distribuidor]").parent("div").parent('div').hide();
        }else{            
            $("select[name=id_distribuidor]").parent("div").parent('div').show();
            $("select[name=id_regional]").parent("div").parent('div').hide();
        }
    }
    $("select[name=id_perfil]").on("change live",function(){
        var area = $(this).val();
       regionalOuDistribuidor(area)
    })
     regionalOuDistribuidor($("select[name=id_perfil]").val());
})

