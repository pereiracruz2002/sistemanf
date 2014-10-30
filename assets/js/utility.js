var solucao_producao = new Array()
solucao_producao[1] = 'variedade'
solucao_producao[2]= 'variedade'
solucao_producao[3]= 'cultivar'
solucao_producao[4]= 'hibrido'
solucao_producao[5]= 'hibrido'
$(function() {
    $(".datepicker").datepicker($.datepicker.regional[ "pt-BR" ])
    $('[name^=cpf]').mask('999.999.999-99');
            //.mask('99.999.999/9999-99');
    
    $('[name^=data]').mask('99/99/9999')
    $('[name^=telefone]').mask('(99) 9999-9999')
    $('[name^=celular]').mask('(99) 99999-9999', {
        onKeyPress: function(phone){
            var masks = ['(99) 9999-9999', '(99) 99999-9999'];
            if(phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) || phone.match(/^(\(?21\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g))
                $('[name^=celular]').mask(masks[1], this)
            else
                $('[name^=celular]').mask(masks[0], this)
        }
    })
    $('[name=cep]').mask('99999-999')
    $('select[name=id_solucao]').on('change', function(){
        var elm = $(this)
        var select = $('select[name=id_cultura]')
        select.attr('disabled', 'disabled').html('<option value="">Carregando...</option>')
        $.get(base_url+'relatorios/getCulturas/'+elm.val(), function(data){
            select.removeAttr('disabled').html(data)
        })
        $('.solucao_producao').parent().hide()
        $('.solucao_producao.'+solucao_producao[elm.val()]).parent().show()
    })


//    $('[name=id_solucao]').on('change', function(e){
//        var elm = $(this)
//        var sl = elm.parents('.form-group').next().find('select')
//        $.ajax({
//            url: base_url+'usuarios/getConsultoresBySolucao/'+elm.val(),
//            dataType: 'json',
//            beforeSend: function(){
//                sl.hide().before('<img src="'+base_url+'assets/img/ajax.gif" class="loading" /> ')
//            },
//            success: function(data){
//                var html = ''
//                $.each(data, function(key, usuario){
//                    html += '<option value="'+usuario.id_usuario+'">'+usuario.nome+'</option>'
//                })
//                sl.html(html).show()
//                $('.loading').remove()
//            }
//        }) 
//    })
});
