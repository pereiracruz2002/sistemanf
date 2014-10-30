$().ready(function(){
    $('.nova_adesao').on('click', function(e){
        e.preventDefault()
        var id_produtor = $('[name=id_produtor]:checked').val()
        var elm = $(this)
        if(id_produtor){
            location.href= elm.attr('href')+'/'+id_produtor+'/'+elm.data('id_solucao')
        } else {
            alert('Por favor, selecione um produtor')
        }
    })
})
