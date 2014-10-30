$(function() {
    $(".datepicker").datepicker($.datepicker.regional[ "pt-BR" ])
    $('[name^=cpf]').mask('999.999.999-99');
            //.mask('99.999.999/9999-99');
    
    $('[name^=data]').mask('99/99/9999')
    $('[name^=telefone]').mask('(99) 9999-9999')
    $('[name^=celular]').mask('(99) 9999-9999?9')
    $('[name=cep]').mask('99999-999', {
        completed: function(){
            var elm = $(this)
            $.ajax({
                url: base_url+'service/endereco/'+elm.val(),
                dataType: 'json',
                beforeSend: function(){
                    elm.parent().prev().prepend('<img src="'+base_url+'assets/img/ajax.gif" class="loading" /> ')
                },
                success: function(data){
                    if(data.erro){
                        alert(data.erro)
                    } else{
                        $.each(data, function(key, val){
                            $('[name='+key+']').val(val)
                        })
                        $('[name=numero]').focus()
                    }
                    $('.loading').remove()
                }
            })
        }
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
