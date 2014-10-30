$(document).ready(function(){
    $('select[name=id_solucao]').on('change', function(){
        var elm = $(this)
        var select = $('select[name=id_cultura]')
        select.attr('disabled', 'disabled').html('<option value="">Carregando...</option>')
        $.get(base_url+'relatorios/getCulturas/'+elm.val(), function(data){
            select.removeAttr('disabled').html(data)
        })
    })

    $('.exportar').on('click', function(e){
        e.preventDefault()
        var elm = $(this)
        var form = $('form.filtros')
        var action = form.attr('action')
        form.attr('action', elm.attr('href')).submit()
        form.attr('action', action)
    })
})
