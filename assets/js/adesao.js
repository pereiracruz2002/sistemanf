$().ready(function(){
    if($('select[name=id_solucao]').get(0)){
        $('select[name=id_solucao]').trigger('change')
    }
})
